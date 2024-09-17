@extends('layout.app')

@section('body')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="row justify-content-center">
        <div class="shadow-lg p-5 bg-body-tertiary rounded">
            <div class="icon d-flex align-items-center justify-content-center mb-4">
                <span class="fa fa-user-o"></span>
            </div>
            <h3 class="text-center mb-4">Sign In</h3>
            <form class="login-form" method="POST" action="{{ route('authenticate') }}">
                @csrf
                <div class="form-group mb-3">
                    <input type="text" class="form-control rounded-left" placeholder="Email" required name="email">
                </div>
                <div class="form-group mb-3">
                    <input type="password" class="form-control rounded-left" placeholder="Password" required
                        name="password">
                </div>
                <div class="form-g  roup mb-4">
                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
                </div>
                <div class="form-g  roup mb-4">
                    <a class="form-control btn btn-primary rounded submit px-3" href="{{ route('register') }}">Register</a>
                </div>
                <div class="form-group d-md-flex">
                    <div class="w-50">
                        <label class="checkbox-wrap checkbox-primary">Remember Me
                            <input type="checkbox" checked>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="w-50 text-md-right">
                        <a href="#">Forgot Password</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection