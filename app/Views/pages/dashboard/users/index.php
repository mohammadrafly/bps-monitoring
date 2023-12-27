<?= $this->extend('layout/DashboardLayout') ?>

<?= $this->section('content') ?>  

            <div class="mx-auto p-4">
                <h1 class="mb-4 text-2xl font-medium text-gray-600"><?= $title ?></h1>
                <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="flex text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                    <svg class="w-5 h-5 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 5.757v8.486M5.757 10h8.486M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    Tambah Pengguna
                </button>

                <!-- Main modal -->
                <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 right-0 bottom-0 left-0 z-50 flex items-center justify-center min-h-screen bg-black bg-opacity-50">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-200">
                                <h3 class="modal-title text-xl font-semibold text-gray-900">
                                    Tambah Pengguna
                                </h3>
                                <button type="button" class="close-button text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5 space-y-4">
                                <form id="form" class="p-4 md:p-5">
                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                        <div class="col-span-2">
                                            <label for="input" class="block mb-2 text-sm font-medium text-gray-500">Nama</label>
                                            <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-200 dark:border-gray-200 dark:placeholder-gray-400 dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukan Nama" required="">
                                            <input hidden type="text" id="id" name="id">
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="input" class="block mb-2 text-sm font-medium text-gray-500">Username</label>
                                            <input type="text" id="username" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-200 dark:border-gray-200 dark:placeholder-gray-400 dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukan Username" required="">
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="role" class="block mb-2 text-sm font-medium text-gray-500">Role</label>
                                            <select id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-200 dark:border-gray-200 dark:placeholder-gray-400 dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                <option value="admin">Admin</option>
                                                <option value="operator">Operator</option>
                                            </select>
                                        </div>
                                        <div class="col-span-2 sm:col-span-1 password-input">
                                            <label for="input" class="block mb-2 text-sm font-medium text-gray-500">Password</label>
                                            <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-200 dark:border-gray-200 dark:placeholder-gray-400 dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukan Password" required="">
                                        </div>
                                        <div class="col-span-2 sm:col-span-1 password-input">
                                            <label for="input" class="block mb-2 text-sm font-medium text-gray-500">Konfirmasi Password</label>
                                            <input type="password" id="password_confirm" name="password_confirm" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-200 dark:border-gray-200 dark:placeholder-gray-400 dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukan Konfirmasi Password" required="">
                                        </div>
                                    </div>
                                    <button type="button" onclick="save()" class="button-title text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                        Add new user
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-5 bg-white rounded-lg p-4">
                    <div class="overflow-x-auto">
                        <table id="bps-datatable" class="display table-auto w-full text-gray-600">
                            <thead>
                                <tr>
                                    <th class="border px-4 py-2">#</th>
                                    <th class="border px-4 py-2">Nama</th>
                                    <th class="border px-4 py-2">Username</th>
                                    <th class="border px-4 py-2">Role</th>
                                    <th class="border px-4 py-2">Dibuat</th>
                                    <th class="border px-4 py-2">Diperbarui</th>
                                    <th class="border px-4 py-2">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                foreach($data as $row): ?>
                                <tr>
                                    <td class="border px-4 py-2"><?= $no++ ?></td>
                                    <td class="border px-4 py-2"><?= $row['name']?></td>
                                    <td class="border px-4 py-2"><?= $row['username']?></td>
                                    <td class="border px-4 py-2"><?= $row['role']?></td>
                                    <td class="border px-4 py-2"><?= $row['created_at']?></td>
                                    <td class="border px-4 py-2"><?= $row['updated_at']?></td>
                                    <td class="border px-4 py-2 flex">
                                        <button onclick="updateData(<?= $row['id'] ?>)" class="flex bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm rounded-lg py-2 px-4 mr-2">
                                            <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                                <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                                                <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                                            </svg>    
                                            Edit
                                        </button>
                                        <button onclick="deleteData(<?= $row['id'] ?>)" class="flex bg-red-600 hover:bg-red-700 text-white font-medium text-sm rounded-lg py-2 px-4">
                                            <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                                            </svg>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

<script src="https://code.jquery.com/jquery-3.6.4.js"></script>
<script src="<?= base_url('assets/js/User.js') ?>"></script>

<?= $this->endSection() ?>
