@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Liste des recettes</h1>
                <a href="{{ route('recipes.create') }}" class="btn btn-primary">Ajouter une recette</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Auteur</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recipes as $recipe)
                            <tr>
                                <td>{{ $recipe->id }}</td>
                                <td><a href="/admin/recipes/{{ $recipe->url }}">{{ $recipe->title }}</a></td>
                                <td>{{ $recipe->user->name }}</td>
                                <td>
                                    <a href="{{ route('recipes.edit', $recipe->url) }}" class="btn btn-warning">Modifier</a>
                                    <form action="{{ route('recipes.destroy', $recipe->url) }}" method="POST" style="display: inline;">
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
