@extends('layouts.main')

@section('content')
    <div class="container my-5">

        <form action="{{ route('comics.update', $comics) }}" method="post">
            @csrf

            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input value="{{ $comics->title }}" type="text" class="form-control" name="title" id="title">
            </div>

            <div class="mb-3">
                <label for="thumb" class="form-label">Url immagine</label>
                <input value="{{ $comics->thumb }}" type="text" class="form-control" name="thumb" id="thumb">
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Tipologia</label>
                <input value="{{ $comics->type }}" type="text" class="form-control" name="type" id="type">
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">Serie</label>
                <input value="{{ $comics->series }}" type="text" class="form-control" name="series" id="series">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input value="{{ $comics->price }}" type="text" class="form-control" name="price" id="price">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Data di uscita</label>
                <input value="{{ $comics->sale_date }}" type="text" class="form-control" name="sale_date" id="sale_date">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" name="description" id="description" style="height: 100px"> {{ $comics->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection


@section('titlePage')
    modifica fumetto
@endsection
