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
                <h2>Modifiez votre profil</h2>
                <form action="{{ route('profil.update') }}" method="post">
                    @csrf
                    @method('PUT') {{-- Indique à Laravel qu'il s'agit d'une mise à jour --}}
                    <fieldset>
                        <label for="civilite">*Civilité:</label>
                        <select id="civilite" name="civilite" required>
                            <option value="">Sélectionnez une civilité</option>
                            <option value="mr" {{ auth()->user()->civilite === 'mr' ? 'selected' : '' }}>Mr</option>
                            <option value="mme" {{ auth()->user()->civilite === 'mme' ? 'selected' : '' }}>Mme</option>
                        </select><br>
                        <label for="name">*Nom:</label>
                        <input type="text" name="name" id="name" value="{{ auth()->user()->name }}"><br>
                        <label for="prenom">*Prénom:</label>
                        <input type="text" name="prenom" id="prenom" value="{{ auth()->user()->prenom }}" ><br>
                        <label for="email">*Email:</label>
                        <input type="email" id="email" name="email" placeholder="exemple@gmail.com" value="{{ auth()->user()->email }}" required><br>
                        <label for="password">*Mot de passe:</label>
                        <input type="password" id="password" name="password" required><br>
                        <label for="password_confirmation">*Confirmation:</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required><br>
                        <label for="date_de_naissance">*Date de naissance :</label>
                        <input type="date" id="date_de_naissance" name="date_de_naissance" value="{{ auth()->user()->date_de_naissance }}" required><br>
                        <label for="ville">Ville:</label>
                        <select id="ville" name="ville">
                            <option value="Paris" {{ auth()->user()->ville === 'Paris' ? 'selected' : '' }}>Paris</option>
                            <option value="Lyon" {{ auth()->user()->ville === 'Lyon' ? 'selected' : '' }}>Lyon</option>
                            <option value="Marseille" {{ auth()->user()->ville === 'Marseille' ? 'selected' : '' }}>Marseille</option>
                            <option value="Nantes" {{ auth()->user()->ville === 'Nantes' ? 'selected' : '' }}>Nantes</option>
                        </select><br>
                        <label for="pays">*Pays:</label>
                        <select id="pays" name="pays">
                            <option value="France" {{ auth()->user()->pays === 'France' ? 'selected' : '' }}>France</option>
                            <option value="Belgique" {{ auth()->user()->pays === 'Belgique' ? 'selected' : '' }}>Belgique</option>
                        </select><br>
                        <label for="photo">URL de la photo:</label>
                        <input type="url" id="photo" name="photo" placeholder="https://www.exemple.com/image.jpg"><br>
                        <label for="service">*Service:</label>
                        <select id="service" name="service" required>
                            <option value="Informatique" {{ auth()->user()->service === 'Informatique' ? 'selected' : '' }}>Informatique</option>
                            <option value="Ressources Humaines" {{ auth()->user()->service === 'Ressources Humaines' ? 'selected' : '' }}>Ressources humaines</option>
                            <option value="Marketing" {{ auth()->user()->service === 'Marketing' ? 'selected' : '' }}>Marketing</option>
                            <option value="Relations Clients" {{ auth()->user()->service === 'Relations Clients' ? 'selected' : '' }}>Relations clients</option>
                            <option value="Finance" {{ auth()->user()->service === 'Finance' ? 'selected' : '' }}>Finance</option>
                        </select><br>
                        <button type="submit">MODIFIER</button>
                        <a href="{{ route('Acceuil') }}">Annuler</a>
                    </fieldset>
                </form>
            </section>
        </main>
    </body>
@endsection
