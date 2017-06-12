@extends('layouts.front')

@section('content')
	<div class="col-lg-8">

        <!-- Blog Post -->

        <!-- Title -->
        <h1>{{ $post->title }}</h1>

        <!-- Author -->
        <p class="lead">
            by <a href="{{ route('post.user', $post->user->id) }}">{{ $post->user->name }}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> {{ $post->created_at->format('l jS \\of F Y h:i:s A') }}</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-responsive" src='{{ asset("$post->image") }}' alt="">

        <hr>

        <!-- Post Content -->
        <p>{!! $post->body !!}</p>

        <hr>

    </div>
@endsection
