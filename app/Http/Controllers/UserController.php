<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Affiche le formulaire d'ajout d'un nouvel utilisateur.
     *
     * @return View
     */
    public function create()
    {
        return view('ajoutCollaborateurs');
    }

    /**
     * Enregistre un nouvel utilisateur dans la base de données.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'civilite' => 'required|string|max:10',
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|confirmed',
            'telephone' => 'required|string|max:20',
            'date_de_naissance' => 'required|date',
            'ville' => 'nullable|string|max:100',
            'pays' => 'required|string|max:100',
            'photo' => 'nullable|url|max:255',
            'service' => 'required|string|max:50',
        ]);

        User::create([
            'civilite' => $request->civilite,
            'name' => $request->name,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'date_de_naissance' => $request->date_de_naissance,
            'ville' => $request->ville,
            'pays' => $request->pays,
            'photo' => $request->photo,
            'service' => $request->service,
            // 'est_admin' peut être défini ici si nécessaire (par défaut false dans la migration)
        ]);

        return redirect()->route('Collaborateurs')->with('success', 'Collaborateur ajouté avec succès.');
    }

    /**
     * Affiche la liste de tous les collaborateurs.
     *
     * @return View
     */
    public function index()
    {
        $collaborateurs = User::all(); // Récupère tous les utilisateurs de la base de données
        return view('collaborateurs', compact('collaborateurs'));
    }

    //fonction pour le formulaire de recherche
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $collaborateurs = User::query()
            ->where('name', 'like', "%{$searchTerm}%")
            ->orWhere('prenom', 'like', "%{$searchTerm}%")
            ->orWhere('email', 'like', "%{$searchTerm}%")
            ->get(); // Ou paginate()

        return view('collaborateurs', compact('collaborateurs'));
    }
}
