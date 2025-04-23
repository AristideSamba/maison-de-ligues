<header>
    <h1>M2L</h1>
    <nav>
        <ul>
            <li><a href="{{ route('Collaborateurs') }}"><img src="{{ asset('asset/customer.png') }}" alt=""> Collaborateurs</a></li>
            @auth
                @can('isAdmin', Auth::user())
                    <li><a href="{{ route('Ajout Collaborateurs') }}">AJOUTER</a></li>
                @endcan
                <li class="img-employe">
                    <a href="{{ route('Profil') }}">
                        @if (Auth::user()->photo)
                            <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="Photo de profil">
                        @else
                            <img src="{{ asset('asset/default-profil.png') }}" alt="Photo de profil par défaut">
                        @endif
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
