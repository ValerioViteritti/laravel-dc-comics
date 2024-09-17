<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><i class="fa-solid fa-book"></i> Comics</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
                <a class="nav-link" href="{{ route('about') }}">Chi siamo</a>
                <a class="nav-link" href="{{ route('comics.index') }}">I miei Fumetti</a>
                <a class="nav-link" href="{{ route('comics.create') }}">Nuovo fumetto</a>
                <a class="nav-link" href="{{ route('contacts') }}">Contatti</a>
            </div>
        </div>
    </div>
</nav>
