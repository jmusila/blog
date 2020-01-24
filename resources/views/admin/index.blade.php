@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Admin Dashboard</h1>
         </div>
         <div class="col-md-12">
            <button class="btn btn-primary btn-margin-right">
                <a href="{{ route('blogs.create') }}" class="white-text">Create Blog</a>
            </button>

            <button class="btn btn-danger btn-margin-right">
                <a href="{{ route('blogs.trash') }}" class="white-text">Trashed Blogs</a>
            </button>            
         </div>
    </div>

@endsection