@extends('layouts.app')
@section('body-class','login-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" style="background-image: url('{{asset('img/bg77.jpg')}}'); background-size: cover; background-position: top center;">
    <div class="container" style="margin-top: 70px">
        <div class="row">
            <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                <div class="card card-login">
                    <form class="form" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="card-header card-header-success text-center">
                            <h4 class="card-title">Registro</h4>
                        </div>
                        <p class="description text-center">Completa tus datos</p>
                        <div class="card-body">

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">face</i>
                                    </span>
                                </div>
                                <input id="name" placeholder="Nombre" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">mail</i>
                                    </span>
                                </div>
                                <input id="email" type="email" placeholder="E-mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ 'El E-mail ya está en uso.' }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                </div>
                                <input id="password" type="password" placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ 'La contraceña debe contener como minimo 8 caracteres.' }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                </div>
                                <input id="password-confirm" type="password" placeholder="Confirmar contraseña" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password">
                            </div>




                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-success btn-link btn-wd btn-lg">Confirmar Registro
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



</div>
@endsection
