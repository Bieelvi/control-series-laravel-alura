@extends('layout')

@section('header')
    Série
@endsection

@section('content')
    @include('msg', ['msg' => $msg])

    @auth
    <a href="/series/criar" class="btn btn-dark mt-2 mb-2">
        Adicionar
    </a>
    @endauth

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="d-flex justify-content-between align-items-center list-group-item">
                <span id="nome-serie-{{ $serie->id }}">{{ $serie->nome }}</span>

                <div class="input-group w-50" hidden id="input-nome-serie-{{ $serie->id }}">
                    <input type="text" class="form-control" value="{{ $serie->nome }}">

                    <div class="input-group-append">
                        <button class="btn btn-primary" onclick="editarSerie({{ $serie->id }})">Modificar</button>
                        @csrf
                    </div>
                </div>

                <div class="d-flex">
                    @auth                       
                    <div class="mr-1">
                        <button onclick="toggleInput({{ $serie->id }})" class="btn btn-info btn-sm ml-2">Alterar</button>
                    </div>
                    @endauth

                    <div class="mr-1">
                        <a href="/series/{{ $serie->id }}/temporadas" class="btn btn-info btn-sm ml-2">Temporadas</a>
                    </div>

                    @auth
                    <div class="mr-1">
                        <form action="/series/remove/{{ $serie->id }}" method="post" onsubmit="return confirm('Excluir {{ $serie->nome }} ?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">Remover</button>
                        </form>
                    </div>  
                    @endauth                                   
                </div>               
            </li>
        @endforeach
    </ul>
@endsection

<script>
function toggleInput(serieId) {
    const nomeSerieEl = document.getElementById(`nome-serie-${serieId}`);
    const inputSerieEl = document.getElementById(`input-nome-serie-${serieId}`);
    if (nomeSerieEl.hasAttribute('hidden')) {
        nomeSerieEl.removeAttribute('hidden');
        inputSerieEl.hidden = true;
    } else {
        inputSerieEl.removeAttribute('hidden');
        nomeSerieEl.hidden = true;
    }
}

function editarSerie(serieId) {
    let formData = new FormData();

    const nome = document.querySelector(`#input-nome-serie-${serieId} > input`).value;
    const token = document.querySelector(`input[name="_token"]`).value;

    formData.append('nome', nome);
    formData.append('_token', token);

    const url = `/series/${serieId}/editaNome`;
    
    fetch(url, {
        method: 'POST',
        body: formData
    }).then(() => {
        toggleInput(serieId);
        document.getElementById(`nome-serie-${serieId}`).textContent = nome;
    });
}
</script>