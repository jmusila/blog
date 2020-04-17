@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="jumbotron">
        <h1>Trashed Blogs</h1>
    </div>
</div>
<div class="col-md-12">
    @foreach($trashedBlogs as $blog)
        <h2>{{ $blog->title }}</h2>
        <p>{{ $blog->body }}</p>

    <div class="btn-group">
    <!-- restore -->
    <form method="get" action="{{ route('blogs.restore', $blog->id) }}">
        @csrf
        <button type="submit" class="btn btn-success btn-xs pull-left btn-margin-right">
            Restore
        </button>
    </form>

    <!-- permanent-delete -->
    <form method="post" action="{{ route('blogs.permanent-delete', $blog->id) }}">
        @csrf
        {{ method_field('delete') }}
        <button type="submit" class="btn btn-danger btn-xs pull-left btn-margin-right">
            Permanent delete
        </button>
    </form> 
    </div>
    @endforeach

</div>


@endsection