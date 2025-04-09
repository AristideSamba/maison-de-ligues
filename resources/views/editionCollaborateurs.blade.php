@extends('layout')
@section('title', 'Accueil')

{{--Insertion de la css de ma page accueil--}}
@push('styles')
    <link href="{{ asset('css/editionCollaborateurs.css') }}" rel="stylesheet">
@endpush

@section('content')
    @include('include.header')
    <body>
        <main>
            <section class="section-search">
                <h2>LISTE DES COLLABORATEURS Admin</h2>
                <form class="search-bar">
                    <input type="text" placeholder="RECHERCHER">
                    <button type="submit" title="RECHERCHER"><img src="./asset/search.png" alt="" class="search-icon"></button>
                </form>
            </section>
            <section class="asside-lisemployee">
                <aside>
                    <h3><img src="./asset/filter.png" alt="">FILTRER</h3>
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
                <section class="list-employee">
                    <div class="info-employee">
                        <h3>Informatique</h3>
                        <div class="imgprofil-infoemploye">
                            <div class="image-profil">
                                <img src="./asset/tamara-bellis-Brl7bqld05E-unsplash.jpg" alt="">
                            </div>
                            <ul>
                                <li>Aristide SAMBA 30 ans</li>
                                <li>Lyon, France</li>
                                <li>samba@samba.com</li>
                                <li>+33 05 02 02 01 02</li>
                                <li>Anniversaire: 25 février</li>
                            </ul>
                        </div>
                        <div class="button-edition">
                            <button>Editer</button>
                            <button>Supprimer</button>
                        </div>
                    </div>
                </section>
            </section>
        </main>
    </body>
@endsection
