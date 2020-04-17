@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Edit category</h1>
        </div>

        <div class="colmd-12">
            <form action="{{ route('categories.update', $category->id) }}" method="post">
            {{ method_field('patch') }}
                @csrf
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                </div>

                <button class="btn btn-primary" type="submit">Edit category</button>

            </form>
        </div>
    </div>

@endsection