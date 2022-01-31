<?php

namespace App\Http\Controllers;

use App\Models\Episodio;
use App\Models\Temporada;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EpisodioController extends Controller
{    
    public function index(int $temporadaId, Request $request): View
    {
        $temporada = Temporada::find($temporadaId);

        $episodios = $temporada->episodios;
        $temporadaId = $temporada->id;        
        $msg = $request->session()->get('msg');

        return View('episodios.index', compact('episodios', 'temporadaId', 'msg'));
    }

    public function assistir(int $temporadaId, Request $request)
    {
        $temporada = Temporada::find($temporadaId);
        $assistidos = $request->episodios;

        $temporada->episodios->each(function (Episodio $episodio) use ($assistidos) {
            $episodio->assistido = in_array($episodio->id, $assistidos);
        });

        $temporada->push();

        $request->session()->flash('msg', "Episódios assitidos");

        return \redirect()->back();
    }
}
