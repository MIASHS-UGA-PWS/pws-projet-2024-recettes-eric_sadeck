@extends('layouts.main')
{{--
@section('content')
    <h1>{{ $recipe->title }}</h1>
    <h1>{{ $recipe->user->name }}</h1>
    <p>{{ $recipe->description }}</p>
@endsection --}}


@section('content')
    <h1 class="has-text-weight-bold">{{ $recipe->title }}</h1>
    <p>par {{ $recipe->user->name }}</p> <br>
    <p><strong>Ingredients:</strong> {{ $recipe->ingredients }}</p>
    <p><strong>Content:</strong> {{ $recipe->content }}</p>
@endsection
