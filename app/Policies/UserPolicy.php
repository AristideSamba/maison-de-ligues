<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;


class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */

    //Fonction pour gérer l'affichage des boutons modifier et supprimer
    public function manage(User $authUser)
    {
        return $authUser->est_admin;
    }

    //fontion pour gérer l'affichage de la page Ajouter
    public function isAdmin(User $user):bool
    {
        return $user->est_admin;
    }

    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        return false;
    }
}
