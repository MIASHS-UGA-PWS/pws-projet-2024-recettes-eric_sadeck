
@extends('layouts.main')
@section('content')
<h2 class="mt-2 mb-4 is-size-1 is-size-3-mobile has-text-weight-bold has-text-left">Les 3 dernières recettes : </h2>

<div class="columns is-multiline">
    @foreach ($recipes as $recipe)
        <div class="column is-4 mb-5">
            <span><small class="has-text-grey-dark">{{ $recipe->created_at->format('d M Y H:i') }}</small></span>
            <h2 class="mt-2 mb-2 is-size-3 is-size-4-mobile has-text-weight-bold has-text-black">
                {{-- <a href="/recettes/{{ $recipe->url }}">{{ $recipe->title }}</a> --}}
                <a href="/recettes/{{ $recipe->url }}" class="has-text-grey-dark">{{ $recipe->title }}</a>

            </h2>
            <p><strong>Créé(e) par </strong>{{ $recipe->user->name }}</p> <br>
            <p><strong>Note moyenne :</strong> {{ $recipe->ratings()->avg('stars') ?? 'Pas encore noté' }}</p>
            <p><strong>Prix : </strong>{{ $recipe->price }}</p> <br>
            <p><strong>Ingredients:</strong> {{ $recipe->ingredients }}</p>
            <p><strong>Content:</strong> {{ $recipe->content }}</p>
            {{-- <a href="{{ route('recettes.show', $recipe) }}">Read More</a> --}}
            <a href="{{ url('recettes/' . $recipe->url) }}">Read More</a>
        </div>
    @endforeach
</div>
  {{-- <ul>
    @foreach ( $recipes as $recipe )

  <li>{{ $recipe->title }}</li>
    @endforeach
</ul> --}}
@endsection

