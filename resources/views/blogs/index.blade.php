@extends('layouts.app')

@include('partials.meta_static')
@section('content')

    <div class="container">

        @if(Session::has('blog_created_message'))
            <div class="alert alert-success">
                {{ Session::get('blog_created_message') }}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            </div>
        @endif
        @foreach($blogs as $blog)
        <div class="col-md-8 offset-md-2 text-center">
            <h2><a href="{{ route('blogs.show', [$blog->slug]) }}">{{ $blog->title }}</a></h2>

            <div class="col-md-12">
            @if($blog->featured_image)
                <img src="/images/featured_image/{{ $blog->featured_image ? 
                $blog->featured_image : '' }}" alt="{{ Str::limit($blog->title, 50) }}" class="img-responsive featured_image" style="width:300px; height:auto;">
                <br/>
            @endif
            </div>

            <div class="lead">{!! Str::limit($blog->body, 200) !!}</div>

            @if(Auth::user())
            @if($blog->user)
                Author: <a href="{{ route('users.show', $blog->user->name) }}">{{ $blog->user->name }}</a> | Posted: {{ $blog->created_at->diffForHUmans() }}
            @endif
            @elseif($blog->user != Auth::user())
                Author: <b>{{ $blog->user->name }}</b> | Posted: {{ $blog->created_at->diffForHUmans() }}
            @endif
        </div>
        <br><hr><br>
        @endforeach
    </div>

@endsection