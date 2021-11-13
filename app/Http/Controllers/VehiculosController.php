<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\Conductor;
use App\Models\Propietario;
use Illuminate\Http\Request;
use App\Models\Conductor_Vehiculo;

class VehiculosController extends Controller
{
    public function index()
    {
        $vehiculos = Vehiculo::with(['propietario'])->get();
        $propietarios = Propietario::get();
        $conductores = Conductor::get();
        return view('vehiculos.index', compact('vehiculos', 'propietarios', 'conductores'));
    }

    public function agregarVehiculo(Request $request)
    {
        $request->validate([
            'placa' => 'required|string|max:10|min:3',
            'color' => 'required|string|max:25|min:3',
            'marca' => 'required|string|max:25|min:3',
            'tipo_de_vehiculo' => 'required|string',
            'propietario' => 'required',
            'conductores' => 'required',
        ]);

        $vehiculo = new Vehiculo();
        $vehiculo->placa = e($request->placa);
        $vehiculo->color = e($request->color);
        $vehiculo->Marca = e($request->marca);
        $vehiculo->tipo_de_vehiculo = e($request->tipo_de_vehiculo);
        $vehiculo->propietario_id = e($request->propietario);
        $vehiculo->save();

        $vehiculo->conductores()->sync($request->conductores);

        return back()->with('status', 'Guardado con éxito');
    }

    public function eliminarVehiculo(Vehiculo $vehiculo)
    {
        $vehiculo->delete();
        return back()->with('status', 'Eliminado con éxito');
    }

    public function editarVehiculo(Vehiculo $vehiculo)
    {
        $propietarios = Propietario::get();
        $data = Vehiculo::with(['conductores'])->where('id', $vehiculo->id)->get();
        $conductores_sin_vehiculo = Conductor::doesntHave('vehiculos')->get();
        $conductores = Conductor::get();
        $conductores_asignados = [];
        foreach($data as $item):
            foreach($item->conductores as $conductor):
                $conductores_asignados[] = $conductor;
            endforeach;
        endforeach;

        return view('vehiculos.editar', compact('vehiculo', 'propietarios', 'conductores_asignados', 'conductores_sin_vehiculo', 'conductores'));
    }

    public function modificarVehiculo(Request $request)
    {
        $vehiculo = Vehiculo::find($request->id);

        $request->validate([
            'placa' => 'required|string|max:10|min:3',
            'color' => 'required|string|max:25|min:3',
            'marca' => 'required|string|max:25|min:3',
            'tipo_de_vehiculo' => 'required|string',
            'propietario' => 'required',
            'conductores' => 'required',
        ]);

        $vehiculo->placa = e($request->placa);
        $vehiculo->color = e($request->color);
        $vehiculo->Marca = e($request->marca);
        $vehiculo->tipo_de_vehiculo = e($request->tipo_de_vehiculo);
        $vehiculo->propietario_id = e($request->propietario);
        $vehiculo->save();

        $vehiculo->conductores()->sync($request->conductores);

        return back()->with('status', 'Guardado con éxito');
    }

}
