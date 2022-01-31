<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use App\Service\CriarSerie;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TemporadaController extends Controller
{    
    public function index(int $serieId): View
    {
        $serie = Serie::find($serieId);
        $temporadas = Serie::find($serieId)->temporadas;

        return View('temporadas.index', compact('temporadas', 'serie'));
    }

    public function create(int $serieId): View
    {
        $serie = Serie::find($serieId);

        return View('temporadas.create', compact('serie'));
    }

    public function store(Request $request, int $serieId, CriarSerie $criarSerie)
    {
        $serie = Serie::find($serieId);
        $temporadas = $request->get('temporada');
        $epTemporada = $request->get('ep_tempo');

        //$temporadas = $criarSerie->criaTempoarada($serie, $temporadas, $epTemporada);

        $request->session()->flash('msg', "Serie {$serie->nome}, Created More Temps and Eps With Success!");

        return \redirect("series/{$serieId}/temporadas");
    }
}
