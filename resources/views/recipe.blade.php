@extends('layouts.main')

@section('content')
    @if($recipe)
        <h1>{{ $recipe->title }}</h1>
        <p>{{ $recipe->description }}</p>
    @else
        <p>No recipe found.</p>
    @endif
@endsection
