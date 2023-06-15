<header>

  <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm text-white py-3">
    <div class="container">

      <div class="logo me-3">
        <span class="fs-5 fw-semibold">LOGO</span>
      </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}">Go to the Website</a>
            </li>
          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              @guest
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
              @endif
              @else
              <li class="nav-item me-2">
                <a class="nav-link d-flex align-items-center" href="#">
                  <i class="fa-solid fa-circle-user fs-4 me-2"></i>
                  <span>{{ Auth::user()->name }}</span>
                </a>
              </li>
              <li class="nav-item">
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-danger">Logout</button>
                </form>
              </li>
              @endguest
          </ul>

        </div>
      </div>
  </nav>

</header>
