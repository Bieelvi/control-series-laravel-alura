<?php 

namespace App\Service;

use App\Models\Serie;
use App\Models\Temporada;
use Illuminate\Support\Facades\DB;

class CriarSerie
{
    public function criarSerie(string $nome, int $temporadas, int $epTemporada, $capa): ?Serie
    {
        DB::beginTransaction();

        $serie = Serie::create(['nome' => $nome, 'capa' => $capa]);
        $this->criaTempoarada($serie, $temporadas, $epTemporada);
            
        DB::commit();
        
        return $serie;
    }

    public function criaTempoarada(Serie $serie, int $temporadas, int $epTemporada)
    {
        for ($i = 1; $i <= $temporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);
            $this->criaEpisodio($temporada, $epTemporada, $i);
        }
    }

    public function criaEpisodio(Temporada $temporada, int $epTemporada)
    {
        for ($j = 1; $j <= $epTemporada; $j++) {
            $temporada->episodios()->create(['numero' => $j]);
        }
    }
}
