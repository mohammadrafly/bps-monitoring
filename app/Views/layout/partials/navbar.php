<nav class="bg-white text-gray-800 p-4 shadow-sm">
    <div class="flex justify-between items-center">
        <div class="flex items-center">
            <img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo" class="h-8 w-auto mr-2">
            <span class="text-2xl font-bold">BPS-M</span>
        </div>
        <!-- Profile Dropdown -->
        <div class="relative">
            <button class="flex items-center focus:outline-none">
                <?php if(!session()->get('profile')): ?>
                    <div class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                        <?php
                        $name = session()->get('name');
                        $initials = '';

                        if (!empty($name)) {
                            $words = explode(' ', $name);

                            foreach ($words as $word) {
                                $initials .= strtoupper($word[0]);
                            }
                        }
                        ?>
                        <span class="font-medium text-gray-600 dark:text-gray-300"><?= $initials ?></span>
                    </div>
                <?php else: ?>
                <img src="<?= base_url('profile/'.session()->get('profile')) ?>" alt="Profile" class="h-8 w-8 rounded-full">
                <?php endif ?>
                <span class="ml-2 text-sm font-medium"><?= session()->get('name') ?></span>
                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
            <!-- Dropdown Content -->
            <div class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-md hidden">
                <a href="<?= base_url('dashboard/profile/update/'.session()->get('id')) ?>" class="block px-4 py-2 text-sm font-medium text-gray-600 hover:bg-gray-100">Profile</a>
                <a href="javascript:void(0);" onclick="signOut()" class="block px-4 py-2 text-sm font-medium text-gray-600 hover:bg-gray-100">Logout</a>
            </div>
        </div>
    </div>
</nav>