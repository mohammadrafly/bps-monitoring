<?= $this->extend('layout/DashboardLayout') ?>

<?= $this->section('content') ?>  

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4"><?= $title ?></h6>
                            <button type="button" class="btn btn-primary mb-4" onclick="openCustomModal('modal')">
                                Tambah Employee
                            </button>
                            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content bg-white">
                                        <div class="modal-header">
                                            <h4 class="modal-title text-dark" id="myModalLabel">Tambah Employee</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form id="form">
                                                <div class="form-group">
                                                    <label for="inputName">Nama KS</label>
                                                    <input type="text" class="form-control bg-white" id="nama_ks" name="nama_ks" placeholder="Masukkan Nama KS">
                                                    <input hidden type="text" id="id" name="id">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputName">Nama Petugas</label>
                                                    <input type="text" class="form-control bg-white" id="nama_petugas" name="nama_petugas" placeholder="Masukkan Nama Petugas">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputName">Target</label>
                                                    <input type="text" class="form-control bg-white" id="target" name="target" placeholder="Masukkan Target">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputName">Realisasi</label>
                                                    <input type="text" class="form-control bg-white" id="realisasi" name="realisasi" placeholder="Masukkan Realisasi">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputName">Total Absolut</label>
                                                    <input type="text" class="form-control bg-white" id="total_absolut" name="total_absolut" placeholder="Masukkan Total Absolut">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button onclick="save()" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama KS</th>
                                            <th scope="col">Nama Petugas</th>
                                            <th scope="col">Target</th>
                                            <th scope="col">Realisasi</th>
                                            <th scope="col">Total Absolut</th>
                                            <th scope="col">Dibuat</th>
                                            <th scope="col">Diperbarui</th>
                                            <th scope="col">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        foreach($data as $row): ?>
                                        <tr>
                                            <th><?= $no++ ?></th>
                                            <td><?= $row['nama_ks']?></td>
                                            <td><?= $row['nama_petugas']?></td>
                                            <td><?= $row['target']?></td>
                                            <td><?= $row['realisasi']?></td>
                                            <td><?= $row['total_absolut']?></td>
                                            <td><?= $row['created_at']?></td>
                                            <td><?= $row['updated_at']?></td>
                                            <td>
                                                <button onclick="updateData(<?= $row['id'] ?>)" class="btn btn-primary btn-sm mr-2">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <button onclick="deleteData(<?= $row['id'] ?>)" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<script src="<?= base_url('assets/js/Employee.js') ?>"></script>

<?= $this->endSection() ?>