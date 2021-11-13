@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Conductores</div>
                
                <form class="card-body" method="POST" action="{{ route('modificar_conductor') }}">
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

                    <h3 class="text-center">Edita un conductor</h3>
                    <div class="row">
                        <div class="col">
                            <label for="">Cedula</label>
                            <input required type="hidden" name="id" value="{{ $conductor->id }}">
                          <input required type="text" value="{{ $conductor->cedula }}" class="form-control" name="cedula">
                        </div>
                        <div class="col">
                            <label for="">Primer Nombre</label>
                          <input required type="text" value="{{ $conductor->primer_nombre }}" class="form-control" name="primer_nombre">
                        </div>
                    </div>

                    <div class="row my-4">
                        <div class="col">
                            <label for="">Segundo Nombre</label>
                          <input required type="text" value="{{ $conductor->segundo_nombre }}" class="form-control" name="segundo_nombre">
                        </div>
                        <div class="col">
                            <label for="">Apellidos</label>
                          <input required type="text" value="{{ $conductor->apellidos }}" class="form-control" name="apellidos">
                        </div>
                    </div>

                    <div class="row my-4">
                        <div class="col">
                            <label for="">Ciudad</label>
                          <input required type="text" value="{{ $conductor->ciudad }}" class="form-control" name="ciudad">
                        </div>
                        <div class="col">
                            <label for="">Teléfono</label>
                          <input required type="text" value="{{ $conductor->telefono }}" class="form-control" name="telefono">
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col">
                            <label for="">Dirección</label>
                          <input required type="text" value="{{ $conductor->direccion }}" class="form-control" name="direccion">
                        </div>
                        
                    </div>

                    <button class="btn btn-primary btn-block">Editar</button>
                    <a href="{{ route('conductores') }}" class="btn btn-secondary btn-block">Atras</a>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
