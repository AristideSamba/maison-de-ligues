@extends('layout')
@section('title', 'Accueil')

@push('styles')
    <link href="{{ asset('css/accueil.css') }}" rel="stylesheet">
@endpush

@section('content')
    @include('include.header')
    <main>
        <section class="welcome-word">
            <h2>Bienvenue sur M2L, la plateforme qui vous permet de retrouver tous vos collaborateurs</h2>
        </section>
        <section class="home-employee">
            <h2>Avez-vous dit bonjour à:</h2>
            <div class="info-employee">
                <h3>{{ $employee->service }}</h3>
                <div class="image-profil">
                    <img src="{{ asset('storage/' . $employee->photo) }}" alt="Photo de {{ $employee->name }}">
                </div>
                <ul>
                    <li>{{ $employee->name }} {{ $employee->prenom }} </li>
                    <li>{{ $employee->ville }}, {{ $employee->pays }}</li>
                    <li>{{ $employee->email }}</li>
                    <li>{{ $employee->phone }}</li>
                    <li>{{ \Carbon\Carbon::parse($employee->date_de_naissance)->format('d/m/Y') }}</li>
                </ul>
            </div>
            <button id="random-employee-btn">DIRE BONJOUR À QUELQU'UN D'AUTRE</button>
            <script>
                document.getElementById('random-employee-btn').addEventListener('click', function () {
                    fetch('{{ route('random.employee') }}')
                        .then(response => response.json())
                        .then(data => {
                            document.querySelector('.info-employee h3').textContent = data.service;
                            document.querySelector('.image-profil img').src = '{{ asset('storage') }}/' + data.photo;
                            const infoList = document.querySelector('.info-employee ul');
                            const formattedDate = new Date(data.date_de_naissance).toLocaleDateString('fr-FR', {
                                day: '2-digit',
                                month: '2-digit',
                                year: 'numeric'
                            });
                            infoList.innerHTML = `
                <li>${data.name} ${data.prenom}</li>
                <li>${data.ville}, ${data.pays}</li>
                <li>${data.email}</li>
                <li>${formattedDate}</li>
            `;
                        })
                        .catch(error => console.error('Erreur:', error));
                });
            </script>
        </section>
    </main>
@endsection
