@extends('layouts.main')

@section('content')
    <h1>Modifier la recette</h1>

    <form action="{{ route('recipes.update', $recipe) }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title"><strong>Titre : </strong></label> <br>
            <input type="text" id="title" name="title" value="{{ $recipe->title }}" required>
        </div>

        <div class="form-group">
            <label for="ingredients"><strong>Ingrédients : </strong></label>  <br>
            <textarea id="ingredients" name="ingredients" required>{{ $recipe->ingredients }}</textarea>
        </div>

        <div class="form-group">
            <label for="content"><strong>Content :</strong></label> <br>
            <textarea id="content" name="content" required style="width: 100%;" rows="10">{{ $recipe->content }}</textarea>
        </div>

        <div class="form-group">
            <label for="price"><strong>Prix :</strong></label><br>
            <textarea id="price" name="price" required>{{ $recipe->price }}</textarea>
        </div>
            <br>
        <button type="submit">Mettre à jour</button>
    </form>
@endsection
