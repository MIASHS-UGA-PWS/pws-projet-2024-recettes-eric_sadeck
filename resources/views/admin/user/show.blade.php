@extends('layouts.main')

@section('content')
    <h1>User Details</h1>

    <p>Name: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Role: {{ $user->roles->pluck('name')->join(', ') }}</p>

    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Edit</a>

    <form action="{{ route('user.destroy', $user->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>

    <a href="{{ route('user.index') }}" class="btn btn-secondary">Back to Index</a>
@endsection
