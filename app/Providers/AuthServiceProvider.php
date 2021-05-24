<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->subject('Confirme su dirección de correo electrónico')
                ->greeting('Hola!')
                ->line('Haga clic en el botón de abajo para verificar su dirección de correo electrónico.')
                ->action('Verificar', $url)
                ->line('Si no realizaste esta solicitud, no se requiere realizar ninguna otra acción.')
                ->salutation('Saludos, '. config('app.name'));
        });
    }
}
