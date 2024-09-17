@extends('layouts.main')

@section('content')
    <div class="container my-5">

        <h2>{{ $comics->title }}</h2>

        <div>
            <img src="{{ $comics->thumb }}" alt="{{ $comics->title }}">
        </div>

        <div>
            <h4>Descrizione</h4>
            <p>
                {{ $comics->description }}
            </p>

            <h4>Tipologia</h4>
            <p>
                {{ $comics->type }}
            </p>

            <h4>Serie</h4>
            <p>
                {{ $comics->series }}
            </p>

            <h4>Data di uscita</h4>
            <p>
                {{ $comics->sale_date }}
            </p>

            <h4>Prezzo</h4>
            <p>
                {{ $comics->price }}
            </p>
        </div>

        <a class="btn btn-primary" href="{{ route('comics.index') }}">Torna indietro</a>
    </div>
@endsection


@section('titlePage')
    dettaglio fumetto
@endsection
