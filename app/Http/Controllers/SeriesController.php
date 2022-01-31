<?php

namespace App\Http\Controllers;

use App\Events\NovaSerie as EventsNovaSerie;
use App\Mail\NovaSerie;
use App\Models\Serie;
use App\Models\User;
use App\Service\CriarSerie;
use App\Service\RemoveSerie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class SeriesController extends Controller
{
    public function create(): View
    {
        return View('series.create');
    }

    public function index(Request $request): View
    {
        $series = Serie::query()->orderBy('nome')->get();

        $msg = $request->session()->get('msg');

        return View('series.index', compact('series', 'msg'));
    }

    public function store(Request $request, CriarSerie $serie)
    {
        $nome = $request->get('nome');
        $temporadas = $request->get('temporada');
        $epTemporada = $request->get('ep_tempo');

        event(new EventsNovaSerie($nome, $temporadas, $epTemporada));        

        $serie = $serie->criarSerie($nome, $temporadas, $epTemporada);

        $request->session()->flash('msg', "Serie {$nome}, Temp: {$temporadas}, Eps: {$epTemporada} Created With Success!");

        return \redirect('/series');
    }

    public function destroy(Request $request, RemoveSerie $removeSerie)
    {
        $serie = $removeSerie->removeSerie($request->id);

        $request->session()->flash('msg', "Serie {$serie} Removed With Success!");

        return \redirect('/series');
    }

    public function editaNome(int $id, Request $request)
    {
        $serie = Serie::find($id);

        $serie->nome = $request->nome;

        $serie->save();
    }
}
