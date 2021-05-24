<?php

namespace App\Listeners;

use App\Notifications\EscribirNotification;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class EscribirListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if ($event->id > 0) {
           // $user = User::find($event->id)
              //  ->each(function (User $user) use ($event) {
                //    Notification::send($user, new EscribirNotification($event->Esgenero));
               // });

                $user = User::find($event->id);
                
                $user->notify(new EscribirNotification($event->Esgenero));
     
        }
    }
}
