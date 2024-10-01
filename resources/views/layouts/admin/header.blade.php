<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <a class="navbar-brand" href="./">
                <img src="{{ asset('adminTheme/images/logo.png') }}" alt="Logo" style="max-width: 110px;">
            </a>
            <a class="navbar-brand hidden" href="./">
                <img src="{{ asset('adminTheme/images/logo2.png') }}" alt="Logo">
            </a>
            <a id="menuToggle" class="menutoggle">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">
            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if(Auth::guard('admin')->check() && !empty(Auth::guard('admin')->user()->image))
                        <img class="user-avatar rounded-circle" src="{{ url(Auth::guard('admin')->user()->image) }}" alt="User Avatar">
                    @else
                        <img class="user-avatar rounded-circle" src="{{ asset('default-avatar.png') }}" alt="User Avatar">
                    @endif
                </a>
                <div class="user-menu dropdown-menu">
                    <a class="nav-link" href="{{ url('admin/profile') }}">
                        <i class="fa fa-user"></i> My Profile
                    </a>
                    <a class="nav-link" href="#">
                        <i class="fa fa-cog"></i> Settings
                    </a>
                    <a class="nav-link" href="{{ route('logout') }}" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-power-off"></i> {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
