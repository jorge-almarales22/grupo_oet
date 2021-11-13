@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Propietarios</div>
                
                <form class="card-body" method="POST" action="{{ route('agregar_propietario') }}">
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

                    <h3 class="text-center">Ingresa un propietario</h3>
                    <div class="row">
                        <div class="col">
                            <label for="">Cedula</label>
                          <input pattern="^\d*(\.\d{0,2})?$" required type="number" class="form-control" name="cedula">
                        </div>
                        <div class="col">
                            <label for="">Primer Nombre</label>
                          <input required type="text" class="form-control" name="primer_nombre">
                        </div>
                    </div>

                    <div class="row my-4">
                        <div class="col">
                            <label for="">Segundo Nombre</label>
                          <input required type="text" class="form-control" name="segundo_nombre">
                        </div>
                        <div class="col">
                            <label for="">Apellidos</label>
                          <input required type="text" class="form-control" name="apellidos">
                        </div>
                    </div>

                    <div class="row my-4">
                        <div class="col">
                            <label for="">Ciudad</label>
                          <input required type="text" class="form-control" name="ciudad">
                        </div>
                        <div class="col">
                            <label for="">Teléfono</label>
                          <input pattern="^\d*(\.\d{0,2})?$" required type="number" class="form-control" name="telefono">
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col">
                            <label for="">Dirección</label>
                          <input required type="text" class="form-control" name="direccion">
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
                    <th scope="col">Cedula</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Ciudad</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Dirección</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($propietarios as $item)
                        <tr>
                        <th scope="row">{{ $item->cedula }}</th>
                        <td>{{ $item->primer_nombre }}</td>
                        <td>{{ $item->apellidos }}</td>
                        <td>{{ $item->ciudad }}</td>
                        <td>{{ $item->telefono }}</td>
                        <td>{{ $item->direccion }}</td>
                        <td><a href="{{ route('editar_propietario', $item->id) }}">Editar/Ver</a> <a href="{{ route('eliminar_propietario', $item->id) }}">Eliminar</a></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                No Hay Propietarios Guardados
                            </td>
                        </tr>
                    @endforelse
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
