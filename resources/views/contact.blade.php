

@extends('layouts.main')

@section('content')
    <!-- Votre contenu ici -->
    <form method="POST" action="/contact">
    @csrf
    <label for="name">Nom:</label><br>
    <input type="text" id="name" name="name"><br>
    @error('name') <div>{{ $message }}</div> @enderror
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email"><br>
    @error('email') <div>{{ $message }}</div> @enderror
    <label for="message">Message:</label><br>
    <textarea id="message" name="message"></textarea><br>
    @error('message') <div>{{ $message }}</div> @enderror
    <input type="submit" value="Envoyer">
</form>
@endsection

