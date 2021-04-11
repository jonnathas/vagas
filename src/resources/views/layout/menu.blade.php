<div class="top-menu bg-primary text-ligth">
    <nav>
        <ul>
            <li><a href="{{ url('/vacancy') }}">Buscar vagas</a></li>

            @auth
                <li><a href="{{ route('curriculum.index') }}">Curriculo</a></li>
                <li><a href="{{ url('/recruiter/vacancy/create') }}">Publicar vaga</a></li> 
                <li><a href="{{ url('/recruiter/vacancy') }}">Ver minhas publicações</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <input value="Logout" type="submit" class="btn btn-outline-dark"/>
                    </form>
                </li>

            @endauth
        </ul>
    </nav>
</div>