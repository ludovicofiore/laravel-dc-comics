@extends('layouts.main')

@section('content')
    <div class="container my-5 d-flex flex-wrap">

        @foreach ($comics as $comic)
            <div class="card" style="width: 18rem;">
                <img src="{{ $comic->thumb }}" class="card-img-top" alt="{{ $comic->title }}">
                <div class="card-body">
                    <h3 class="card-title">{{ $comic->title }}</h3>
                    <h5>{{ $comic->price }}</h5>
                    <a href="{{ route('comics.show', $comic->id) }}" class="btn btn-primary">Dettagli</a>
                    <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-warning">Modifica</a>
                </div>
            </div>
        @endforeach

    </div>
@endsection


@section('titlePage')
    fumetti
@endsection
