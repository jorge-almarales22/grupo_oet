<?php

namespace App\Http\Controllers;

use App\Models\Conductor;
use Illuminate\Http\Request;

class ConductoresController extends Controller
{
    public function index()
    {
        $conductores = Conductor::get();
        return view('conductores.index', compact('conductores'));
    }

    public function agregarConductores(Request $request)
    {
        $request->validate([
            'cedula' => 'required|integer|min:99999999|max:9999999999',
            'primer_nombre' => 'required|string|max:25|min:3',
            'segundo_nombre' => 'required|string|max:25|nullable',
            'apellidos' => 'required|string|max:25|min:3',
            'ciudad' => 'required|string|max:25|min:2',
            'telefono' => 'required|integer|min:9999999|max:9999999999',
            'direccion' => 'required|string|max:25|min:2',
        ]);

        $conductor = new Conductor();
        $conductor->cedula = e($request->cedula);
        $conductor->primer_nombre = e($request->primer_nombre);
        $conductor->segundo_nombre = e($request->segundo_nombre);
        $conductor->apellidos = e($request->apellidos);
        $conductor->telefono = e($request->telefono);
        $conductor->ciudad = e($request->ciudad);
        $conductor->direccion = e($request->direccion);
        $conductor->save();

        return back()->with('status', 'Guardado con éxito');
    }

    public function eliminarConductor(Conductor $conductor)
    {
        $conductor->delete();
        return back()->with('status', 'Eliminado con éxito');
    }

    public function editarConductor(Conductor $conductor)
    {
        return view('conductores.editar', compact('conductor'));
    }

    public function modificarConductor(Request $request)
    {
        $conductor = Conductor::find($request->id);

        $request->validate([
            'cedula' => 'required|integer|min:99999999|max:9999999999',
            'primer_nombre' => 'required|string|max:25|min:3',
            'segundo_nombre' => 'required|string|max:25|nullable',
            'apellidos' => 'required|string|max:25|min:3',
            'ciudad' => 'required|string|max:25|min:2',
            'telefono' => 'required|integer|min:9999999|max:9999999999',
            'direccion' => 'required|string|max:25|min:2',
        ]);

        $conductor->cedula = e($request->cedula);
        $conductor->primer_nombre = e($request->primer_nombre);
        $conductor->segundo_nombre = e($request->segundo_nombre);
        $conductor->apellidos = e($request->apellidos);
        $conductor->telefono = e($request->telefono);
        $conductor->ciudad = e($request->ciudad);
        $conductor->direccion = e($request->direccion);
        $conductor->save();

        return back()->with('status', 'Editado con éxito');
    }

}
