@extends('layouts.app')

@section('content')
@include('partials.tinymce')

    <div class="container">
        <div class="jumbotron">
            <h1>Edit | {{$blog->title}}</h1>
        </div>

        <div class="colmd-12">
            <form action="{{ route('blogs.update', $blog->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{ method_field('patch') }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $blog->title }}">
                </div>

                <div class="form-group">
                    <label for="title">Body</label>
                    <textarea name="body" class="form-control my-editor">{{ $blog->body }}</textarea>
                </div>

                <div class="form-group form-check form-check-inline">
                {{ $blog->category->count()  ? 'Current categories:  ' : ''}} &nbsp
                    @foreach($blog->category as $category)
                        <input type="checkbox" value="{{ $category->id }}" name="category_id[]" 
                        class="form-check-input" checked>
                        <label class="form-check-label btn-margin-right">{{ $category->name }}</label>
                    @endforeach
                </div>

                <div class="form-group form-check form-check-inline">
                {{ $filtered->count()  ? 'Unused categories:  ' : ''}} &nbsp
                    @foreach($filtered as $category)
                        <input type="checkbox" value="{{ $category->id }}" name="category_id[]" 
                        class="form-check-input">
                        <label class="form-check-label btn-margin-right">{{ $category->name }}</label>
                    @endforeach
                </div>

                <div class="form-group">
                  <label class="btn btn-default">
                   <span class="btn btn-outline btn-sm btn-info">Featured Image</span>
                   <input type="file" name="featured_image" class="form-control" hidden>
                 </label>
               </div>

                <div>
                <button class="btn btn-primary" type="submit">Update blog</button>
                </div>


            </form>
        </div>
    </div>

@endsection