<form class="d-inline" action="{{ route('comics.destroy', $comic) }}" method="POST"
    onsubmit="return confirm('Sei sicuro di eliminare il fumetto: {{ $comic->title }} ?')">
    @csrf
    @method('DELETE')

    <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i></button>

</form>
