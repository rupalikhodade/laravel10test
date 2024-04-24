@extends('layouts.main') 
@section('title', 'Dashboard')
@section('content')
<main class="dashboard mt-5">
    <div class="container">
        <div class="row">
            <!-- <div class="col-md-12"> -->
            <div class="col-md-4 col-sm-6">
                <div class="well">
                    <h4>My Posts</h4>
                    <div class="count-box">
                        <span class="post-count">{{ $postCount }}</span>
                    </div>
                    <p><a href="{{ url('/posts') }}">View All Posts</a></p>
                </div>
            </div>
            <!-- </div> -->
        </div>
    </div>
</main>
@endsection