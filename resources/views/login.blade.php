@extends('layout')
@section('title', 'Connexion')

@section('content')
    <main>
        <section class="img_acceuil">
            <h1>M2L</h1>
            <p>Connectez vous à M2L</p>
        </section>
        <section class="section_form">

            <h2>Pour vous connecter à l'intranet, entrez <br>vos identifiants et mot de passe</h2>
            @if(session('Error'))
                <div class="alert alert-danger">
                    {{ session('Error') }}
                </div>
            @endif
            <form action="{{ route('Connexion.post') }}" method="post">
                @csrf
                <fieldset>
                    <label for="email">Email *</label><br>
                    <input type="email" id="email" name="email" placeholder="exemple@gmail.com" required><br>
                    <label for="mot_de_passe">Mot de passe *</label><br>
                    <input type="password" id="password" name="password" required><br>
                    <button type="submit">CONNEXION</button>
                </fieldset>
            </form>
        </section>
    </main>
@endsection
