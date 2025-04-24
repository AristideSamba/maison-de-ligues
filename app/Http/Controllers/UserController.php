<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

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
            'password' => 'required|confirmed|min:8',
            'telephone' => 'required|string|max:20',
            'date_de_naissance' => 'required|date',
            'ville' => 'nullable|string|max:100',
            'pays' => 'required|string|max:100',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Règles pour l'upload de fichier
            'service' => 'required|string|max:50',
        ]);

        $userData = [
            'civilite' => $request->civilite,
            'name' => $request->name,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'date_de_naissance' => $request->date_de_naissance,
            'ville' => $request->ville,
            'pays' => $request->pays,
            'service' => $request->service,
            // 'est_admin' peut être défini ici si nécessaire (par défaut false dans la migration)
        ];

        // Gestion de l'upload de la photo
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() . '_' . $photo->getClientOriginalName();
            $path = $photo->storeAs('public/avatars', $filename); // Stockage dans storage/app/public/avatars
            $userData['photo'] = $path; // Stocker le chemin relatif dans le tableau de données
        } else {
            $userData['photo'] = null; // Ou vous pouvez définir un chemin par défaut ici si nécessaire
        }

        User::create($userData);

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
        $filtreNom = $request->input('filtre_nom');
        $service = $request->input('service');
        $ville = $request->input('ville');

        $query = User::query();

        if ($searchTerm) {
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                    ->orWhere('prenom', 'like', "%{$searchTerm}%")
                    ->orWhere('email', 'like', "%{$searchTerm}%");
            });
        }

        if ($filtreNom === 'nom') {
            $query->orderBy('name');
        } elseif ($filtreNom === 'prenom') {
            $query->orderBy('prenom');
        }

        if ($service) {
            $query->where('service', $service);
        }

        if ($ville) {
            $query->where('ville', $ville);
        }

        $collaborateurs = $query->get();

        return view('collaborateurs', compact('collaborateurs'));
    }

    //Fonction pour Modifier

    public function edit(User $user): View
    {
        return view('edit', compact('user'));
    }


    //Fonction pour la mise à jour du collaborateur
    public function update(Request $request, User $user = null): RedirectResponse
    {
        // Si aucun utilisateur n'est passé (modification de son propre profil)
        if (!$user || $user->id === Auth::id()) {
            $user = Auth::user();
            $redirectRoute = 'Collaborateurs'; // Route de retour pour l'utilisateur connecté
            $successMessage = "Votre profil a été mis à jour avec succès.";
        } else {
            // Vérifie si l'utilisateur connecté a le droit de modifier un autre utilisateur
            // (optionnel mais recommandé : à sécuriser via middleware ou policy aussi)
            //if (!Auth::user()->isAdmin()) {
                //abort(403, 'Accès non autorisé');
           // }

            $redirectRoute = 'Collaborateurs'; // Adapte selon ta vue de gestion admin
            $successMessage = "Le profil de l'utilisateur a été mis à jour avec succès.";
        }

        $rules = [
            'civilite' => 'required|string|max:10',
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'date_de_naissance' => 'required|date',
            'ville' => 'nullable|string|max:100',
            'pays' => 'required|string|max:100',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'service' => 'required|string|max:50',
        ];

        if ($request->filled('password')) {
            $rules['password'] = 'required|confirmed|min:8';
        }

        $request->validate($rules);

        $data = $request->except('password', 'password_confirmation', 'photo');

        // Gestion de l'upload photo
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() . '_' . $photo->getClientOriginalName();
            $path = $photo->storeAs('avatars', $filename);

            if ($user->photo && !str_contains($user->photo, 'default-profil.png')) {
                Storage::delete($user->photo);
            }

            $data['photo'] = $path;
        }

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route($redirectRoute)->with('success', $successMessage);
    }


    //Fonction pour supprimer un collaborateur
    public function destroy(User $user){
        $user->delete();
        return redirect()->route('Collaborateurs')->with('success', 'Collaborateur supprimé avec succès.');
    }
}
