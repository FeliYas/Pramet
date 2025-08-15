<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Logo;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::orderby('orden', 'asc')->get();
        foreach ($servicios as $servicio) {
            $servicio->path = Storage::url($servicio->path);
        }
        $banner = Banner::where('seccion', 'servicios')->first();
        $banner->banner = Storage::url($banner->banner);
        $logo = Logo::where('seccion', 'dashboard')->first();
        $logo->path = Storage::url($logo->path);
        return inertia('Admin/Servicios', [
            'servicios' => $servicios,
            'banner' => $banner,
            'logo' => $logo
        ]);
    }
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'orden'                => 'required|string|max:255',
            'titulo'               => 'required|string|max:255',
            'descripcion'          => 'required|string',
            'path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->witherrors($validator->messages()->first());
        }

        $imagePath = null;
        if ($request->hasFile('path')) {
            $file = $request->file('path');
            $imagePath=$file->store('images');
        } 

        // Crear la servicio con los datos validados
        $servicio = Servicio::create([
            'orden'              => $request->orden,
            'titulo'             => $request->titulo,
            'descripcion'        => $request->descripcion,
            'path'               => $imagePath,
        ]);

        // Redireccionar al index con un mensaje de éxito
        return redirect()->route('servicios.dashboard')->with('message', 'Servicio creado exitosamente');
    }
    public function update(Request $request, $id)
    {

        // Validar los campos del formulario
        $validator = Validator::make($request->all(), [
            'orden'                => 'nullable|string|max:255',
            'titulo'               => 'nullable|string|max:255',
            'descripcion'          => 'nullable|string',
            'path'                 => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
        ]);
        if ($validator->fails()) {
            return back()->witherrors($validator->messages()->first());
        }

        // Obtener el registro de Servicios
        $servicio = Servicio::findOrFail($id);

        if ($request->hasFile('path')) {
            $ruta= $servicio->path;
            $file = $request->file('path');
            if (Storage::exists($ruta)) {
                Storage::delete($ruta);
            }
            
            $imagePath=$file->store('images');
            
        }

        $servicio->orden              = $request->orden;
        $servicio->titulo             = $request->titulo;
        $servicio->descripcion        = $request->descripcion;
        $servicio->path               = $imagePath ?? $servicio->path;
        // Guardar los cambios en Servicios
        $servicio->save();

        // Redireccionar al index con un mensaje de éxito
        return redirect()->route('servicios.dashboard')->with('message', 'Servicio actualizado exitosamente');
    }

    public function destroy($id)
    {
        // Find the Servicios by id
        $servicio = Servicio::findOrFail($id);

        // Eliminar la imagen del almacenamiento si es necesario
        if ($servicio->path) {
            if (Storage::exists($servicio->path)) {
                Storage::delete($servicio->path);
            }
        }

        // Eliminar el registro de la base de datos
        $servicio->delete();

        // Redireccionar al index con un mensaje de éxito
        return redirect()->route('servicios.dashboard')->with('message', 'Servicio eliminado exitosamente');
    }
}
