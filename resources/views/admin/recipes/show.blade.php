@extends('layouts.main')

@section('content')
    <h1> Titre : {{ $recipe->title }}</h1>

    <p>{{ $recipe->content }}</p>

    <p>{{ $recipe->price }}</p>

    <p>{{ $recipe->ingredients }}</p>

    <a href="{{ route('recipes.edit', $recipe) }}">Modifier</a>

    <form action="{{ route('recipes.destroy', $recipe) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Supprimer</button>
    </form>
@endsection
