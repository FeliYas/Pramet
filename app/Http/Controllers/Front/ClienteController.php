<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Cliente;
use App\Models\Contacto;
use App\Models\Logo;
use App\Models\Metadato;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::orderBy('orden', 'asc')->get();
        foreach ($clientes as $cliente) {
            $cliente->path = asset('storage/' . $cliente->path);
        }
        $banner = Banner::where('seccion', 'clientes')->first();
        if ($banner) {
            $banner->banner = asset('storage/' . $banner->banner);
        }
        $metadatos = Metadato::where('seccion', 'clientes')->first();
        $logos = Logo::whereIn('seccion', ['home', 'navbar', 'footer'])->get();
        foreach ($logos as $logo) {
            $logo->path = asset('storage/' . $logo->path);
        }
        $redes = Contacto::select('facebook', 'instagram','tiktok')->first();
        $contactos = Contacto::select('direccion', 'email', 'telefono', 'whatsapp')->get();
        $whatsapp = Contacto::select('whatsapp')->first()->whatsapp;
        return view('front.clientes', compact('clientes', 'banner', 'metadatos', 'redes', 'logos', 'contactos', 'whatsapp'));
    }
}
