<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="text-wrapper">
                    <p class="profile-name">Bobby</p>
                    <p class="designation">Administrator</p>
                </div>
            </a>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Dashboard</span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/dashboard">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon text-success"></i>
            </a>
        </li>
        <li class="nav-item nav-category"><span class="nav-link">Data Tables</span></li>
        <li class="nav-item">
            <a class="nav-link" href="/inventaris">
                <span class="menu-title">Inventaris</span>
                <i class="icon-globe menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/member">
                <span class="menu-title">Member</span>
                <i class="icon-book-open menu-icon"></i>
            </a>
        </li>

        <?php if (session()->get('level') == '1') : ?>
            <li class="nav-item">
                <a class="nav-link" href="/staff">
                    <span class="menu-title">Staff</span>
                    <i class="icon-chart menu-icon"></i>
                </a>
            </li>
        <?php endif ?>


        <li class="nav-item nav-category"><span class="nav-link">Transaction</span></li>
        <li class="nav-item">
            <a class="nav-link" href="/booking">
                <span class="menu-title">Booking</span>
                <i class="icon-doc menu-icon"></i>
            </a>
        </li>

        <li class="nav-item mt-3">
            <a class="nav-link bg-danger rounded-pill" href="<?= base_url('/logout') ?>">
                <span class="menu-title p-2 d-block text-center">Logout</span>
            </a>
        </li>
    </ul>
</nav>