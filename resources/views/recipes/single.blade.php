@extends('layouts.main')

@section('content')
    <h1 class="has-text-weight-bold">{{ $recipe->title }}</h1>
    <p> Créé(e) par {{ $recipe->user->name }}</p> <br>
    <p><strong>Ingredients:</strong> {{ $recipe->ingredients }}</p>
    <p><strong>Content:</strong> {{ $recipe->content }}</p>

    <!-- <form action="{{ route('ratings.store', ['recipe' => $recipe->id]) }}" method="POST">
        @csrf
        <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
        <select name="stars">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <button type="submit">Noter</button>
        <p>Average rating: {{ $recipe->averageRating() }}</p>
    </form> -->
    <h2>Commentaire</h2>
        <!-- Formulaire de commentaires -->
        <form action="{{ route('comments.store', ['recipe' => $recipe->id]) }}" method="POST">
    @csrf
    <textarea name="content"></textarea>
    <button type="submit">Submit</button>
</form>

<!-- Liste des commentaires -->
@foreach($recipe->comments as $comment)
    <p>{{ $comment->content }}</p>
@endforeach
@endsection
