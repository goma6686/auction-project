
<nav class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
    <a class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none" href="#">Navbar</a>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li class="nav-item active">
                <a class="nav-link px-2 text-secondary" href="{{ route('home') }}">Home</a>
            </li>
        </ul>
        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
            <input class="form-control form-control-dark" type="search" placeholder="Search..." aria-label="Search">
        </form>
        <div class="text-end">
            @guest
                @if (Route::has('login'))
                    <a class="btn btn-outline-light me-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                @endif

                @if (Route::has('register'))
                    <a class="btn btn-outline-light me-2" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
                <!--
            <button class="btn btn-outline-light me-2" type="button">Login</button>
            <button class="btn btn-outline-light me-2" type="button">Sign up</button>
                -->
        </div>
</nav>