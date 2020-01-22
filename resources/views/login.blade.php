@extends('admin')

@section('content')
    <div class="login">
        <div class="login-box">
        <img src="./images/logo_cc.png"/>
            <h5 class="text-danger text-center">Copa Campeche</h1>
            
            @isset($responseMessage)
                <div class="alert alert-primary" role="alert">
                    {{ $responseMessage }}
                </div>
            @endisset
            <form action="./auth" method="POST" autocomplete="off">
                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="Correo" autocomplete="off">
                </div>
                
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Contraseña" autocomplete="off">
                </div>

                <button type="submit" class="form-control btn btn-primary">Login</button>
                
            </form>
        </div>
    </div>  
@endsection