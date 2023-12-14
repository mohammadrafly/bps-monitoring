        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="#" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-white">
                        <img src="<?= base_url('assets/img/logo.png') ?>" style="width: 50px; heigth: 50px;">
                        BPS-M
                    </h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="<?= base_url('assets/img/user.jpg') ?>" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?= session()->get('username') ?></h6>
                        <span><?= session()->get('role') ?></span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="<?= base_url('dashboard') ?>" class="nav-item nav-link <?php if(current_url() == base_url('dashboard')) echo 'active'; ?>">
                        <i class="fa fa-tachometer-alt me-2"></i>Beranda
                    </a>
                    <a href="<?= base_url('dashboard/employee') ?>" class="nav-item nav-link <?php if(current_url() == base_url('dashboard/employee')) echo 'active'; ?>">
                        <i class="fa fa-th me-2"></i>Progres Operator
                    </a>
                    <a href="<?= base_url('dashboard/users') ?>" class="nav-item nav-link <?php if(current_url() == base_url('dashboard/users')) echo 'active'; ?>">
                        <i class="fa fa-keyboard me-2"></i>Pengguna
                    </a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->