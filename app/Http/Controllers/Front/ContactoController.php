<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\ContactoMail;
use App\Models\Banner;
use App\Models\Contacto;
use App\Models\Logo;
use App\Models\Metadato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactoController extends Controller
{
    public function index()
    {
        $contacto = Contacto::first();
        $banner = Banner::where('seccion', 'contacto')->first();
        if ($banner) {
            $banner->banner = asset('storage/' . $banner->banner);
        }
        $metadatos = Metadato::where('seccion', 'contacto')->first();
        $logos = Logo::whereIn('seccion', ['home', 'navbar', 'footer'])->get();
        foreach ($logos as $logo) {
            $logo->path = asset('storage/' . $logo->path);
        }
        $redes = Contacto::select('facebook', 'instagram','tiktok')->first();
        $contactos = Contacto::select('direccion', 'email', 'telefono', 'whatsapp')->get();
        $whatsapp = Contacto::select('whatsapp')->first()->whatsapp;
        return view('front.contacto', compact('contacto', 'banner', 'metadatos', 'logos', 'redes', 'contactos', 'whatsapp'));
    }

    public function enviar(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'telefono' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'empresa' => 'nullable|string|max:100',
            'mensaje' => 'nullable|string',
            'g-recaptcha-response' => 'required'
        ]);

        // Verificar el token de reCAPTCHA
        $recaptcha = $this->verificarRecaptcha($request->input('g-recaptcha-response'));

        if (!$recaptcha['success']) {
            return redirect()->back()
                ->withErrors(['recaptcha' => 'La verificación de seguridad ha fallado. Por favor, inténtalo de nuevo.'])
                ->withInput();
        }

        if ($recaptcha['score'] < 0.7) {
            return redirect()->back()
                ->withErrors(['recaptcha' => 'La verificación de seguridad ha detectado actividad sospechosa. Por favor, inténtalo de nuevo más tarde.'])
                ->withInput();
        }

        $contacto = Contacto::first()->email;

        if (!$contacto) {
            return redirect()->back()->with('error', 'No se encontró un contacto con el tipo "email".');
        }

        // Verificar config básica de mail
        if (!config('mail.default') || !config('mail.from.address')) {
            return redirect()->back()->withInput()->with('error', 'Configuración de email incompleta en el servidor.');
        }

        // Si es SMTP, verificar config mínima
        if (config('mail.default') === 'smtp') {
            if (!config('mail.mailers.smtp.host') || !config('mail.mailers.smtp.port')) {
                return redirect()->back()->withInput()->with('error', 'Configuración SMTP incompleta (host/port faltantes).');
            }
        }
        
        try {
            Mail::to($contacto)->send(new ContactoMail($validated));
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Errores de validación específicos del email
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
                
        } catch (\Exception $e) {
            // Cualquier otra excepción
            Log::error('Error al enviar email de contacto: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());

            return redirect()->back()
                ->withInput()
                ->with('error', 'Error del servidor: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Mensaje enviado correctamente. Nos pondremos en contacto a la brevedad.');
    }

    private function verificarRecaptcha($token)
    {
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $token,
            'remoteip' => request()->ip()
        ]);

        return $response->json();
    }
}