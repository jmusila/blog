@extends('layouts.app')

@include('partials.meta_dynamic')
@section('content')

    <div class="container-fluid">
    <article>
        <div class="jumbotron">

        <div class="col-md-12">
            @if($blog->featured_image)
                <img src="/images/featured_image/{{ $blog->featured_image ? 
                $blog->featured_image : '' }}" alt="{{ Str::limit($blog->title, 50) }}" class="img-responsive featured_image">
                <br/>
            @endif
        </div>

            <div class="col-md-12">
                <h1>{{ $blog->title }}</h1>
            </div>
            <div class="col-md-12">
                <div class="btn-group">
                    <a class="btn btn-primary btn-sm pull-left btn-margin-right" href="{{ route('blogs.edit', $blog->id) }}">Edit  </a>
                    <form action="{{ route('blogs.delete', $blog->id) }}" method="post">
                        @csrf
                        {{ method_field('delete') }}
                        <button type="submit" class="btn btn-danger btn-sm pull-left">Delete</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="colmd-12">
            {!! $blog->body !!}
            @if($blog->user)
                Author: <a href="">{{ $blog->user->name }}</a> | Posted: {{ $blog->created_at->diffForHUmans() }}
            @endif
            <hr>
            <strong>Categories: </strong>
            @foreach($blog->category as $category)
                <span><a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a></span>
            @endforeach
        </div>
    </article> 
    </div>

@endsection