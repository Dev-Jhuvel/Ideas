<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark sticky-top bg-body-tertiary"
    data-bs-theme="dark">
    <div class="container">
        @if (@session()->has('success'))
            <a class="navbar-brand fw-dark" href="/"><span class="fas fa-brain me-1"
                    style='font-size:20px;color:rgb(255, 242, 0);transition: all 3s'>
                @else
                    <a class="navbar-brand fw-light" href="/"><span class="fas fa-brain me-1">
                            {{ session('sucess') }}
        @endif

        </span>{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                @guest()
                    <li class="nav-item">
                        <a class="{{ Route::is('login') ? 'active' : '' }} nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="{{ Route::is('register') ? 'active' : '' }} nav-link"
                            href="{{ route('register') }}">Register</a>
                    </li>
                @endguest
                @auth()
                    @if (Auth::user()->is_admin)
                        {
                        <li class="nav-item">
                            <a class="{{ Route::is('admin.dashboard') ? 'active' : '' }} nav-link"
                                href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                        </li>
                        }
                    @endif
                    <li class="nav-item">
                        <a class="{{ Route::is('profile') ? 'active' : '' }} nav-link"
                            href="{{ route('profile') }}">{{ auth()->user()->name }}</a>
                    </li>
                    <li class="nav-item">
                        <form method="post" action=" {{ route('logout') }} ">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
