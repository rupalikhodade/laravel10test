@extends('layouts.main') 
@section('title', 'Posts')
@section('content')
<main class="dashboard mt-5">
    <div class="container">
        <div class="row">
        <span class="pull-right"><a href="{{ route('post.create') }}" class="btn btn-primary">Create Post</a></span>
        <h2>My Posts</h2>
           @if(count($posts) > 0)
                @foreach($posts as $post)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ $post->title }}</h3>
                        </div>
                        <div class="panel-body">
                            <p>{{ $post->content }}</p>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No post found.</p>
            @endif
        </div>
        <!-- <pre id="jsonOutput">{{ json_encode($posts, JSON_PRETTY_PRINT) }}</pre> -->
    </div>
</main>
@endsection