<nav class="main-nav--bg">
    <div class="container main-nav">
        <div class="main-nav-start">
        </div>
        <div class="main-nav-end">
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                <span class="sr-only">Toggle menu</span>
                <span class="icon menu-toggle--gray" aria-hidden="true"></span>
            </button>
            <div class="lang-switcher-wrapper">
                <button class="lang-switcher transparent-btn" type="button">
                    EN
                    <i data-feather="chevron-down" aria-hidden="true"></i>
                </button>
                <ul class="lang-menu dropdown">
                    <li><a href="#">English</a></li>
                    <li><a href="#">French</a></li>
                    <li><a href="#">Uzbek</a></li>
                </ul>
            </div>
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
                    <li><a href="#">
                        <i data-feather="user" aria-hidden="true"></i>
                        <span>Profile</span>
                        </a></li>
                    <li><a href="#">
                        <i data-feather="settings" aria-hidden="true"></i>
                        <span>Account settings</span>
                        </a></li>
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
