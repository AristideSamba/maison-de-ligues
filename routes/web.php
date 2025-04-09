<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthManager::class, 'login'])->name('Connexion');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('Connexion.post');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('Acceuil');

    Route::get('/profil', function () {
        return view('profil');
    })->name('Profil');

    // Route pour afficher la liste des collaborateurs
    Route::get('/collaborateurs', [UserController::class, 'index'])->name('Collaborateurs');

    //Route pour le formulaire de recherche
    Route::get('/collaborateurs/search', [UserController::class, 'search'])->name('collaborateurs.search');

    Route::get('/ajoutCollaborateurs', [UserController::class, 'create'])->name('Ajout Collaborateurs');

    //pour traiter les données du formulaire d'ajout des collaborateurs enregistrer le nouveau collaborateur dans la base de données.
    Route::post('/users', [UserController::class, 'store'])->name('users.store');

});

Route::post('/logout', [AuthManager::class, 'logout'])->name('logout');
