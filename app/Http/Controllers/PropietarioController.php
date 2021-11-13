<?php

namespace App\Http\Controllers;

use App\Models\Propietario;
use Illuminate\Http\Request;

class PropietarioController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function propietarios()
    {
        $propietarios = Propietario::get();
        return view('propietarios.index', compact('propietarios'));
    }
    public function agregarPropietario(Request $request)
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

        $propietario = new Propietario();
        $propietario->cedula = e($request->cedula);
        $propietario->primer_nombre = e($request->primer_nombre);
        $propietario->segundo_nombre = e($request->segundo_nombre);
        $propietario->apellidos = e($request->apellidos);
        $propietario->telefono = e($request->telefono);
        $propietario->ciudad = e($request->ciudad);
        $propietario->direccion = e($request->direccion);
        $propietario->save();

        return back()->with('status', 'Guardado con éxito');
        
    }
    
    public function eliminarPropietario(Propietario $propietario)
    {
        $propietario->delete();
        return back()->with('status', 'Eliminado con éxito');
    }

    public function editarPropietario(Propietario $propietario)
    {
        return view('propietarios.editar', compact('propietario'));
    }
    public function modificarPropietario(Request $request)
    {
        $propietario = Propietario::find($request->id);

        $request->validate([
            'cedula' => 'required|integer|min:99999999|max:9999999999',
            'primer_nombre' => 'required|string|max:25|min:3',
            'segundo_nombre' => 'required|string|max:25|nullable',
            'apellidos' => 'required|string|max:25|min:3',
            'ciudad' => 'required|string|max:25|min:2',
            'telefono' => 'required|integer|min:9999999|max:9999999999',
            'direccion' => 'required|string|max:25|min:2',
        ]);

        $propietario->cedula = e($request->cedula);
        $propietario->primer_nombre = e($request->primer_nombre);
        $propietario->segundo_nombre = e($request->segundo_nombre);
        $propietario->apellidos = e($request->apellidos);
        $propietario->telefono = e($request->telefono);
        $propietario->ciudad = e($request->ciudad);
        $propietario->direccion = e($request->direccion);
        $propietario->save();

        return back()->with('status', 'Editado con éxito');
    }
}
