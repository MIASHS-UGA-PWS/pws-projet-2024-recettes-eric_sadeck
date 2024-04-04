
@extends('layouts.main')
@section('content')
  <h1></h1>
  <ul>
    @foreach ( $recipes as $recipe )

  <li>{{ $recipe->title }}</li>
    @endforeach
</ul>
@endsection

