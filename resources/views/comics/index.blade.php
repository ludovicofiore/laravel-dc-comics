@extends('layouts.main')

@section('content')
    @if (session('deleted'))
        <div class="alert alert-success container my-5" role="alert">
            {{ session('deleted') }}
        </div>
    @endif

    <div class="container my-5 d-flex flex-wrap">


        @foreach ($comics as $comic)
            <div class="card" style="width: 18rem;">
                <img src="{{ $comic->thumb }}" class="card-img-top" alt="{{ $comic->title }}">
                <div class="card-body">
                    <h3 class="card-title">{{ $comic->title }}</h3>
                    <h5>{{ $comic->price }}</h5>
                    <a href="{{ route('comics.show', $comic->id) }}" class="btn btn-primary">Dettagli</a>
                    <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-warning">Modifica</a>

                    {{-- form per pulsante delete --}}
                    <form action="{{ route('comics.destroy', $comic) }}" method="post"
                        onsubmit="return confirm('Sei sicuro di voler eliminare {{ $comic->title }}?')">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger" type="submit">Elimina</button>
                    </form>
                </div>
            </div>
        @endforeach

    </div>
@endsection


@section('titlePage')
    fumetti
@endsection
