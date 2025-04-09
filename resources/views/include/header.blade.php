<header>
    <h1>M2L</h1>
    <nav>
        <ul>
            <li><a href="{{ route('Collaborateurs') }}"><img src="{{ asset('asset/customer.png') }}" alt=""> Collaborateurs</a></li>
            @auth
                @if(Auth::user()->est_admin)
                    <li><a href="{{ route('Ajout Collaborateurs') }}">AJOUTER</a></li>
                @endif
                <li class="img-employe">
                    <a href="{{ route('Profil') }}">
                        <img src="{{ asset(Auth::user()->photo) }}" alt="Photo de profil">
                    </a>
                </li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">
                        <img src="{{ asset('asset/power-off.png') }}" alt="Icone de déconnexion">Déconnexion
                    </button>
                </form>
            @endauth

        </ul>
    </nav>
</header>
