@extends('layout')
@section('title', 'Accueil')

{{--Insertion de la css de ma page accueil--}}
@push('styles')
    <link href="{{ asset('css/collaborateurs.css') }}" rel="stylesheet">
@endpush

@section('content')
    @include('include.header')
    <body>
        <main>
            <form class="full-search-form" action="{{ route('collaborateurs.search') }}" method="get">
                <section class="section-search">
                    <h2>LISTE DES COLLABORATEURS</h2>
                    <div class="search-bar">
                        <input type="text" name="search" placeholder="RECHERCHER" value="{{ request('search') }}">
                        <button type="submit" title="RECHERCHER">
                            <img src="{{ asset('asset/search.png') }}" alt="Icone search" class="search-icon">
                        </button>
                    </div>
                </section>

                <aside>
                    <h3><img src="{{ asset('asset/filter.png') }}" alt="">FILTRER</h3>
                    <fieldset>
                        <label for="filtre_nom">Rechercher par:</label><br>
                        <select id="filtre_nom" name="filtre_nom">
                            <option value="">Choisir</option>
                            <option value="nom" {{ request('filtre_nom') == 'nom' ? 'selected' : '' }}>Nom</option>
                            <option value="prenom" {{ request('filtre_nom') == 'prenom' ? 'selected' : '' }}>Prénom</option>
                        </select><br>

                        <label for="service">Service</label><br>
                        <select id="service" name="service">
                            <option value="">Choisir</option>
                            <option value="Informatique" {{ request('service') == 'Informatique' ? 'selected' : '' }}>Informatique</option>
                            <option value="Ressources Humaines" {{ request('service') == 'Ressources Humaines' ? 'selected' : '' }}>Ressources Humaines</option>
                            <option value="Marketing" {{ request('service') == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                            <option value="Relations Clients" {{ request('service') == 'Relations Clients' ? 'selected' : '' }}>Relations Clients</option>
                            <option value="Finance" {{ request('service') == 'Finance' ? 'selected' : '' }}>Finance</option>
                        </select><br>

                        <label for="ville">Ville:</label><br>
                        <select id="ville" name="ville">
                            <option value="">Choisir</option>
                            <option value="Paris" {{ request('ville') == 'Paris' ? 'selected' : '' }}>Paris</option>
                            <option value="Lyon" {{ request('ville') == 'Lyon' ? 'selected' : '' }}>Lyon</option>
                            <option value="Marseille" {{ request('ville') == 'Marseille' ? 'selected' : '' }}>Marseille</option>
                            <option value="Nante" {{ request('ville') == 'Nante' ? 'selected' : '' }}>Nantes</option>
                        </select><br>

                        <button type="submit">Filtrer</button>
                    </fieldset>
                </aside>
            </form>
            <section class="collaborateurs-list">
                @if ($collaborateurs->isEmpty())
                    <p> ❌️ Aucun collaborateur trouvé.</p>
                @else
                    <ul>
                        @foreach ($collaborateurs as $collaborateur)
                            <li>
                                <div class="collaborateur-info">
                                    <div class="photo-profil">
                                        @if ($collaborateur->photo)
                                            <img src="{{ asset('storage/' . $collaborateur->photo) }}" alt="Photo de {{ $collaborateur->name }}">
                                        @else
                                            <img src="{{ asset('default-profil.png') }}" alt="Photo de profil par défaut">
                                        @endif
                                    </div>
                                    <div class="details">
                                        <h3>{{ $collaborateur->prenom }} {{ $collaborateur->name }}</h3>
                                        <p>{{ $collaborateur->email }}</p>
                                        <h4>{{ $collaborateur->service }}</h4>
                                        <p>{{ $collaborateur->ville }}, {{ $collaborateur->pays }}</p>
                                        <p>Date de naissance: {{ \Carbon\Carbon::parse($collaborateur->date_de_naissance)->format('d/m/Y') }}</p>
                                        <p>{{ $collaborateur->telephone }}</p>
                                    </div>
                                    @can('manage', $collaborateur)
                                        <div class="actions">
                                            <a href="{{ route('collaborateurs.edit', $collaborateur->id) }}">Modifier</a>
                                            <form action="{{ route('users.destroy', $collaborateur->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">Supprimer</button>
                                            </form>
                                        </div>
                                    @endcan
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </section>

        </main>
    </body>

@endsection
