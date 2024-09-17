@extends('layouts.main')



@section('content')
    <div class="container my-5">
        <h1>Nuovo Fumetto</h1>
        <form class="py-5" action="{{ route('comics.store') }}" method="POST">
            {{-- questo è un token di sicurezza che deve essere presente in tutti i form --}}
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci il titolo">
            </div>
            <div class="mb-3">
                <label for="thumb" class="form-label">Immagine fumetto</label>
                <input type="text" class="form-control" id="thumb"
                    name="thumb"placeholder="Inserisci il Percorso immagine">
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Tipo</label>
                <input type="text" class="form-control" id="type" name="type"placeholder="Inserisci il Tipo">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="text" class="form-control" id="price" name="price"placeholder="Inserisci il Prezzo">
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">Serie</label>
                <input type="text" class="form-control" id="series" name="series"placeholder="Inserisci la Serie">
            </div>
            <div class="mb-3">
                <label for="sale_date" class="form-label">Data di Uscita</label>
                <input type="text" class="form-control" id="sale_date"
                    name="sale_date"placeholder="Inserisci la Data di Uscita">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" name="description"cols="30" rows="10"
                    placeholder="Inserisci la Descrizione"></textarea>
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
