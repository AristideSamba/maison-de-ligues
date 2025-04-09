@extends('layout')
@section('title', 'Accueil')

{{--Insertion de la css de ma page accueil--}}
@push('styles')
    <link href="{{ asset('css/accueil.css') }}" rel="stylesheet">
@endpush

@section('content')
    @include('include.header')
        <body>
            <main>
                <section class="welcome-word">
                    <h2>Bienvenue sur M2L, la plateforme qui vous permet de retrouver tous vos collaborateurs</h2>
                </section>
                <section class="home-employee">
                    <h2>Avez vous dit bonjour à:</h2>
                    <div class="info-employee">
                        <h3>Informatique</h3>
                        <div class="image-profil">
                            <img src="./asset/tamara-bellis-Brl7bqld05E-unsplash.jpg" alt="">
                        </div>
                        <ul>
                            <li>Aristide SAMBA 30 ans</li>
                            <li>Lyon, France</li>
                            <li>sambaa@samba.com</li>
                            <li>+33 05 02 02 01 02</li>
                            <li>Anniversaire: 25 février</li>
                        </ul>
                    </div>
                    <button>DIRE BONJOUR A QUELQU'UN D'AUTRE</button>
                </section>
            </main>
        </body>
@endsection
