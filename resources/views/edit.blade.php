@extends('layout')
@section('title', 'Accueil')

{{--Insertion de la css de ma page accueil--}}
@push('styles')
    <link href="{{ asset('css/profil.css') }}" rel="stylesheet">
@endpush

@section('content')
    @include('include.header')
    <body>
    <main>
        <section class="section-search">
            <h2>PROFIL</h2>
        </section>
        <section class="profil-form">
            <h2>Modifiez le profil de {{ $user->prenom }} {{ $user->name }}</h2>
            <form action="{{ route('collaborateurs.update', $user->id) }}" enctype="multipart/form-data" method="post">
                @csrf
                @method('PUT') {{-- Indique à Laravel qu'il s'agit d'une mise à jour --}}
                <fieldset>
                    <label for="civilite">*Civilité:</label>
                    <select id="civilite" name="civilite" required>
                        <option value="">Sélectionnez une civilité</option>
                        <option value="mr" {{ $user->civilite === 'mr' ? 'selected' : '' }}>Mr</option>
                        <option value="mme" {{ $user->civilite === 'mme' ? 'selected' : '' }}>Mme</option>
                    </select><br>
                    <label for="name">*Nom:</label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}"><br>
                    <label for="prenom">*Prénom:</label>
                    <input type="text" name="prenom" id="prenom" value="{{ $user->prenom }}" ><br>
                    <label for="email">*Email:</label>
                    <input type="email" id="email" name="email" placeholder="exemple@gmail.com" value="{{ $user->email }}" required><br>
                    <label for="password">*Mot de passe:</label>
                    <input type="password" id="password" name="password"><br>
                    <label for="password_confirmation">*Confirmation:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"><br>
                    <label for="date_de_naissance">*Date de naissance :</label>
                    <input type="date" id="date_de_naissance" name="date_de_naissance" value="{{ $user->date_de_naissance }}" required><br>
                    <label for="ville">Ville:</label>
                    <select id="ville" name="ville">
                        <option value="Paris" {{ $user->ville === 'Paris' ? 'selected' : '' }}>Paris</option>
                        <option value="Lyon" {{ $user->ville === 'Lyon' ? 'selected' : '' }}>Lyon</option>
                        <option value="Marseille" {{ $user->ville === 'Marseille' ? 'selected' : '' }}>Marseille</option>
                        <option value="Nantes" {{ $user->ville === 'Nantes' ? 'selected' : '' }}>Nantes</option>
                    </select><br>
                    <label for="pays">*Pays:</label>
                    <select id="pays" name="pays">
                        <option value="France" {{ $user->pays === 'France' ? 'selected' : '' }}>France</option>
                        <option value="Belgique" {{ $user->pays === 'Belgique' ? 'selected' : '' }}>Belgique</option>
                    </select><br>
                    <label for="photo">Photo:</label>
                    <input type="file" id="photo" name="photo"><br>
                    <small>Formats acceptés: jpeg, png, gif. Taille maximale: 2Mb</small><br>
                    @error('photo') <div class="error">{{ $message }}</div><br> @enderror
                    <label for="service">*Service:</label>
                    <select id="service" name="service" required>
                        <option value="Informatique" {{ $user->service === 'Informatique' ? 'selected' : '' }}>Informatique</option>
                        <option value="Ressources Humaines" {{ $user->service === 'Ressources Humaines' ? 'selected' : '' }}>Ressources humaines</option>
                        <option value="Marketing" {{ $user->service === 'Marketing' ? 'selected' : '' }}>Marketing</option>
                        <option value="Relations Clients" {{ $user->service === 'Relations Clients' ? 'selected' : '' }}>Relations clients</option>
                        <option value="Finance" {{ $user->service === 'Finance' ? 'selected' : '' }}>Finance</option>
                    </select><br>
                    <button type="submit">MODIFIER</button>
                    <a href="{{ route('Acceuil') }}">Annuler</a>
                </fieldset>
            </form>
        </section>
    </main>
    </body>
@endsection
