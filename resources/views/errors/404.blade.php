{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layouts.main')

@section('content')
    <div class="container my-5">
        <h1>ERRORE 404!</h1>
        <P>Pagina non trovata!</P>

    </div>
@endsection


@section('titlePage')
    404-error
@endsection
