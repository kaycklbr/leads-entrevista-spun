@extends('layouts.app')
@section('content')
@include('auth.partials.nav')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-8">
            <img src="{{ asset('img/register.svg') }}" style="max-height: 70vh"/>
        </div>
        <div class="col-md-4">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <h3 class="mb-5">Cadastre-se</h3>

                <div class="form-group mb-3">

                    <input id="name" placeholder="Nome da empresa" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                </div>

                <div class="form-group mb-3">
                    <input id="email" type="email" placeholder="E-mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                </div>

                <div class="form-group mb-3">

                    <input id="password" type="password" placeholder="Senha" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    
                </div>

                <div class="form-group mb-3">
                    <input id="password-confirm" type="password" placeholder="Confirmar senha" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Cadastrar') }}
                        </button>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
</div>
@include('auth.partials.footer')
@endsection