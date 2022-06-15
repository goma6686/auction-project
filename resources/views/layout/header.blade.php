<nav class="navbar navbar-expand-md navbar-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            {{ config('app.name', 'Auction') }}
        </a>
        
        @if(auth()->check() && Auth::user()->is_admin)
            <a href="/user/{{Auth::user()->id}}" role="button" class="btn btn-dark">Profile</a>
            <a href="{{ route('admin') }}" role="button" class="btn btn-dark">Items</a>
            <a href="{{ route('users') }}" role="button" class="btn btn-dark">Users</a>
        @endif

        <div class="text-end" id="navbarSupportedContent">
                <!-- Authentication Links -->
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
                        <a class="dropdown-item" href="/user/{{Auth::user()->id}}">Profile</a>
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
    </div>
</nav>

