<?php

namespace App\Listeners;

use App\Events\NewEspEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Broadcast;


class NewEspListener
{
    use InteractsWithQueue;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }



    public function handle(NewEspEvent $event)
    {
        Broadcast::channel('esp-channel', function ($user) {
            return true; // Atur logika autentikasi di sini jika diperlukan
        });

        Broadcast::event('esp-channel', 'new-esp', ['esp' => $event->esp]);
    }
}
