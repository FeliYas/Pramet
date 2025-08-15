<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Contacto;
use App\Models\Logo;
use App\Models\Metadato;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::orderBy('orden', 'asc')->get();
        foreach ($servicios as $servicio) {
            $servicio->path = asset('storage/' . $servicio->path);
        }
        $banner = Banner::where('seccion', 'servicios')->first();
        if ($banner) {
            $banner->banner = asset('storage/' . $banner->banner);
        }
        $metadatos = Metadato::where('seccion', 'servicios')->first();
        $logos = Logo::whereIn('seccion', ['home', 'navbar', 'footer'])->get();
        foreach ($logos as $logo) {
            $logo->path = asset('storage/' . $logo->path);
        }
        $redes = Contacto::select('facebook', 'instagram','tiktok')->first();
        $contactos = Contacto::select('direccion', 'email', 'telefono', 'whatsapp')->get();
        $whatsapp = Contacto::select('whatsapp')->first()->whatsapp;
        return view('front.servicios', compact('servicios', 'banner', 'metadatos', 'redes', 'logos', 'contactos', 'whatsapp'));
    }
}
