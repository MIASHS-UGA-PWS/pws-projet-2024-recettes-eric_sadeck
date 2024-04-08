@extends('layouts.main')

@section('content')
    <h1 class="has-text-weight-bold"> Préparation recette : {{ $recipe->title }}</h1> <br>

    {{-- <p>{{ $recipe->price }}</p> --}}

    <p><strong>Ingredients : </strong>{{ $recipe->ingredients }}</p>

    <p><strong>Contenu : </strong>{{ $recipe->content }}</p> <br>


    <a href="{{ route('recipes.edit', $recipe) }}">Modifier</a>



    <form action="{{ route('recipes.destroy', $recipe) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Supprimer</button>
    </form>

    <a href="{{ route('recipes.index') }}" class="btn btn-secondary">Retour au menu précédent</a>

@endsection
