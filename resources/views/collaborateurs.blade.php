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
            <section class="section-search">
                <h2>LISTE DES COLLABORATEURS</h2>
                <form class="search-bar" action="{{ route('collaborateurs.search') }}" method="get">
                    <input type="text" name="search" placeholder="RECHERCHER">
                    <button type="submit" title="RECHERCHER"><img src="{{ asset('asset/search.png') }}" alt="Icone search" class="search-icon"></button>
                </form>
            </section>
            <aside>
                <h3><img src="{{ asset('asset/filter.png') }}" alt="">FILTRER</h3>
                <form action="" method="post">
                    <fieldset>
                        <label for="nom">Rechercher par:</label><br>
                        <select id="nom" name="nom">
                            <option value="nom">Nom</option>
                            <option value="prenom">Prénom</option>
                        </select><br>
                        <label for="categorie">Catégorie</label><br>
                        <select id="categorie" name="categorie">
                            <option value="informatique">Informatique</option>
                            <option value="ressourceshumaines">Ressources Humaines</option>
                        </select><br>
                        <label for="ville">Localisation:</label><br>
                        <select id="ville" name="ville">
                            <option value="paris">Paris</option>
                            <option value="lyon">Lyon</option>
                            <option value="marseille">Marseille</option>
                            <option value="nante">Nantes</option>
                        </select><br>
                    </fieldset>
                </form>
            </aside>
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
                                            <img src="{{ asset($collaborateur->photo) }}" alt="Photo de {{ $collaborateur->name }}">
                                        @else
                                            <img src="{{ asset('asset/default-profil.png') }}" alt="Photo de profil par défaut">
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
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </section>

        </main>
    </body>

@endsection
