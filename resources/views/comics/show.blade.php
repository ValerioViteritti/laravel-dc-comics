@extends('layouts.main')



@section('content')
    <div class="container my-5">
        <h1>{{ $comic->title }} <a href="{{ route('comics.edit', $comic) }}" class="btn btn-warning" title="modifica">
                <i class="fa-solid fa-pen"></i></a>
            <form class="d-inline" action="{{ route('comics.destroy', $comic) }}" method="POST"
                onsubmit="return confirm('Sei sicuro di eliminare il fumetto: {{ $comic->title }} ?')">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i></button>

            </form>

        </h1>


        <div class="row justify-content-center align-items-center g-2">
            <div class="col"><b>Descrizione:</b> <br> {{ $comic->description }}</div>
            <div class="col"><img class="img-fluid" src="{{ $comic->thumb }}" alt=""></div>
            <div class="col text-center"><b>Prezzo:</b> <br>{{ $comic->price }}</div>
        </div>
        <a href="{{ route('comics.index') }}" class="btn btn-warning">Torna alla lista dei fumetti</a>




    </div>
@endsection


@section('titlePage')
    Dettagli Fumetto
@endsection
