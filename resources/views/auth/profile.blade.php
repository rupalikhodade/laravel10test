
@extends('layouts.main')
@section('title', 'My Profile')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>My Profile</h2>
                <p>Name: {{ $user->name }}</p>
                <p>Email: {{ $user->email }}</p>
            </div>
        </div>
    </div>
@endsection