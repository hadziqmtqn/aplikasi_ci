<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="<?= base_url('/') ?>">Aplikasi CI</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item <?php if(($title == 'List Data Mahasiswa') OR ($title == 'Tambah Data Mahasiswa') OR ($title == 'Edit Data Mahasiswa') OR ($title == 'Detail Mahasiswa')) echo "active"; ?>">
                <a class="nav-link" href="<?= base_url('mahasiswa'); ?>">Mahasiswa</a>
            </li>
            <li class="nav-item <?php if(($title == 'Tambah Data Dosen') OR ($title == 'Data List Dosen') OR ($title == 'Edit Data Dosen')) echo "active"; ?>">
                <a class="nav-link" href="<?= base_url('dosen'); ?>">Dosen</a>
            </li>
            <li class="nav-item dropdown <?php if($title == 'Data Prodi') echo "active"; ?>">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                Data Master
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?= base_url('prodi'); ?>">Prodi</a>
                </div>
            </li>
        </ul>
    </div>
</nav>