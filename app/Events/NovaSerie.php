<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NovaSerie
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $nomeSerie;
    public $temporadas;
    public $epTemporada;

    public function __construct(string $nomeSerie, string $temporadas, string $epTemporada)
    {
        $this->nomeSerie = $nomeSerie;
        $this->temporadas = $temporadas;
        $this->epTemporada = $epTemporada;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
