<aside class="sidebar">
    <div class="sidebar-start">
        <div class="sidebar-head">
            <a href="{{ route('admin.home') }}" class="logo-wrapper" title="Home">
                <span class="sr-only">Home</span>
                <span class="icon logo" aria-hidden="true"></span>
                <div class="logo-text">
                    <span class="logo-title">Admin <br>
                        Parkir</span>
                    <span class="logo-subtitle">Dashboard</span>
                </div>
            </a>
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                <span class="sr-only">Toggle menu</span>
                <span class="icon menu-toggle" aria-hidden="true"></span>
            </button>
        </div>
        <div class="sidebar-body">
            <ul class="sidebar-body-menu">
                <!-- Menu Utama -->
                <li>
                    <a class="active" href="{{ route('admin.home') }}">
                        <span class="icon home" aria-hidden="true"></span>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a class="show-cat-btn" href="#">
                        <span class="icon document" aria-hidden="true"></span>
                        Data Management
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <!-- Submenu Posts -->
                    <ul class="cat-sub-menu">
                        <li><a href="{{ route('admin.user') }}">User Management</a></li>
                        <li><a href="new-post.html">Add new post</a></li>
                    </ul>
                </li>
                <!-- Menampilkan submenu lainnya -->
                <!-- dan seterusnya -->
            </ul>
            <!-- Menu System -->
            <span class="system-menu__title">system</span>
            <ul class="sidebar-body-menu">
                <li><a href="appearance.html"><span class="icon edit" aria-hidden="true"></span>Appearance</a></li>
                <li>
                    <a class="show-cat-btn" href="#">
                        <span class="icon category" aria-hidden="true"></span>
                        Extensions
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <!-- Submenu Extensions -->
                    <ul class="cat-sub-menu">
                        <li><a href="extension-01.html">Extensions-01</a></li>
                        <li><a href="extension-02.html">Extensions-02</a></li>
                    </ul>
                </li>
                <!-- Menampilkan submenu lainnya -->
                <!-- dan seterusnya -->
            </ul>
        </div>
    </div>
</aside>
