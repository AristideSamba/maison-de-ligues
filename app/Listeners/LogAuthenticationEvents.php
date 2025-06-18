<?php

// Fichier `app/Listeners/LogAuthenticationEvents.php`
namespace App\Listeners;

use App\Models\AuthLog;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\Failed;
use Illuminate\Support\Facades\Request;

class LogAuthenticationEvents
{
    public function handleLogin(Login $event)
    {
        AuthLog::create([
            'user_id' => $event->user->id,
            'action' => 'login',
            'ip_address' => request()->ip(),
            'user_agent' => request()->header('User-Agent'),
        ]);
    }

    public function handleLogout(Logout $event)
    {
        AuthLog::create([
            'user_id' => $event->user->id,
            'action' => 'logout',
            'ip_address' => request()->ip(),
            'user_agent' => request()->header('User-Agent'),
        ]);
    }

    // PHP
    public function handleFailed(Failed $event)
    {
        AuthLog::create([
            'user_id' => null, // Aucun utilisateur authentifié
            'action' => 'failed',
            'ip_address' => Request::ip(),
            'user_agent' => Request::header('User-Agent'),
        ]);
    }
}
