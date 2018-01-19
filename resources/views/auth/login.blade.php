@extends('layouts.auth')

@section('content')
<div class="page login-page">
    <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
            <div class="row">
                <!-- Logo & Information Panel-->
                <div class="col-lg-6">
                    <div class="info d-flex align-items-center">
                        <div class="content">
                            <div class="logo">
                                <h1>ASEMKA</h1>
                            </div>
                            <p>V. 1.0</p>
                        </div>
                    </div>
                </div>
                <!-- Form Panel    -->
                <div class="col-lg-6 bg-white">
                    <div class="form d-flex align-items-center">
                        <div class="content">
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                @include('components.alert-login')
                                <div class="form-group">
                                    <input id="login-username" type="text" name="email" required="" class="input-material">
                                    <label for="login-username" class="label-material">Email</label>
                                </div>
                                <div class="form-group">
                                    <input id="login-password" type="password" name="password" required="" class="input-material">
                                    <label for="login-password" class="label-material">Password</label>
                                </div>
                                <button type="submit" id="login" class="btn btn-primary">Masuk</button>
                            </form>
                            {{-- <a href="#" class="forgot-pass">Lupa Password?</a><br> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyrights text-center">
        <p style="color: #333;">Copyright © 2017 <a href="https://facebook.com/ibnu.a.azis">Ibnu Abdul Azis</a></p>
    </div>
</div>
@endsection
