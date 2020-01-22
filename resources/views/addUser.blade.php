@extends('layout')

@section('content')
    
    <div class="container mb-3">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-white">Registrar Usuario</h1>
                
                @isset($responseMessage)
                    @if($success)
                        <div id="alertMessage" class="alert alert-success" role="alert">
                            {{ $responseMessage }}
                        </div>
                    @else
                        <div class="alert alert-danger" role="alert">
                            {{ $responseMessage }}
                        </div>
                    @endif
                @endisset
                <form action="/registro" method="POST">
                    <div class="form-row">
                        <div class="col form-group">
                            <label for="nombre" class="text-white">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                        </div>

                        <div class="col">
                            <label for="apellido" class="text-white">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido">
                        </div>
                        
                    </div>
                    
                    <div class="form-row">
                        <div class="col-4 form-group">
                            <label for="estado" class="text-white">Estado</label>
                            <select for="nombre" class="form-control" name="id_estado">
                                @foreach ($estados as $e)
                                    <option value={{$e->id}}>{{ $e->estado}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-8 form-group">
                            <label for="" class="text-white">Equipo</label>
                            <input type="text" class="form-control" name="nombre_equipo">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="text-white">Email</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    
                    <div class="form-group">
                        <label for="" class="text-white">Password</label>
                        <input type="password" class="form-control" name="password"><br>
                    </div>
                    
                    <button type="submit" class="btn btn-primary float-right">Guardar</button>
                    
                </form>

                
            </div>
        </div>
    </div>
    
@endsection