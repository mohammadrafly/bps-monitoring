<?= $this->extend('layout/DashboardLayout') ?>

<?= $this->section('content') ?>  

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4"><?= $title ?></h6>
                            <button type="button" class="btn btn-primary mb-4" onclick="openCustomModal('modal')">
                                Tambah Pengguna
                            </button>
                            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title text-dark" id="myModalLabel">Tambah Pengguna</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form id="form">
                                                <div class="form-group">
                                                    <label for="inputName">Nama</label>
                                                    <input type="text" class="form-control bg-white" id="name" name="name" placeholder="masukkan nama">
                                                    <input hidden type="text" id="id" name="id">
                                                </div>
                                                <div id="username-input" class="form-group">
                                                    <label for="inputName">Username</label>
                                                    <input type="text" class="form-control bg-white" id="username" name="username" placeholder="masukkan username">
                                                </div>
                                                <div id="password-input" class="form-group">
                                                    <label for="inputName">Password</label>
                                                    <input type="password" class="form-control bg-white" id="password" name="password" placeholder="masukkan password">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputName">Role</label>
                                                    <select class="form-control bg-white" id="role" name="role">
                                                        <option value="admin">Admin</option>
                                                        <option value="operator">Operator</option>
                                                    </select>
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
                                            <th scope="col">Nama</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Role</th>
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
                                            <td><?= $row['name']?></td>
                                            <td><?= $row['username']?></td>
                                            <td><?= $row['role']?></td>
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

<script src="<?= base_url('assets/js/User.js') ?>"></script>

<?= $this->endSection() ?>