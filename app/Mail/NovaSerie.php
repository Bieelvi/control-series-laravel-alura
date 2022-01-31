<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NovaSerie extends Mailable
{
    use Queueable, SerializesModels;

    public $nome_serie;
    public $qtd_temporada;
    public $qtd_episodio;

    public function __construct(string $nome_serie, string $qtd_temporada, string $qtd_episodio)
    {
        $this->nome_serie = $nome_serie;
        $this->qtd_temporada = $qtd_temporada;
        $this->qtd_episodio = $qtd_episodio;
    }

    public function build()
    {
        return $this->markdown('email.nova-serie');
    }
}
