@extends('layouts.main')

@section('content')
    <h1>Ajouter une nouvelle recette</h1>

    <form action="{{ route('recipes.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="content">Contenu</label>
            <textarea id="content" name="content" required></textarea>
        </div>

        <div class="form-group">
            <label for="ingredients">Ingrédients</label>
            <textarea id="ingredients" name="ingredients" required></textarea>
        </div>

        <div class="form-group">
            <label for="price">Prix</label>
            <textarea id="price" name="price" required></textarea>
        </div>

        <button type="submit">Ajouter</button>
    </form>
@endsection
