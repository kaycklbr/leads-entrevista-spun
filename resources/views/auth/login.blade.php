@extends('layouts.app')
@include('auth.partials.nav')
@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-8 text-center">
            <img src="{{ asset('img/login.svg') }}" style="max-height: 70vh"/>
        </div>
        <div class="col-md-4">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <h3 class="mb-5">Entre</h3>

                <div class="mb-3">
                    <input id="email" type="email" placeholder="E-mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>

                <div class="mb-3 form-group">
                    <input id="password" type="password" placeholder="••••••••" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                </div>

                <div class="row mb-0">
                    <div class="col-8 offset-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Entrar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@include('auth.partials.footer')
@endsection