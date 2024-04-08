@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Users</h1>
                <a href="{{ route('user.create') }}" class="btn btn-primary">Add User</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                {{-- <td>{{ $user->name }}</td> --}}
                                <td><a href="/admin/user/{{ $user->id }}">{{ $user->name }}</a></td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role_names ?: 'No Role' }}</td>
                                <td>
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">Modifier</a>
                                    {{-- <a href="{{ route('user.show', $user->id) }}" class="btn btn-info">View</a> --}}
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
