@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Manage Users</h1>
        </div>
        <div class="col-md-12">
            <div class="row">
            @foreach($users as $user)
                <form action="{{ route('users.update', $user->id) }}" method="post">
                {{ method_field('patch') }}
                    @csrf
                    <div class="form-group">
                        <input class="form-control" value="{{ $user->name }}" disabled>
                    </div>

                    <div class="form-group">
                        <select name="role_id" class="form-control">
                            <option selected>{{ $user->role->name }}</option>
                            <option value="2">Author</option>
                            <option value="3">Subscriber</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input class="form-control" value="{{ $user->email }}" disabled>
                    </div>

                    <div class="form-group">
                        <input class="form-control" value="{{ $user->created_at ->diffForHumans() }}" disabled>
                    </div>
                    <button class="btn btn-primary btn-xs pull-left col-md-6">Update</button>
                </form>


            @endforeach
            </div>
        </div>
    </div>

@endsection