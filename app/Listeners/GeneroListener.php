<?php

namespace App\Listeners;

use App\Notifications\GeneroNotification;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class GeneroListener
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
        User::all()
        ->except(Auth()->user()->id)
        ->each(function(User $user) use ($event){
            Notification::send($user, new GeneroNotification($event->genero));
        });
    }
}
