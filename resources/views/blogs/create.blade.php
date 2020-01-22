@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Create a new Blog</h1>
        </div>

        <div class="colmd-12">
            <form action="{{route('blogs.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="title">Body</label>
                    <textarea name="body" class="form-control"></textarea>
                </div>

                <button class="btn btn-primary" type="submit">Create a new blog</button>

            </form>
        </div>
    </div>

@endsection