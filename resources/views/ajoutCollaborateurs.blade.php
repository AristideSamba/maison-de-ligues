@extends('layout')
@section('title', 'Ajouter un collaborateur')

{{--Insertion de la css de ma page profil--}}
@push('styles')
    <link href="{{ asset('css/profil.css') }}" rel="stylesheet">
@endpush

@section('content')
    @include('include.header')
    <body>
    <main>
        <section class="section-search">
            <h2>Administrateur</h2>
        </section>
        <section class="profil-form">
            <h2>Ajouter un collaborateur</h2>
            <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <fieldset>
                    <label for="civilite">Civilité:</label>
                    <select id="civilite" name="civilite" required>
                        <option value="" disabled selected>Sélectionnez une civilité</option>
                        <option value="mr">Mr</option>
                        <option value="mme">Mme</option>
                    </select><br>
                    <label for="name">*Nom:</label>
                    <input type="text" name="name" id="name" required><br>
                    <label for="prenom">*Prénom:</label>
                    <input type="text" name="prenom" id="prenom" required><br>
                    <label for="email">*Email:</label>
                    <input type="email" id="email" name="email" placeholder="exemple@gmail.com" required><br>
                    <label for="password">*Mot de passe:</label>
                    <input type="password" id="password" name="password" required><br>
                    <label for="password_confirmation">*Confirmation:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required><br>
                    <label for="telephone">*Téléphone:</label>
                    <input type="tel" id="telephone" name="telephone" placeholder="06XXXXXXXX" required><br>
                    <label for="date_de_naissance">*Date de naissance :</label>
                    <input type="date" id="date_de_naissance" name="date_de_naissance" required><br>
                    <label for="ville">Ville:</label>
                    <select id="ville" name="ville">
                        <option value="" disabled selected>Sélectionnez une ville</option>
                        <option value="Paris">Paris</option>
                        <option value="Lyon">Lyon</option>
                        <option value="Marseille">Marseille</option>
                        <option value="Nantes">Nantes</option>
                    </select><br>
                    <label for="pays">*Pays:</label>
                    <select id="pays" name="pays" required>
                        <option value="" disabled selected>Sélectionnez un pays</option>
                        <option value="France">France</option>
                        <option value="Belgique">Belgique</option>
                    </select><br>
                    <label for="service">*Service:</label>
                    <select id="service" name="service" required>
                        <option value="Informatique">Informatique</option>
                        <option value="Ressources Humaines">Ressources humaines</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Relations Clients">Relations clients</option>
                        <option value="Finance">Finance</option>
                    </select><br>
                    <label for="photo">URL de la photo:</label>
                    <input type="file" id="photo" name="photo" placeholder="https://www.exemple.com/image.jpg"><br>
                    <small>Formats acceptés: jpeg, png, gif. Taille maximale: 2Mb</small><br>
                    @error('photo') <div class="error">{{ $message }}</div><br> @enderror
                    <button type="submit">AJOUTER</button>
                </fieldset>
            </form>
        </section>
    </main>
    </body>
@endsection
