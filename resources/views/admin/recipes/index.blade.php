@extends('layouts.main')

 @section('content')
    <h1>Liste des recettes</h1>

    @foreach ($recipes as $recipe)
        <div>
            {{-- <h2>{{ $recipe->title }}</h2> --}}
            <h2><a href="/admin/recipes/{{ $recipe->url }}">{{ $recipe->title }}</a></h2>
            <p>{{ $recipe->user->name }}</p>

            <form action="{{ route('recipes.destroy', $recipe) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Supprimer</button>
            </form>
        </div>
    @endforeach
 @endsection


