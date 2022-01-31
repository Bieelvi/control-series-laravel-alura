<?php

namespace App\Listeners;

use App\Events\NovaSerie;
use App\Mail\NovaSerie as MailNovaSerie;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnviaEmailNovaSerieCadastrada
{

    public function __construct()
    {
        //
    }

    public function handle(NovaSerie $event)
    {
        foreach (User::all() as $i => $user) {
            $email = new MailNovaSerie($event->nomeSerie, $event->temporadas, $event->epTemporada);
            $email->subject('Nova série cadastrada com sucesso!');

            $mult = $i + 1;

            $quando = now()->addSeconds($mult * 10);

            Mail::to($user)->later($quando, $email);
        }
    }
}
