@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">vehiculos</div>
                
                <form class="card-body" method="POST" action="{{ route('agregar_vehiculos') }}">
                    @csrf

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="errors {!! $errors->any() ? 'block' : '' !!}">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                    <h3 class="text-center">Ingresa un vehiculo</h3>
                    <div class="row">
                        <div class="col">
                            <label for="">Placa</label>
                          <input required type="text" class="form-control" name="placa">
                        </div>
                        <div class="col">
                            <label for="">color</label>
                          <input required type="text" class="form-control" name="color">
                        </div>
                    </div>

                    <div class="row my-4">
                        <div class="col">
                            <label for="">Marca</label>
                          <input required type="text" class="form-control" name="marca">
                        </div>
                        <div class="col">
                            <label for="">Tipo de vehiculo</label>
                          <select required class="form-control" name="tipo_de_vehiculo">
                            <option disabled selected>Eliga un tipo</option>
                            <option value="1">Particular</option>
                            <option value="2">Público</option>
                          </select>
                        </div>
                    </div>

                    <div class="row my-4">
                        <div class="col">
                            <label for="">Propietario</label>
                            <select class="form-control" name="propietario" required>
                                <option disabled selected>Eliga un propietario</option>
                                @forelse ($propietarios as $item)
                                    <option value="{{ $item->id }}">{{ $item->primer_nombre }} {{ $item->segundo_nombre }}</option>
                                    @empty
                                    <option disabled selected>Sin datos</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="col">
                            <label for="" style="display: block">Conductores</label>
                                @forelse ($conductores as $item)
                                    <label for="">
                                        {{ $item->primer_nombre }} {{ $item->segundo_nombre }}
                                        <input type="checkbox" name="conductores[]" value="{{ $item->id }}">
                                    </label>
                                    
                                @empty
                                    no hay datos
                                @endforelse
                        </div>
                    </div>

                    <button class="btn btn-secondary btn-block">Guardar</button>
                    
                </form>
            </div>
        </div>
    </div>
    <div class="row justify-content-center my-4">
        <div class="col-md-8">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Placa</th>
                    <th scope="col">Color</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Tipo de vehiculo</th>
                    <th scope="col">Propietario</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($vehiculos as $item)
                        <tr>
                        <th scope="row">{{ $item->placa }}</th>
                        <td>{{ $item->color }}</td>
                        <td>{{ $item->Marca }}</td>
                        <td>{{ $item->tipo_de_vehiculo }}</td>
                        <td>{{ $item->propietario->primer_nombre }} {{ $item->propietario->segundo_nombre }}</td>
                        <td><a href="{{ route('editar_vehiculo', $item->id) }}">Editar/Ver Conductores</a> <a href="{{ route('eliminar_vehiculo', $item->id) }}">Eliminar</a></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                No Hay vehiculos Guardados
                            </td>
                        </tr>
                    @endforelse
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
