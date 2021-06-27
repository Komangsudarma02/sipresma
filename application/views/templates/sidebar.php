<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#"></a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link">
        <img src="<?= base_url('assets/'); ?>img/undiksha.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Prestasi Mahasiswa</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('/upload/profile/') . $user['image'] ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a class="d-block"><?= $user['name']; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <?php if ($akun['id_role'] == 1) { ?>
                    <li class="nav-header">Admin</li>
                    <li class="nav-item has-treeview">
                        <a href="<?= site_url("Admin/daftarDashboard") ?>" class="nav-link <?= ($this->uri->segment(2) == "daftarDashboard") ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>


                    <li class="nav-header">User</li>
                    <li class="nav-item has-treeview">
                        <a href="<?= site_url("user/index") ?>" class="nav-link <?= ($this->uri->segment(2) == "index") ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-fw fa-user"></i>
                            <p>
                                My Profile
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= site_url("user/change_password") ?>" class="nav-link <?= ($this->uri->segment(2) == "change_password") ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-fw fa-key"></i>
                            <p>
                                Change Password
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">Master Data</li>
                    <li class="nav-item has-treeview">
                        <a href="<?= site_url("MasterData/daftarFakultas") ?>" class="nav-link <?= ($this->uri->segment(2) == "daftarFakultas") ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-fw fa-university"></i>
                            <p>
                                Data Fakultas
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="<?= site_url("MasterData/daftarJurusan") ?>" class="nav-link <?= ($this->uri->segment(2) == "daftarJurusan") ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-fw fa-chalkboard-teacher"></i>
                            <p>
                                Data Jurusan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="<?= site_url("MasterData/daftarProdi") ?>" class="nav-link <?= ($this->uri->segment(2) == "daftarProdi") ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-fw fa-edit"></i>
                            <p>
                                Data Prodi
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="<?= site_url("MasterData/daftarPembimbing") ?>" class="nav-link <?= ($this->uri->segment(2) == "daftarPembimbing") ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-fw fa-user"></i>
                            <p>
                                Data Pembimbing
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="<?= site_url("MasterData/daftarUser") ?>" class="nav-link <?= ($this->uri->segment(2) == "daftarUser") ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-fw fa-user-tie"></i>
                            <p>
                                Data User
                            </p>
                        </a>
                    </li>

                    <li class="nav-header">Prestasi</li>
                    <li class="nav-item has-treeview">
                        <a href="<?= site_url("Prestasi/daftarBidang") ?>" class="nav-link">
                            <i class="nav-icon fas fa-fw fa-copy"></i>
                            <p>
                                Data Bidang Prestasi
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="<?= site_url("Prestasi/daftarJenis") ?>" class="nav-link">
                            <i class="nav-icon fas fa-fw fa-file"></i>
                            <p>
                                Data Jenis Prestasi
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="<?= site_url("Prestasi/daftarTingkat") ?>" class="nav-link">
                            <i class="nav-icon fas fa-fw fa-award"></i>
                            <p>
                                Data Tingkat Prestasi
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="<?= site_url("Prestasi/daftarJenisJuara") ?>" class="nav-link">
                            <i class="nav-icon fas fa-fw fa-medal"></i>
                            <p>
                                Data Jenis Juara
                            </p>
                        </a>
                    </li>


                    <li class="nav-item has-treeview">
                        <a href="<?= site_url("Prestasi/daftarPrestasi") ?>" class="nav-link">
                            <i class="nav-icon fas fa-fw fa-trophy"></i>
                            <p>
                                Data Prestasi
                            </p>
                        </a>
                    </li>

                <?php } else if ($akun['id_role'] == 3) { ?>
                    <li class="nav-header">Admin</li>
                    <li class="nav-item has-treeview">
                        <a href="<?= site_url("Dashboard") ?>" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">User</li>
                    <li class="nav-item has-treeview">
                        <a href="<?= site_url("user") ?>" class="nav-link">
                            <i class="nav-icon fas fa-fw fa-user"></i>
                            <p>
                                My Profile
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= site_url("user/change_password") ?>" class="nav-link">
                            <i class="nav-icon fas fa-fw fa-key"></i>
                            <p>
                                Change Password
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">Data User</li>
                    <li class="nav-item has-treeview">
                        <a href="<?= site_url("DataUser/daftarUser") ?>" class="nav-link">
                            <i class="nav-icon fas fa-fw fa-user-tie"></i>
                            <p>
                                Data User
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">Data Prestasi</li>

                    <li class="nav-item has-treeview">
                        <a href="<?= base_url("PrestasiFakultas/daftarPrestasi"); ?>" class="nav-link">
                            <i class="nav-icon fas fa-fw fa-trophy"></i>
                            <p>
                                Data Prestasi
                            </p>
                        </a>
                    </li>

                <?php } else { ?>
                    <li class="nav-header">User</li>
                    <li class="nav-item has-treeview">
                        <a href="<?= site_url("user") ?>" class="nav-link">
                            <i class="nav-icon fas fa-fw fa-user"></i>
                            <p>
                                My Profile
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= site_url("user/change_password") ?>" class="nav-link">
                            <i class="nav-icon fas fa-fw fa-key"></i>
                            <p>
                                Change Password
                            </p>
                        </a>
                    </li>

                    <li class="nav-header">Data Prestasi</li>

                    <li class="nav-item has-treeview">
                        <a href="<?= site_url("Mahasiswa/daftarPrestasi") ?>" class="nav-link">
                            <i class="nav-icon fas fa-fw fa-trophy"></i>
                            <p>
                                Data Prestasi
                            </p>
                        </a>

                    </li>
                <?php } ?>
                <li class="nav-item has-treeview">
                    <a href="<?= site_url("auth/logout") ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>