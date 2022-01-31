@extends('layout')

@section('header')
    Criar Mais Temporada na Série {{ $serie->nome }}
@endsection

@section('content')
    <form method="post">
        @csrf
        <div class="row">
            <div class="form-group col-8">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" value="{{ $serie->nome }}">            
            </div>

            <div class="form-group col-2">
                <label for="temporada">Temporadas</label>
                <input type="number" class="form-control" name="temporada" id="temporada" required>            
            </div>

            <div class="form-group col-2">
                <label for="ep_tempo">Episódios por Temporada</label>
                <input type="number" class="form-control" name="ep_tempo" id="ep_tempo" required>            
            </div>
        </div>       

        <button href="/series/{{ $serie->id }}/temporadas/criar" class="btn btn-primary mt-2">Adicionar</button>
    </form>
@endsection