<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Policies\UserPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Le mappage des policies pour l'application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class,
    ];

    /**
     * Enregistrer les policies et les gates.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Définir des gates personnalisés si nécessaire
    }
}
