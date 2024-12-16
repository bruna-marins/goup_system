<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogLastLogin
{
    public function handle(Login $event)
    {
        // Verifica se o usuário logado é da tabela 'users'
        if ($event->guard === 'web') {
            $event->user->last_login_at = now();
            $event->user->save();
        }

        // Verifica se o usuário logado é da tabela 'holding_users'
        if ($event->guard === 'holding') {
            $event->user->last_login_at = now();
            $event->user->save();
        }
    }
}
