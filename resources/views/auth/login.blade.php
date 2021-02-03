@extends('layouts.app')

@section('content')
<div class="column center">
    <div class="col-40 bold f-20 l-title">Login</div>
    <div class=" col-40 center l-form">
        <form class="column col-80 bold justify" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="row align pb-20">
                <div class="col-30 t-end mr-20">
                    E-mail Address
                </div>
                <div class="col-70 center">
                    <input class="f-login col-100" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>

            </div>
            
            @error('email')
            <div class="row pb-20">
                <div class="col-100 t-center error" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            </div>
            @enderror

            <div class="row align pb-20">
                <div class="col-30 t-end mr-20">
                    Password
                </div>
                <div class="col-70 center">
                    <input class="f-login col-100" id="password" type="password" name="password" required autocomplete="current-password">
                </div>

            </div>

            @error('password')
            <div class="row pb-20">
                <div class="col-100 t-center error" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            </div>
            @enderror

            <div class="row align pb-20">
                <div class="col-30 mr-20">
                </div>
                <div class="col-70">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        Remember Me
                    </label>
                </div>
            </div>

            <div class="row align">
                <div class="col-30 mr-20">
                </div>
                <div class="col-70">
                    <button type="submit" class="btn-search">
                        Login
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection