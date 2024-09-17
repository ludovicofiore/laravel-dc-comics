@extends('layouts.main')

@section('content')
    @if (session('deleted'))
        <div class="alert alert-success container my-5" role="alert">
            {{ session('deleted') }}
        </div>
    @endif

    <div class="container my-5 d-flex flex-wrap justify-content-between">


        @foreach ($comics as $comic)
            <div class="card" style="width: 18rem;">
                <img src="{{ $comic->thumb }}" class="card-img-top" alt="{{ $comic->title }}">
                <div class="card-body">
                    <h3 class="card-title">{{ $comic->title }}</h3>
                    <h5>{{ $comic->price }}</h5>

                    <div class="d-flex justify-content-around">

                        <a href="{{ route('comics.show', $comic->id) }}" class="btn btn-primary" title="Dettagli"><i
                                class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-warning" title="Modifica"><i
                                class="fa-solid fa-pencil"></i></a>

                        {{-- form per pulsante delete --}}
                        <form action="{{ route('comics.destroy', $comic) }}" method="post"
                            onsubmit="return confirm('Sei sicuro di voler eliminare {{ $comic->title }}?')">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger" type="submit" title="Elimina"><i
                                    class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection


@section('titlePage')
    fumetti
@endsection
