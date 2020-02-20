@extends('layouts.app')

@section('content')
@include('partials.tinymce')

    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Create a new Blog</h1>
        </div>

        <div class="colmd-12">
            <form action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data">

            @if(count($errors))
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li style="list-style-type:none">{{ $error }}</li>
                    @endforeach
                </div>
            @endif

                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="title">Body</label>
                    <textarea name="body" class="form-control my-editor">{!! old('body') !!}</textarea>
                </div>

                <div class="form-group form-check form-check-inline">
                    @foreach($categories as $category)
                        <input type="checkbox" value="{{ $category->id }}" name="category_id[]" class="form-check-input">
                        <label class="form-check-label btn-margin-right">{{ $category->name }}</label>
                    @endforeach
                </div>
                
                <div class="form-group">
                    <label for="featured_image">Featured Image</label>
                    <input type="file" name="featured_image" class="form-control">
                </div>

                <div>
                    <button class="btn btn-primary" type="submit">Create a new blog</button>
                </div>

            </form>
        </div>
    </div>

@endsection