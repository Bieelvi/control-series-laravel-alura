@extends('layout')

@section('header')
    Temporadas de {{ $serie->nome }}
@endsection

@section('content')
    <ul class="list-group mt-3">
        @foreach ($temporadas as $temporada)
            <li class="list-group-item d-flex justify-content-between">
                <a href="/temporadas/{{ $temporada->id }}/episodios"> Temporada {{ $temporada->numero }} </a>   
        
                <span>
                    {{ $temporada->getEpisodiosAssistidos()->count() }} / {{ $temporada->episodios->count() }}
                </span>               
            </li>
        @endforeach
    </ul>
@endsection