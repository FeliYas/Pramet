<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CaracteristicaController extends Controller
{
    public function index($id)
    {
        $producto = Producto::findOrFail($id);
        $caracteristicas = $producto->caracteristicas()->get();
        $logo = Logo::where('seccion', 'dashboard')->first();
        $logo->path = Storage::url($logo->path);
        return inertia('Admin/Caracteristicas', [
            'producto' => $producto,
            'caracteristicas' => $caracteristicas,
            'logo' => $logo
        ]);
    }
    public function store(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $caracteristica = $producto->caracteristicas()->create($request->all());
        return redirect()->route('caracteristicas.dashboard', ['id' => $producto->id])
            ->with('success', 'Característica creada exitosamente.');
    }
    public function update(Request $request, $id, $caracteristicaId)
    {
        $producto = Producto::findOrFail($id);
        $caracteristica = $producto->caracteristicas()->findOrFail($caracteristicaId);
        $caracteristica->update($request->all());
        return redirect()->route('caracteristicas.dashboard', ['id' => $producto->id])
            ->with('success', 'Característica actualizada exitosamente.');
    }
    public function destroy($id, $caracteristicaId)
    {
        $producto = Producto::findOrFail($id);
        $caracteristica = $producto->caracteristicas()->findOrFail($caracteristicaId);
        $caracteristica->delete();
        return redirect()->route('caracteristicas.dashboard', ['id' => $producto->id])
            ->with('success', 'Característica eliminada exitosamente.');
    }
}
