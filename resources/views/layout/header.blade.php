
<nav class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li class="nav-item active">
                <a class="nav-link px-2 text-secondary" href="{{ route('dashboard') }}">Auction</a>
            </li>
        </ul>
        <div class="text-end">
            @guest
                @if (Route::has('login'))
                    <a class="btn btn-outline-light me-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                @endif

                @if (Route::has('register'))
                    <a class="btn btn-outline-light me-2" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            @else
                    <a id="navbarDropdown" class="btn btn-outline-light me-2 dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                @endguest
        </div>
</nav>