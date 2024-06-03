<nav class="main-nav--bg">
    <div class="container main-nav">
        <div class="main-nav-start">
        </div>
        <div class="main-nav-end">
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                <span class="sr-only">Toggle menu</span>
                <span class="icon menu-toggle--gray" aria-hidden="true"></span>
            </button>
            <button class="theme-switcher gray-circle-btn" type="button" title="Switch theme">
                <span class="sr-only">Switch theme</span>
                <i class="sun-icon" data-feather="sun" aria-hidden="true"></i>
                <i class="moon-icon" data-feather="moon" aria-hidden="true"></i>
            </button>
            <div class="nav-user-wrapper">
                <button class="nav-user-btn dropdown-btn" title="My profile" type="button" data-toggle="dropdown">
                    <span class="sr-only">My profile</span>
                    <span class="nav-user-img">
                        <picture>
                            <source srcset="{{ asset('assets/img/avatar/avatar-illustrated-02.webp') }}" type="image/webp">
                            <img src="{{ asset('assets/img/avatar/avatar-illustrated-02.png') }}" alt="User name">
                        </picture>
                    </span>
                </button>
                <ul class="users-item-dropdown nav-user-dropdown dropdown">
                    <li><a href="{{ route('home') }}">
                        <i data-feather="home" aria-hidden="true"></i>
                        <span>Dashboard</span>
                        </a></li>
                    <li><a href="#">
                        <i data-feather="settings" aria-hidden="true"></i>
                        <span>Account</span>
                        </a>
                    </li>
                    <!-- <li><a href="{{ route('parkir.masuk') }}">
                        <i data-feather="log-in" aria-hidden="true"></i>
                        <span>Parkir Masuk</span>
                        </a>
                    </li>
                    <li><a href="{{ route('parkir.keluar') }}">
                        <i data-feather="log-out" aria-hidden="true"></i>
                        <span>Parkir Keluar</span>
                        </a>
                    </li> -->
                    <li>
                        <a class="danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i data-feather="log-out" aria-hidden="true"></i>
                            <span>Log out</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<script>
    feather.replace();
</script>
