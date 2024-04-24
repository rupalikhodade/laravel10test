@extends('layouts.app') 
@section('title', 'Login')
@section('content')
<main class="login-form mt-5">
    <div class="container">

        <div class="row">
            <div class="col-md-offset-4 col-md-4">
                @if(session('loginError'))
                    <div>&nbsp;</div>
                    <div class="alert alert-danger">
                        {{ session('loginError') }}
                    </div>
                @endif
                @if(session('loginSuccess'))
                    <div>&nbsp;</div>
                    <div class="alert alert-success">
                        {{ session('loginSuccess') }}
                    </div>
                @endif
                <div class="card">
                    <h3 class="card-header text-center">Login</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" placeholder="Email" id="email" class="form-control" name="email" required
                                    autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Signin</button>
                            </div>
                            <div>&nbsp;</div>
                            <a href="{{ route('register') }}">Create An Account</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection