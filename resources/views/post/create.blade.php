@extends('layouts.main') 
@section('title', 'Create Post')
@section('content')
<main class="dashboard mt-5">
    <div class="container">
        <div class="row">
        <span class="pull-right"><a href="{{ route('posts') }}" class="btn btn-link">View All Posts</a></span>
        <h3 class="card-header text-center">Create Post</h3>
            <div class="col-md-offset-3 col-md-6">
                <form method="POST" action="{{ route('post.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <textarea name="title" rows="2" required class="form-control">{{ old('title') }}</textarea>
                        @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="content">Content:</label>
                        <textarea name="content" rows="4" required class="form-control">{{ old('content') }}</textarea>
                        @if ($errors->has('content'))
                            <span class="text-danger">{{ $errors->first('content') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-dark btn-block">Save</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection