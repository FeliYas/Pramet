<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Categoria;
use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::orderBy('orden', 'asc')->get();
        foreach ($categorias as $categoria) {
            $categoria->path = Storage::url($categoria->path);
        }
        $banner = Banner::where('seccion', 'productos')->first();
        $banner->banner = Storage::url($banner->banner);
        $logo = Logo::where('seccion', 'dashboard')->first();
        $logo->path = Storage::url($logo->path);
        return inertia('Admin/Categorias', [
            'categorias' => $categorias,
            'banner' => $banner,
            'logo' => $logo
        ]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'orden' => 'required|string|max:255',
            'path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'titulo' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return back()->witherrors($validator->messages()->first());
        }

        $imagePath = null;
        if ($request->hasFile('path')) {
            $file = $request->file('path');
            $imagePath=$file->store('images');
        } 

        $categoria = Categoria::create(array_filter([
            'orden' => $request->orden,
            'titulo' => $request->titulo,
            'path' => $imagePath,
        ]));

        // Redireccionar al index con un mensaje de éxito
        return redirect()->route('categorias.dashboard')->with('message', 'Categoria creada exitosamente');
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'orden' => 'required|string|max:255',
            'titulo' => 'required|string|max:255',
            'path' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
        if ($validator->fails()) {
            return back()->witherrors($validator->messages()->first());
        }
        $categoria = Categoria::find($id);

        if ($request->hasFile('path')) {
            $ruta= $categoria->path;
            $file = $request->file('path');
            if (Storage::exists($ruta)) {
                Storage::delete($ruta);
            }
            
            $imagePath=$file->store('images');
            
        }

        $categoria->update(array_filter([
            'orden' => $request->orden ?? $categoria->orden,
            'titulo' => $request->titulo ?? $categoria->titulo,
            'path' => $imagePath ?? $categoria->path,
        ]));
        $categoria->save();
        
        // Redireccionar al index con un mensaje de éxito
        return redirect()->route('categorias.dashboard')->with('message', 'Categoria actualizada exitosamente');
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        if ($categoria->path) {
            if (Storage::exists($categoria->path)) {
                Storage::delete($categoria->path);
            }
        }
        $categoria->delete();

        // Redireccionar al index con un mensaje de éxito
        return redirect()->route('categorias.dashboard')->with('message', 'Categoria eliminada exitosamente');
    }
    public function toggleDestacado(Request $request)
    {
        $categoria = Categoria::findOrFail($request->id);
        $categoria->destacado = $request->destacado ? 1 : 0;
        $categoria->save();

        if ($categoria->destacado == 1) {
            return redirect()->route('categorias.dashboard')->with('message', 'Categoria destacada exitosamente');
        } else {
            return redirect()->route('categorias.dashboard')->with('message', 'Categoria quitada de destacado exitosamente');
        }
    }
}
