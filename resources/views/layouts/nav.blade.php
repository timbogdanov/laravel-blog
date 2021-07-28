<nav class="navbar">
  <!-- Navbar nav -->
  <ul class="navbar-nav mr-auto">
    <div class="input-group">
      <form action="/accounts" method="get" class="d-flex">
        <input type="text" name="search_account" class="form-control" placeholder="Search accounts">
        <div class="input-group-append">
          <button class="btn btn-primary" type="submit">Search</button>
        </div>
      </form>
    </div>
  </ul>

  <ul class="navbar-nav ml-auto">
    @guest
          @if (Route::has('login'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
          @endif

          @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
          @endif
        @else
          <li class="nav-item">
            <a class="nav-link" href="/accounts">Debtor Accounts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/categories">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/posts/create">Create Post</a>
          </li>

          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/profile/{{ Auth::user()->id }}">
                Profile
              </a>
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
  </ul>
</nav>
{{-- 
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
  <div class="container">
   
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto d-flex align-items-center">
        <a class="navbar-brand" href="{{ url('/') }}">
          {{ config('app.name', 'Laravel') }}
        </a>

        <div class="input-group">
          <form action="/accounts" method="get" class="d-flex">
            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Search by:</button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Account number</a></li>
            </ul>
            <input type="text" name="search_account" class="form-control" placeholder="Search accounts" aria-label="Search accounts" aria-describedby="search-accounts">
            <button class="btn btn-sm btn-primary" type="submit" id="search-accounts">Search</button>
          </form>
        </div>
  
      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto d-flex align-items-center">
        <!-- Authentication Links -->
        @guest
          @if (Route::has('login'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
          @endif

          @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
          @endif
        @else
          <li class="nav-item">
            <a class="btn btn-md" href="/accounts">Debtor Accounts</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-md" href="/categories">Categories</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-md btn-dark" href="/posts/create">Create Post</a>
          </li>

          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/profile/{{ Auth::user()->id }}">
                Profile
              </a>
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
      </ul>

  </div>
</nav> --}}