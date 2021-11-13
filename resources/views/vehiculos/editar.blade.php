@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">vehiculos</div>
                
                <form class="card-body" method="POST" action="{{ route('modificar_vehiculos') }}">
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
                          <input type="text" value="{{ $vehiculo->placa }}" class="form-control" name="placa">
                          <input required type="hidden" name="id" value="{{ $vehiculo->id }}">
                        </div>
                        <div class="col">
                            <label for="">color</label>
                          <input required type="text" value="{{ $vehiculo->color }}" class="form-control" name="color">
                        </div>
                    </div>

                    <div class="row my-4">
                        <div class="col">
                            <label for="">Marca</label>
                          <input required type="text" value="{{ $vehiculo->Marca }}" class="form-control" name="marca">
                        </div>
                        <div class="col">
                            <label for="">Tipo de vehiculo</label>
                          <select required class="form-control" name="tipo_de_vehiculo">
                              @if ($vehiculo->tipo_de_vehiculo == 'particular')
                                  
                                <option selected value="particular">Particular</option>
                              @else
                                  
                                <option selected value="publico">Público</option>
                              @endif
                          </select>
                        </div>
                    </div>

                    <div class="row my-4">
                        <div class="col">
                            <label for="">Propietario</label>
                            <select required class="form-control" name="propietario">
                                <option disabled selected>Eliga un propietario</option>
                                @forelse ($propietarios as $item)
                                    @if ($item->id == $vehiculo->propietario_id)
                                     <option selected value="{{ $item->id }}">{{ $item->primer_nombre }} {{ $item->segundo_nombre }}</option>
                                    @else
                                     <option value="{{ $item->id }}">{{ $item->primer_nombre }} {{ $item->segundo_nombre }}</option>
                                    @endif
                                
                                @empty

                                <option disabled selected>Sin datos</option>
                                    
                                @endforelse
                            </select>
                        </div>
                        <div class="col">
                            <label for="" style="display: block">Conductores</label>
                            
                            @if (sizeof($conductores_asignados) != 0)
                                @foreach ($conductores_asignados as $item)
                                    <label for="">
                                        {{ $item->primer_nombre }} {{ $item->segundo_nombre }}
                                        <input checked type="checkbox" name="conductores[]" value="{{ $item->id }}">
                                    </label> 
                                @endforeach
                                @foreach ($conductores_sin_vehiculo as $item)
                                    <label for="">
                                        {{ $item->primer_nombre }} {{ $item->segundo_nombre }}
                                        <input type="checkbox" name="conductores[]" value="{{ $item->id }}">
                                    </label> 
                                @endforeach
                            @else
                                @foreach ($conductores as $item)
                                    <label for="">
                                        {{ $item->primer_nombre }} {{ $item->segundo_nombre }}
                                        <input type="checkbox" name="conductores[]" value="{{ $item->id }}">
                                    </label> 
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <button class="btn btn-secondary btn-block">Guardar</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
