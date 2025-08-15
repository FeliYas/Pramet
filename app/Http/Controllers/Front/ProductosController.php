<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Categoria;
use App\Models\Contacto;
use App\Models\Logo;
use App\Models\Metadato;
use App\Models\Producto;
use App\Models\Subcategoria;

class ProductosController extends Controller
{
    public function index()
    {
        $categorias = Categoria::orderBy('orden', 'asc')->get();
        foreach ($categorias as $categoria) {
            $categoria->path = asset('storage/' . $categoria->path);
        }

        $banner = Banner::where('seccion', 'productos')->first();
        if ($banner) {
            $banner->banner = asset('storage/' . $banner->banner);
        }
        $metadatos = Metadato::where('seccion', 'productos')->first();
        $logos = Logo::whereIn('seccion', ['home', 'navbar', 'footer'])->get();
        foreach ($logos as $logo) {
            $logo->path = asset('storage/' . $logo->path);
        }

        $redes = Contacto::select('facebook', 'instagram','tiktok')->first();
        $contactos = Contacto::select('direccion', 'email', 'telefono', 'whatsapp')->get();
        $whatsapp = Contacto::select('whatsapp')->first()->whatsapp;
        return view('front.categorias', compact('categorias', 'banner', 'metadatos', 'logos', 'contactos', 'whatsapp', 'redes'));
    }
    public function show($categoriaId)
    {
        $categoria = Categoria::findOrFail($categoriaId);
        $categorias = Categoria::orderBy('orden', 'asc')->with('productos')->get();
        foreach ($categorias as $cat) {
            $cat->path = asset('storage/' . $cat->path);
        }
        $productos = Producto::where('categoria_id', $categoriaId)->orderBy('orden', 'asc')->get();
        foreach ($productos as $producto) {
            $producto->path = asset('storage/' . $producto->path);
        }

        $logos = Logo::whereIn('seccion', ['home', 'navbar', 'footer'])->get();
        foreach ($logos as $logo) {
            $logo->path = asset('storage/' . $logo->path);
        }
        $redes = Contacto::select('facebook', 'instagram','tiktok')->first();
        $contactos = Contacto::select('direccion', 'email', 'telefono', 'whatsapp')->get();
        $whatsapp = Contacto::select('whatsapp')->first()->whatsapp;
        return view('front.productos', compact('categoria', 'categorias', 'productos', 'logos', 'contactos', 'whatsapp', 'redes'));
    }
    public function showProducto($producto)
    {
        $producto = Producto::with([
            'galeria' => function ($query) {
            $query->orderBy('orden', 'asc');
            },
            'caracteristicas' => function ($query) {
                $query->orderBy('orden', 'asc');
            }
        ])->findOrFail($producto);

        $producto->path = asset('storage/' . $producto->path);
        if ($producto->manual) {
            $producto->manual = asset('storage/' . $producto->manual);
        }
        if ($producto->memoria) {
            $producto->memoria = asset('storage/' . $producto->memoria);
        }
        foreach ($producto->galeria as $imagen) {
            $imagen->path = asset('storage/' . $imagen->path);
        }
        $logos = Logo::whereIn('seccion', ['home', 'navbar', 'footer'])->get();
        foreach ($logos as $logo) {
            $logo->path = asset('storage/' . $logo->path);
        }
        $redes = Contacto::select('facebook', 'instagram','tiktok')->first();
        $contactos = Contacto::select('direccion', 'email', 'telefono', 'whatsapp')->get();
        $whatsapp = Contacto::select('whatsapp')->first()->whatsapp;
        return view('front.producto', compact('producto', 'logos', 'contactos', 'whatsapp', 'redes'));
    }
}
