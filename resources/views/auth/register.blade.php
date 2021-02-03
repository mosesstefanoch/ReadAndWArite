@extends('layouts.app')

@section('content')
<div class="column center">
    <div class="col-40 bold f-20 l-title">Register</div>
    <div class=" col-40 center l-form">
        <form class="column col-80 bold justify" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row align pb-20">
                <div class="col-30 t-end mr-20">
                    Name
                </div>
                <div class="col-70 center">
                    <input class="f-login col-100" id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                </div>
            </div>

            @error('name')
            <div class="row pb-20">
                <div class="col-100 t-center error" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            </div>
            @enderror

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
                <div class="col-30 t-end mr-20">
                    Confirm Password
                </div>
                <div class="col-70 center">
                    <input class="f-login col-100" id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="row align">
                <div class="col-30 mr-20">
                </div>
                <div class="col-70">
                    <button type="submit" class="btn-search">
                        Register
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection