<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon">
            <img src="logo_new.png" alt="Logo" style="width: 100px; height: 100px;" />
        </div>
        <div class="sidebar-brand-text mx-3">SIMOFLOK IOT</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Addons
    </div>
    <li class="nav-item">
        <a class="nav-link d-flex align-items-center cursor-pointer" id="dropdown-1" style="user-select: none;">
            <i class="fas fa-fw fa-chart-area"></i>
            <span class="d-flex w-100 flex-row justify-content-between align-items-center">Detail Data <span class="font-weight-bold font-lg" id="plus" style="font-size: 1.2rem;"> + </span>
            </span>
            <span class="font-weight-bold font-lg hidden" id="minus" style="font-size: 1.2rem;"> - </span>
            </span>
        </a>
        <ul id="detail-wrapper" class="">
            <li style="list-style:none;"><a class="nav-link p-1" href="dashboard.php?page=full">Full</a></li>
            <li style="list-style:none;"><a class="nav-link p-1" href="dashboard.php?page=halaman-data-suhu">Data Suhu</a></li>
            <li style="list-style:none;"><a class="nav-link p-1" href="dashboard.php?page=halaman-data-ph">Data PH</a></li>
            <li style="list-style:none;"><a class="nav-link p-1" href="dashboard.php?page=halaman-data-oksigen">Data Kadar Oksigen</a></li>
            <li style="list-style:none;"><a class="nav-link p-1" href="dashboard.php?page=halaman-data-aerator">Data Kadar Aerator</a></li>
            <li style="list-style:none;"><a class="nav-link p-1" href="dashboard.php?page=halaman-data-amoniak">Data Kadar Amoniak</a></li>
        </ul>
    </li>
    <li class="nav-item" style="cursor: pointer;">
        <!-- <a class="nav-link" href="dashboard.php?page=halaman-laporan">
            <i class="fas fa-fw fa-table"></i>
            <span>Laporan</span></a> -->
        <a class="nav-link" data-toggle="modal" data-target="#tambahData"><i class="fas fa-table"></i>
            <span>Pakan & Kematian</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="dashboard.php?page=halaman-laporan">
            <i class="fas fa-fw fa-book"></i>
            <span>Laporan</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="dashboard.php?page=halaman-tambah-user">
            <i class="fas fa-user"></i>
            <span>Tambah User / Admin</span></a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>