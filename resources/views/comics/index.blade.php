@extends('layouts.main')



@section('content')
    <div class="container my-5">

        {{-- se la variabile di sessione 'deleted' esiste stampo il valore  --}}
        @if (session('deleted'))
            <div class="alert alert-danger" role="alert">
                {{ session('deleted') }}
            </div>
        @endif





        <h1>Elenco fumetti</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Immagine</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Prezzo</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comics as $comic)
                    <tr>
                        <td>{{ $comic->id }}</td>
                        <td><img class="thumbnail" src="{{ $comic->thumb }}" alt="{{ $comic->title }}"></td>
                        <td>{{ $comic->title }}</td>
                        <td>{{ $comic->price }}</td>
                        <td>
                            <a href="{{ route('comics.show', $comic) }}" class="btn btn-success" title="vedi"><i
                                    class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('comics.edit', $comic) }}" class="btn btn-warning" title="modifica">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            @include('partials.formdelete')


                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>



    </div>
@endsection


@section('titlePage')
    Elenco Fumetti
@endsection
