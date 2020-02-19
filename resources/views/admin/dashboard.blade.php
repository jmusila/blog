@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="jumbotron">
            @if(Auth::user() && Auth::user()->role_id === 1)
                <h1>Admin Dashboard</h1>
            @elseif(Auth::user() && Auth::user()->role_id === 2)
                <h1>Author Dashboard</h1>
            @elseif(Auth::user() && Auth::user()->role_id === 3)
                <h1>User Dashboard</h1>
             @endif
         </div>
         @if(Auth::user() && Auth::user()->role_id === 1)
         <div class="col-md-12">
                <a href="{{ route('blogs.create') }}" class="white-text btn btn-primary btn-margin-right">Create Blog</a>

                <a href="{{ route('blogs.trash') }}" class="white-text btn btn-danger btn-margin-right">Trashed Blogs</a>  

                <a href="{{ route('categories.create') }}" class="white-text btn btn-success btn-margin-right">Create Categories</a>        
         </div>
         @endif
         @if(Auth::user() && Auth::user()->role_id === 2)
         <div class="col-md-12">
                <a href="{{ route('blogs.create') }}" class="white-text btn btn-primary btn-margin-right">Create Blog</a>  
                <a href="{{ route('categories.create') }}" class="white-text btn btn-success btn-margin-right">Create Categories</a>        
         </div>
         @endif
         @if(Auth::user() && Auth::user()->role_id === 3)
         <div class="col-md-12">
                <a href="#" class="white-text btn btn-primary btn-margin-right">What can I do?</a>       
         </div>
         @endif
    </div>

@endsection