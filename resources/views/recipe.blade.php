@extends('layouts.main')

@section('content')
    @if($recipes->isEmpty())
        <p>No recipe found.</p>
    @else
    <div class="columns is-multiline">
    @foreach ($recipes as $recipe)
        <div class="column is-4 mb-5">
            <span><small class="has-text-grey-dark">{{ $recipe->created_at->format('d M Y H:i') }}</small></span>
            <h2 class="mt-2 mb-2 is-size-3 is-size-4-mobile has-text-weight-bold has-text-black">
                <a href="/recettes/{{ $recipe->url }}" class="has-text-grey-dark">{{ $recipe->title }}</a>
            </h2>
            <p><strong>Note moyenne :</strong> {{ $recipe->ratings()->avg('stars') ?? 'Pas encore noté' }}</p>
            <p>par {{ $recipe->user->name }}</p> <br>
            <p><strong>Ingredients:</strong> {{ $recipe->ingredients }}</p>
            <p><strong>Content:</strong> {{ $recipe->content }}</p>
            <a href="{{ url('recettes/' . $recipe->url) }}">Read More</a>

            <!-- Formulaire de notation -->
            <form action="{{ route('ratings.store', ['recipe' => $recipe->id]) }}" method="POST">
                @csrf
                <label for="score">Note :</label>
                <select name="score" id="score">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <button type="submit">Noter</button>
            </form>
        </div>
    @endforeach
</div>
    @endif
@endsection
