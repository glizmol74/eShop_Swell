<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        VerifyEmail::$toMailCallback = function( $notifiable, $verificationUrl) {
            return (new MailMessage)
            ->subject(Lang::get('Verificación de Dirección de Correo Electronico'))
            ->line(Lang::get('Haga clic en el botón de abajo para verificar su dirección de correo electrónico.'))
            ->action(Lang::get('Confirme Email'), $verificationUrl)
            ->line(Lang::get('Si no creó una cuenta, no es necesario realizar ninguna otra acción...'));
        };
    }
}
