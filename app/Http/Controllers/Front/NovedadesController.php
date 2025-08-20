<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Contacto;
use App\Models\Logo;
use App\Models\Metadato;
use App\Models\Novedad;
use Illuminate\Http\Request;

class NovedadesController extends Controller
{
    public function index()
    {
        $novedades = Novedad::orderBy('orden', 'asc')->get();
        foreach ($novedades as $novedad) {
            $novedad->path = asset('storage/' . $novedad->path);
        }
        $banner = Banner::where('seccion', 'novedades')->first();
        if ($banner) {
            $banner->banner = asset('storage/' . $banner->banner);
        }
        $metadatos = Metadato::where('seccion', 'novedades')->first();
        $logos = Logo::whereIn('seccion', ['home', 'navbar', 'footer'])->get();
        foreach ($logos as $logo) {
            $logo->path = asset('storage/' . $logo->path);
        }
        $redes = Contacto::select('facebook', 'instagram','tiktok')->first();
        $contactos = Contacto::select('direccion', 'email', 'telefono', 'whatsapp')->get();
        $whatsapp = Contacto::select('whatsapp')->first()->whatsapp;
        return view('front.novedades', compact('novedades', 'banner', 'metadatos', 'logos', 'contactos', 'whatsapp', 'redes'));
    }
    public function show($id)
    {
        $novedadElegida = Novedad::findOrFail($id);
        $novedadElegida->path = asset('storage/' . $novedadElegida->path);
        $novedades = Novedad::orderBy('orden', 'asc')->get();
        foreach ($novedades as $novedad) {
            $novedad->path = asset('storage/' . $novedad->path);
        }
        $logos = Logo::whereIn('seccion', ['home', 'navbar', 'footer'])->get();
        foreach ($logos as $logo) {
            $logo->path = asset('storage/' . $logo->path);
        }
        $redes = Contacto::select('facebook', 'instagram','tiktok')->first();
        $contactos = Contacto::select('direccion', 'email', 'telefono', 'whatsapp')->get();
        $whatsapp = Contacto::select('whatsapp')->first()->whatsapp;
        return view('front.novedad', compact('novedadElegida', 'novedades', 'logos', 'contactos', 'whatsapp', 'redes'));
    }
}
