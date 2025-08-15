<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Contacto;
use App\Models\Contenido;
use App\Models\Logo;
use App\Models\Novedad;
use App\Models\Producto;
use App\Models\Proyecto;
use App\Models\Servicio;
use App\Models\Slider;
use App\Models\Subcategoria;
use App\Models\Trabajo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
     public function index()
    {
        $logos = Logo::whereIn('seccion', ['home', 'navbar', 'footer'])->get();
        foreach ($logos as $logo) {
            $logo->path = asset('storage/' . $logo->path);
        }
        $sliders = Slider::orderBy('orden', 'asc')->get();
        foreach ($sliders as $slider) {
            $slider->path = asset('storage/' . $slider->path);
        }
        $categorias = Categoria::where('destacado', true)->get();
        foreach ($categorias as $categoria) {
            $categoria->path = asset('storage/' . $categoria->path);
        }
        $contenido = Contenido::first();
        if ($contenido && $contenido->path) {
            $contenido->path = asset('storage/' . $contenido->path);
        }
        $novedades = Novedad::orderBy('orden', 'asc')->take(3)->get();
        foreach ($novedades as $novedad) {
            $novedad->path = asset('storage/' . $novedad->path);
        }
        $clientes = Cliente::orderBy('orden', 'asc')->get();
        foreach ($clientes as $cliente) {
            $cliente->path = asset('storage/' . $cliente->path);
        }
        $redes = Contacto::select('facebook', 'instagram','tiktok')->first();
        $contactos = Contacto::select('direccion', 'email', 'telefono', 'whatsapp')->get();
        $whatsapp = Contacto::select('whatsapp')->first()->whatsapp;
        return view('front.home', compact(
            'logos',
            'sliders',
            'categorias',
            'contenido',
            'novedades',
            'clientes',
            'redes',
            'contactos',
            'whatsapp'
        ));

    }
}
