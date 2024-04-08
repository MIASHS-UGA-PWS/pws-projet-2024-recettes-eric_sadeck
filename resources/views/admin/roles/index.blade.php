@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-2 mb-4 is-size-1 is-size-3-mobile has-text-weight-bold has-text-left">Gestion des rôles</h2>

                <a href="{{ route('roles.create') }}" class="btn btn-primary px-2 py-1">Créer un rôle</a>
                <h2 class="mt-2 mb-4 is-size-0 is-size-3-mobile has-text-weight-bold has-text-left">Liste des rôles : </h2>

                    <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                {{-- <td>{{ $role->name }}</td> --}}
                                <td><a href="/admin/roles/{{ $role->id }}">{{ $role->name }}</a></td>
                                <td>
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning">Edit</a>
                                    {{-- <a href="{{ route('roles.show', $role->id) }}" class="btn btn-info">View</a> --}}
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
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
