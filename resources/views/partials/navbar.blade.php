<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">Passport Tizimi</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @if (!auth()->check())
                <li class="nav-item">
                    <a class="nav-link" href="{{route('registerForm')}}">Registratsiya</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('loginForm')}}">Kirish</a>
                </li>
                @else
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <li class="nav-item">
                        <button  type="submit"><i class="fas fa-sign-out-alt"> Chiqish</i></button>
                    </li>
                </form>
                @endif
            </ul>
        </div>
    </div>
</nav>