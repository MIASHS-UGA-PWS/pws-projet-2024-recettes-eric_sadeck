@extends('layouts.main')

@section('content')
    <h1>Edit Role</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('roles.update', $role) }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $role->name }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Role</button>
    </form>
@endsection
