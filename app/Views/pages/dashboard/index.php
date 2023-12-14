<?= $this->extend('layout/DashboardLayout') ?>

<?= $this->section('content') ?>  

            <div class="container-fluid pt-4 px-4" style="background-color: #F5F7F8">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-6">
                        <div class="bg-white rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-users fa-3x text-secondary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Operator</p>
                                <h6 class="mb-0 text-muted text-center"><?= $user ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-6">
                        <div class="bg-white rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-book fa-3x text-secondary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Progress Operator</p>
                                <h6 class="mb-0 text-muted text-center"><?= $employee ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->

            <div class="container-fluid pt-4 px-4"  style="background-color: #F5F7F8">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-white rounded h-100 p-4">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Petugas</th>
                                            <th scope="col">Target</th>
                                            <th scope="col">Absolut</th>
                                            <th scope="col">Realisasi (%)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        foreach($data as $row): ?>
                                        <tr>
                                            <th><?= $no++ ?></th>
                                            <td><?= $row['nama_petugas']?></td>
                                            <td><?= $row['target']?></td>
                                            <td><?= $row['total_absolut']?></td>
                                            <td><?= $row['total_absolut'] / $row['target'] ?>%</td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?= $this->endSection() ?>