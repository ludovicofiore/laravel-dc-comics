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

        <form action="{{ route('comics.update', $comics) }}" method="post">
            @csrf

            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                    value="{{ old('title', $comics->title) }}">
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="thumb" class="form-label">Url immagine</label>
                <input type="text" class="form-control @error('thumb') is-invalid @enderror" name="thumb"
                    id="thumb" value="{{ old('thumb', $comics->thumb) }}">
                @error('thumb')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Tipologia</label>
                <input type="text" class="form-control @error('type') is-invalid @enderror" name="type" id="type"
                    value="{{ old('type', $comics->type) }}">
                @error('type')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">Serie</label>
                <input type="text" class="form-control @error('series') is-invalid @enderror" name="series"
                    id="series" value="{{ old('series', $comics->series) }}">
                @error('series')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                    id="price" value="{{ old('price', $comics->price) }}">
                @error('price')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="sale_date" class="form-label">Data di uscita (AAAA-MM-GG)</label>
                <input type="date" class="form-control @error('sale_date') is-invalid @enderror" name="sale_date"
                    id="sale_date" value="{{ old('sale_date', $comics->sale_date) }}">
                @error('sale_date')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                    style="height: 100px">{{ old('description', $comics->description) }}</textarea>
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection


@section('titlePage')
    modifica fumetto
@endsection
