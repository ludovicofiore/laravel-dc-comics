@extends('layouts.main')

@section('content')
    <div class="container my-5">

        {{-- stampa errori --}}
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('comics.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
            </div>

            <div class="mb-3">
                <label for="thumb" class="form-label">Url immagine</label>
                <input type="text" class="form-control" name="thumb" id="thumb" value="{{ old('thumb') }}">
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Tipologia</label>
                <input type="text" class="form-control" name="type" id="type" value="{{ old('type') }}">
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">Serie</label>
                <input type="text" class="form-control" name="series" id="series" value="{{ old('series') }}">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="text" class="form-control" name="price" id="price" value="{{ old('price') }}">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Data di uscita (AAAA-MM-GG)</label>
                <input type="text" class="form-control" name="sale_date" id="sale_date" value="{{ old('sale_date') }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" name="description" id="description" style="height: 100px">{{ old('description') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection


@section('titlePage')
    nuovo fumetto
@endsection
