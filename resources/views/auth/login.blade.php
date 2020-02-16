@extends('layouts.app')

@section('body-class','login-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" style="background-image: url('{{asset('img/bg77.jpg')}}'); background-size: cover; background-position: top center;">
    <div class="container" style="margin-top: 70px">
        <div class="row">
            <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                <div class="card card-login">
                    <form class="form" method="POST" action="{{ route('login') }}" style="min-height:300px">
                        @csrf
                        <div class="card-header card-header-success text-center">
                            <h4 class="card-title">Inicio de Sesión</h4>
                        </div>
                        <p class="description text-center">Ingresa tus datos</p>
                        <div class="card-body">

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">mail</i>
                                    </span>
                                </div>
                                <input id="email" type="email" placeholder="E-mail..." class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ 'Contraseña Incorrecta' }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                </div>

                                <input id="password" type="password" placeholder="Contraseña..." class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            </div>



                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-success btn-link btn-wd btn-lg">Ingresar
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
