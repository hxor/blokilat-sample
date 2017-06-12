@extends('layouts.front')

@section('content')
    <div class="col-md-8">

        <h1 class="page-header">
            Blog
            <small>All Posts Page</small>
        </h1>

        <!-- First Blog Post -->
        @foreach ($posts as $post)
            <h2>
                <a href="{{ route('post', $post->id) }}">{{ $post->title }}</a>
            </h2>

            <p class="lead">
                by <a href="{{ route('post.user', $post->user->id) }}">{{ $post->user->name }}</a>
            </p>

            <p>
                <span class="glyphicon glyphicon-time"></span> {{ $post->created_at->format('l jS \\of F Y h:i:s A') }}
            </p>
            <hr>

            <img class="img-responsive" src='{{ asset("$post->image") }}' alt="">
            <hr>

            <p>{!! str_limit($post->body, 500) !!}</p>
            <a class="btn btn-primary" href="{{ route('post', $post->id) }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>
        @endforeach

        <!-- Pager -->
        {{ $posts->links() }}

    </div>
@endsection
