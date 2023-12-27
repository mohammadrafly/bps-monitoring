<?= $this->extend('layout/DashboardLayout') ?>

<?= $this->section('content') ?>  

    <div class="mx-auto p-4">
        <div class="mt-5 bg-white shadow rounded-lg p-4">
            <div class="overflow-x-auto">
            <h5 class="leading-none text-2xl font-medium text-gray-600 pb-2 mb-5">Profile</h5>
            <form action="<?= base_url('dashboard/profile/update/'.$data['id']) ?>" method="POST">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-600">Foto Profile</label>
                <div class="flex items-center justify-center w-full mb-2">
                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-200 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">PNG or JPG</p>
                        </div>
                        <input id="dropzone-file" type="file" name="profile" class="hidden" />
                    </label>
                </div> 
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-600">Nama Lengkap</label>
                        <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-200 dark:border-gray-200 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" value="<?= $data['name'] ?>" required>
                    </div>
                    <div>
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-600">Username</label>
                        <input type="text" id="username" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-200 dark:border-gray-200 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="FlyingBike224" value="<?= $data['username'] ?>" required>
                    </div>  
                    <div>
                        <label for="role" class="block mb-2 text-sm font-medium text-gray-600">Role</label>
                        <input disabled type="text" id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-200 dark:border-gray-200 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Admin/Operator" value="<?= $data['role'] ?>" required>
                    </div>
                    <div>
                        <label for="created_at" class="block mb-2 text-sm font-medium text-gray-600">Akun Dibuat</label>
                        <input type="text" id="created_at" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-200 dark:border-gray-200 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="2022-12-23" value="<?= $data['created_at'] ?>" required>
                    </div>
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
            </form>

            </div>
        </div>
    </div>

<?= $this->endSection() ?>
