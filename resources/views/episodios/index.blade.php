@extends('layout')

@section('header')
    Episódios
@endsection

@section('content')
    @include('msg', ['msg' => $msg])

    <form action="/temporadas/{{ $temporadaId }}/episodios/assistir" method="post">
        @csrf
        <ul class="list-group mt-3">
            @foreach ($episodios as $episodio)
                <li class="list-group-item d-flex justify-content-between">
                    Episódio {{ $episodio->numero }}
                    <input type="checkbox" name="episodios[]" value="{{ $episodio->id }}" {{ $episodio->assistido ? 'checked' : '' }}>       
                </li>
            @endforeach
        </ul>

        <button class="btn btn-primary mt-2 mb-2">Salvar</button>
    </form>
@endsection