@extends('layout')

@section('header')
    Adicionar Série
@endsection

@section('content')
    <form method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col-8">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" required>            
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
           
        <div class="row">
            <div class="form-group col-12">
                <label for="capa">Capa</label>
                <input type="file" class="form-control" name="capa" id="capa">    
            </div>    
        </div> 
        <button href="/series/criar" class="btn btn-primary mt-2">Adicionar</button>
    </form>
@endsection  
