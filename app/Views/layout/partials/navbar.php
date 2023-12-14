            <nav class="navbar navbar-expand bg-green navbar-dark sticky-top px-4 py-0">
                <a href="#" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0">
                        <img src="<?= base_url('assets/img/logo.png') ?>">
                    </h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="<?= base_url('assets/img/user.jpg') ?>" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?= session()->get('username') ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">Profil</a>
                            <a href="#" class="dropdown-item">Pengaturan</a>
                            <a href="javascript:void(0);" onclick="signOut()" class="dropdown-item">Keluar</a>
                        </div>
                    </div>
                </div>
            </nav>