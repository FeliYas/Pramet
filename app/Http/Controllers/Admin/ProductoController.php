<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Acabados;
use App\Models\Banner;
use App\Models\Categoria;
use App\Models\Logo;
use App\Models\Producto;
use App\Models\ProductoAcabado;
use App\Models\Subcategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::orderBy('orden', 'asc')->with('categoria','galeria')->get();
        foreach ($productos as $producto) {
            $producto->path = Storage::url($producto->path);
            if ($producto->manual) {
            $producto->manual = Storage::url($producto->manual);
            }
            if ($producto->memoria) {
            $producto->memoria = Storage::url($producto->memoria);
            }
            foreach ($producto->galeria as $imagen) {
                $imagen->path = Storage::url($imagen->path);
            }
        }
        $categorias = Categoria::orderBy('orden', 'asc')->get();
        $logo = Logo::where('seccion', 'dashboard')->first();
        $logo->path = Storage::url($logo->path);
        return inertia('Admin/Productos', [
            'productos' => $productos,
            'categorias' => $categorias,
            'logo' => $logo
        ]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'orden' => 'required|string|max:255',
            'path' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'titulo' => 'required|string|max:255',
            'constructivas' => 'required|string',
            'tablero' => 'required|string',
            'quemador' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
            'manual' => 'nullable|mimes:pdf,doc,docx|max:5120',
            'memoria' => 'nullable|mimes:pdf,dwg,dxf|max:15360',
        ]);
        if ($validator->fails()) {
            return back()->witherrors($validator->messages()->first());
        }
        
        $imagePath = null;
        if ($request->hasFile('path')) {
            $file = $request->file('path');
            $imagePath = $file->store('images');
        }
        $manualPath = null;
        if ($request->hasFile('manual')) {
            $file = $request->file('manual');
            $manualPath = $file->store('fichas');
        }
        $memoriaPath = null;
        if ($request->hasFile('memoria')) {
            $file = $request->file('memoria');
            $memoriaPath = $file->store('fichas');
        }

        $producto = Producto::create(array_filter([
            'orden' => $request->orden,
            'path' => $imagePath,
            'titulo' => $request->titulo,
            'constructivas' => $request->constructivas,
            'tablero' => $request->tablero,
            'quemador' => $request->quemador,
            'categoria_id' => $request->categoria_id,
            'manual' => $manualPath,
            'memoria' => $memoriaPath,
        ]));

        // Redireccionar al index con un mensaje de éxito
        return redirect()->route('productos.dashboard')->with('message', 'Producto creado exitosamente');
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'orden' => 'required|string|max:255',
            'path' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'titulo' => 'required|string|max:255',
            'constructivas' => 'required|string',
            'tablero' => 'required|string',
            'quemador' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
            'manual' => 'nullable|mimes:pdf,doc,docx|max:5120',
            'memoria' => 'nullable|mimes:pdf,dwg,dxf|max:15360',
        ]);
        if ($validator->fails()) {
            return back()->witherrors($validator->messages()->first());
        }
        $producto = Producto::find($id);

        $imagePath = $producto->path;
        if ($request->hasFile('path')) {
            $ruta = $producto->path;
            $file = $request->file('path');
            if ($ruta && Storage::exists($ruta)) {
                Storage::delete($ruta);
            }
            $imagePath = $file->store('images');
        }
        $manualPath = $producto->manual;
        if ($request->hasFile('manual')) {
            $ruta = $producto->manual;
            $file = $request->file('manual');
            if ($ruta && Storage::exists($ruta)) {
                Storage::delete($ruta);
            }
            $manualPath = $file->store('fichas');
        }
        $memoriaPath = $producto->memoria;
        if ($request->hasFile('memoria')) {
            $ruta = $producto->memoria;
            $file = $request->file('memoria');
            if ($ruta && Storage::exists($ruta)) {
                Storage::delete($ruta);
            }
            $memoriaPath = $file->store('fichas');
        }

        $producto->update(array_filter([
            'orden' => $request->orden ?? $producto->orden,
            'path' => $imagePath,
            'titulo' => $request->titulo ?? $producto->titulo,
            'constructivas' => $request->constructivas ?? $producto->constructivas,
            'tablero' => $request->tablero ?? $producto->tablero,
            'quemador' => $request->quemador ?? $producto->quemador,
            'categoria_id' => $request->categoria_id ?? $producto->categoria_id,
            'manual' => $manualPath,
            'memoria' => $memoriaPath,
        ]));
        $producto->save();

        return redirect()->route('productos.dashboard')->with('message', 'Producto actualizado exitosamente');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        if ($producto->path) {
            if (Storage::exists($producto->path)) {
                Storage::delete($producto->path);
            }
        }
        if ($producto->manual) {
            if (Storage::exists($producto->manual)) {
                Storage::delete($producto->manual);
            }
        }
        if ($producto->memoria) {
            if (Storage::exists($producto->memoria)) {
                Storage::delete($producto->memoria);
            }
        }
        $producto->delete();

        // Redireccionar al index con un mensaje de éxito
        return redirect()->route('productos.dashboard')->with('message', 'Producto eliminado exitosamente');
    }
}
