<?php

namespace App\Service;

use App\Models\Episodio;
use App\Models\Serie;
use App\Models\Temporada;
use Illuminate\Support\Facades\DB;

class RemoveSerie
{
    public function removeSerie(int $serieId): string
    {
        DB::beginTransaction();
        
        $serie = Serie::find($serieId);
        $nome = $serie->nome;

        $this->removeTemporada($serie);    
        $serie->delete();

        DB::commit();     

        return $nome;
    }

    public function removeTemporada(Serie $serie): void
    {        
        $serie->temporadas->each(function(Temporada $temporadas) {
            $this->removeEpisodio($temporadas);
            $temporadas->delete();
        });  
    }

    public function removeEpisodio(Temporada $temporadas): void
    {
        $temporadas->episodios->each(function(Episodio $episodios) {
            $episodios->delete();
        });
    }
}