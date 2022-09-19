<header class="main-header">
  <div class="header-wrapper">
    <ul class="list-unstyled">
      <li class="nav-item dashboard-icon">
        @guest
          <div class="dropdown">
            <a href="{{ route('register') }}" class="btn-dashboard">
              Login
            </a>
            <a href="{{ route('register') }}" class="btn-dashboard">
              Register
            </a>
          </div>
        @else
        <div class="dropdown">
          <button type="button" class="btn-dashboard dropdown-toggle position-relative" data-bs-toggle="dropdown">
            <span class="avtar-img"><img src="{{ $user->profile_pic}}"></span>
            <span class="user-name">{{ $user->name }}</span>  
            <span class="dots-icon"><img src="/assets/images/icons/dots.svg"></span>            
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
            <li><a class="dropdown-item" href="{{ route('profile.password') }}">Change Password</a></li>
            <li>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </li>
            
          </ul>
        </div>
        @endguest
      </li>
    </ul>
    <div class="abs-toggle-btn d-hide">
          <button class="toggle-btn"><i class="fa-solid fa-bars"></i></button>
        </div>
  </div>
</header>