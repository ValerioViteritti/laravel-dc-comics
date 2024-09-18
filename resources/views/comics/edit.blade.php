@extends('layouts.main')



@section('content')
    <div class="container my-5">
        <h1>Modifica Fumetto Comic {{ $comic->title }}</h1>

        {{-- se sono presenti degli errori stampo --}}
        {{-- $errors->any() è true se sono presenti degli errori in sessione --}}
        {{-- $errors->all() mi restituisce un array con la lista degli errori --}}
        @dump($errors)
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif


        <form class="py-5" action="{{ route('comics.update', $comic) }}" method="POST">
            {{-- questo è un token di sicurezza che deve essere presente in tutti i form --}}
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Titolo (*)</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    placeholder="Inserisci il titolo" value="{{ old('title', $comic->title) }}">
                {{-- se è presente l'errore su 'title' stampo il tag con dentro l'errore --}}
                {{-- l'errore se presente lo trovo dentro la variabile message --}}
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>
            <div class="mb-3">
                <label for="thumb" class="form-label">Immagine fumetto (*)</label>
                <input type="text" class="form-control @error('thumb') is-invalid @enderror" id="thumb"
                    name="thumb"placeholder="Inserisci il Percorso immagine" value="{{ old('thumb', $comic->thumb) }}">

                @error('thumb')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Tipo (*)</label>
                <input type="text" class="form-control @error('type') is-invalid @enderror" id="type"
                    name="type"placeholder="Inserisci il Tipo" value="{{ old('type', $comic->type) }}">

                @error('type')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo (*)</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price"
                    name="price"placeholder="Inserisci il Prezzo" value="{{ old('price', $comic->price) }}">

                @error('price')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">Serie (*)</label>
                <input type="text" class="form-control @error('series') is-invalid @enderror" id="series"
                    name="series"placeholder="Inserisci la Serie" value="{{ old('series', $comic->series) }}">

                @error('series')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="sale_date" class="form-label">Data di Uscita (*)</label>
                <input type="text" class="form-control @error('sale_date') is-invalid @enderror" id="sale_date"
                    name="sale_date"placeholder="Inserisci la Data di Uscita"
                    value="{{ old('sale_date', $comic->sale_date) }}">

                @error('sale_date')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione (*)</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"cols="30"
                    rows="10" placeholder="Inserisci la Descrizione">{{ old('description') }}</textarea>

                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <button type="submit" href='#' class="btn btn-success">Invia</button>
                <button type="reset" href='#' class="btn btn-warning">Annulla</button>
            </div>




        </form>



    </div>
@endsection


@section('titlePage')
    Nuovo Fumetto
@endsection
