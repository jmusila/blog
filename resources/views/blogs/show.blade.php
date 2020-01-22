@extends('layouts.app')

@section('content')

    <div class="container-fluid">
    <article>
        <div class="jumbotron">
            <h1>{{ $blog->title }}</h1>
            <a class="btn btn-primary btn-xs pull-left" href="{{ route('blogs.edit', $blog->id) }}">Edit  </a>
            <form action="{{ route('blogs.delete', $blog->id) }}" method="post">
            @csrf
                {{ method_field('delete') }}
                <button type="submit" class="btn btn-danger btn-xs pull-left">Delete</button>
            </form>
        </div>

        <div class="colmd-12">
            <p>{{ $blog->body }}</p>
        </div>
    </article>
    </div>

@endsection