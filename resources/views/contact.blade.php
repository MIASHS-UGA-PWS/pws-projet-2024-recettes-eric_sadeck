{{--

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
 --}}


 @extends('layouts.main')

@section('content')
    <h1>Contact Us</h1>

    <form action="/contact" method="post">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">

        <label for="message">Message:</label>
        <textarea id="message" name="message"></textarea>

        <input type="submit" value="Submit">
    </form>
@endsection


