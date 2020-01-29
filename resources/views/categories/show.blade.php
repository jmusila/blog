@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <h1>{{ $category->name }}</h1>

        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm btn-margin-right">Edit</a>
    </div>



@endsection