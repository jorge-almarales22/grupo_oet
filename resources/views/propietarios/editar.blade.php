@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Propietarios</div>
                
                <form class="card-body" method="POST" action="{{ route('modificar_propietario') }}">
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

                    <h3 class="text-center">Edita un propietario</h3>
                    <div class="row">
                        <div class="col">
                            <label for="">Cedula</label>
                            <input required type="hidden" name="id" value="{{ $propietario->id }}">
                          <input pattern="^\d*(\.\d{0,2})?$" required type="number" value="{{ $propietario->cedula }}" class="form-control" name="cedula">
                        </div>
                        <div class="col">
                            <label for="">Primer Nombre</label>
                          <input required type="text" value="{{ $propietario->primer_nombre }}" class="form-control" name="primer_nombre">
                        </div>
                    </div>

                    <div class="row my-4">
                        <div class="col">
                            <label for="">Segundo Nombre</label>
                          <input required type="text" value="{{ $propietario->segundo_nombre }}" class="form-control" name="segundo_nombre">
                        </div>
                        <div class="col">
                            <label for="">Apellidos</label>
                          <input required type="text" value="{{ $propietario->apellidos }}" class="form-control" name="apellidos">
                        </div>
                    </div>

                    <div class="row my-4">
                        <div class="col">
                            <label for="">Ciudad</label>
                          <input required type="text" value="{{ $propietario->ciudad }}" class="form-control" name="ciudad">
                        </div>
                        <div class="col">
                            <label for="">Teléfono</label>
                          <input pattern="^\d*(\.\d{0,2})?$" required type="number" value="{{ $propietario->telefono }}" class="form-control" name="telefono">
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col">
                            <label for="">Dirección</label>
                          <input required type="text" value="{{ $propietario->direccion }}" class="form-control" name="direccion">
                        </div>
                        
                    </div>

                    <button class="btn btn-primary btn-block">Editar</button>
                    <a href="{{ route('propietarios') }}" class="btn btn-secondary btn-block">Atras</a>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
