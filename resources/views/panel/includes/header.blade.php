<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">ProjectSell</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ request()->routeIs('panel.pages.home') ? '#home' : route('panel.pages.home') . '#home' }}" class="{{ request()->routeIs('panel.pages.home') ? 'active' : '' }}">Home</a></li>
          <li><a href="{{ request()->routeIs('panel.pages.home') ? '#portfolio' : route('panel.pages.home') . '#portfolio' }}">Portfolio</a></li>
          <li><a href="{{ request()->routeIs('panel.pages.home') ? '#projects' : route('panel.pages.home') . '#projects' }}">Projects</a></li>
          <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Dropdown 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul>
          </li>
          
          <li><a href="{{ request()->routeIs('panel.pages.home') ? '#contact' : route('panel.pages.home') . '#contact' }}">Contact</a></li>
          @auth
                @if(auth()->user()->role === 'admin')
                    <li><a href="{{ route('panel.pages.add-project-form') }}">Add Project</a></li>
                @endif
            @endauth
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      

      @guest
          <a class="cta-btn" href="{{ route('register') }}">Register</a>
          <a class="cta-btn" href="{{ route('login') }}">Login</a>
      @else
            @if(auth()->user()->role === 'admin')
              <a class="cta-btn" href="{{ route('admin.dashboard') }}">Admin</a>
            @endif
            <form action="{{ route('logout') }}" method="POST" style="display:inline; margin: 0;">
              @csrf
              <button type="submit" class="cta-btn">Logout</button>
            </form>
      @endguest
    </div>
  </header>
