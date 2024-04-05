@extends('layouts.main')

@section('content')
    <h1>Modifier la recette</h1>

    <form action="{{ route('recipes.update', $recipe) }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" id="title" name="title" value="{{ $recipe->title }}" required>
        </div>

        <div class="form-group">
            <label for="ingredients">Ingrédients</label>
            <textarea id="ingredients" name="ingredients" required>{{ $recipe->ingredients }}</textarea>
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea id="content" name="content" required>{{ $recipe->content }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Prix</label>
            <textarea id="price" name="price" required>{{ $recipe->price }}</textarea>
        </div>

        <button type="submit">Mettre à jour</button>
    </form>
@endsection
