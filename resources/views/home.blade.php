{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layouts.main')



@section('content')
    <div class="container my-5">
        <h1>{{ $title }}</h1>
        <h3>Nel database sono presenti {{ $num_fumetti }} fumetti</h3>
        <h4>Ultimo fumetto inserito: {{ $last_fumetto }}</h4>

    </div>
@endsection


@section('titlePage')
    home
@endsection
