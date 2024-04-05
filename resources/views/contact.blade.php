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
    <h1>Contactez nous</h1>
    {{-- @if (session('success'))
    <script>
        alert('{{ session('success') }}');
    </script>
@endif --}}
@if (session('success'))
    <script>
        function customAlert(message) {
    // Create an alert box
    var alertBox = document.createElement('div');
    alertBox.style.backgroundColor = 'blue';
    alertBox.style.color = 'white';
    alertBox.style.padding = '20px';
    alertBox.style.position = 'fixed';
    alertBox.style.bottom = '20px';
    alertBox.style.right = '20px';
    alertBox.style.zIndex = '1000';

    // Create a message
    var alertMessage = document.createElement('p');
    alertMessage.textContent = message;
    alertBox.appendChild(alertMessage);

    // Add the alert box to the body
    document.body.appendChild(alertBox);

    // Remove the alert box after 5 seconds
    setTimeout(function() {
        document.body.removeChild(alertBox);
    }, 5000);
}
        customAlert('{{ session('success') }}');
    </script>
@endif
    <form action="{{ route('contact.store') }}" method="post">
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


