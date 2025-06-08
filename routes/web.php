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
    Route::get('/home', [HomeController::class, 'index'])->name('Acceuil');
    // Route pour récupérer un employé aléatoire
    Route::get('/random-employee', [HomeController::class, 'getRandomEmployee'])->name('random.employee');
    Route::get('/profil', function () {
        return view('profil');
    })->name('Profil');

    // Route pour afficher la liste des collaborateurs
    Route::get('/collaborateurs', [UserController::class, 'index'])->name('Collaborateurs');

    // Route pour afficher le formulaire de modification d'un collaborateur
    Route::get('/edit/{user}', [UserController::class, 'edit'])->name('collaborateurs.edit');

    // Route pour traiter les données du formulaire de modification et mettre à jour le collaborateur
    Route::put('/collaborateurs/{user}', [UserController::class, 'update'])->name('collaborateurs.update');
    Route::put('/profil', [UserController::class, 'update'])->name('profil.update');

    //Route pour le formulaire de recherche
    Route::get('/collaborateurs/search', [UserController::class, 'search'])->name('collaborateurs.search');

    Route::get('/ajoutCollaborateurs', [UserController::class, 'create'])->name('Ajout Collaborateurs');

    //pour traiter les données du formulaire d'ajout des collaborateurs enregistrer le nouveau collaborateur dans la base de données.
    Route::post('/users', [UserController::class, 'store'])->name('users.store');

    //Route pour supprimer un collaborateur
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::post('/logout', [AuthManager::class, 'logout'])->name('logout');
