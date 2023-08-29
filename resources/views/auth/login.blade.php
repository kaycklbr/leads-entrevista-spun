@extends('layouts.app')
@section('content')
@include('auth.partials.nav')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-8 text-center">
            <img src="{{ asset('img/login.svg') }}" style="max-height: 70vh"/>
        </div>
        <div class="col-md-4">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <h3 class="mb-5">Login</h3>

                <div class="mb-3">
                    <input id="email" type="email" placeholder="E-mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                </div>

                <div class="mb-3 form-group">
                    <input id="password" type="password" placeholder="••••••••" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                </div>

                <div class="row justify-content-center mb-0">
                    <div class="col-8">
                        <button type="submit" class="btn btn-primary w-100">
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