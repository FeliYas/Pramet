<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Cliente;
use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::orderby('orden', 'asc')->get();
        foreach ($clientes as $cliente) {
            $cliente->path = Storage::url($cliente->path);
        }
        $banner = Banner::where('seccion', 'clientes')->first();
        $banner->banner = Storage::url($banner->banner);
        $logo = Logo::where('seccion', 'dashboard')->first();
        $logo->path = Storage::url($logo->path);
        return inertia('Admin/Clientes', [
            'clientes' => $clientes,
            'banner' => $banner,
            'logo' => $logo
        ]);
    }
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'orden' => 'required|string|max:255',
            'path' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->witherrors($validator->messages()->first());
        }

        $imagePath = null;
        if ($request->hasFile('path')) {
            $file = $request->file('path');
            $imagePath=$file->store('images');
        } 

        // Crear la cliente con los datos validados
        $cliente = Cliente::create([
            'orden'              => $request->orden,
            'path'               => $imagePath,
        ]);

        // Redireccionar al index con un mensaje de éxito
        return redirect()->route('clientes.dashboard')->with('message', 'Cliente creado exitosamente');
    }
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'orden' => 'required|string|max:255',
            'path' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->witherrors($validator->messages()->first());
        }

        // Buscar el cliente por ID
        $cliente = Cliente::findOrFail($id);

        // Actualizar los campos del cliente
        $cliente->orden = $request->orden;

        if ($request->hasFile('path')) {
            // Eliminar la imagen anterior si existe
            if ($cliente->path) {
                if (Storage::exists($cliente->path)) {
                    Storage::delete($cliente->path);
                }
            }
            $file = $request->file('path');
            $cliente->path = $file->store('images');
        }

        $cliente->save();

        // Redireccionar al index con un mensaje de éxito
        return redirect()->route('clientes.dashboard')->with('message', 'Cliente actualizado exitosamente');
    }

    public function destroy($id)
    {
        // Find the Cliente by id
        $cliente = Cliente::findOrFail($id);

        // Eliminar la imagen del almacenamiento si es necesario
        if ($cliente->path) {
            if (Storage::exists($cliente->path)) {
                Storage::delete($cliente->path);
            }
        }

        // Eliminar el registro de la base de datos
        $cliente->delete();

        // Redireccionar al index con un mensaje de éxito
        return redirect()->route('clientes.dashboard')->with('message', 'Cliente eliminado exitosamente');
    }
}
