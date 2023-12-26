<nav class="bg-white text-gray-600 w-64 min-h-screen p-4">
    <div class="space-y-4 font-medium">
        <a href="<?= base_url('dashboard') ?>" class="flex py-2 px-4 rounded-lg hover:bg-bps-green-fade hover:text-white <?= current_url() == base_url('dashboard') ? 'bg-bps-orange text-white' : '' ?>">
            <svg class="w-5 h-5 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8v10a1 1 0 0 0 1 1h4v-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v5h4a1 1 0 0 0 1-1V8M1 10l9-9 9 9"/>
            </svg>
            Dashboard
        </a>
        <a href="<?= base_url('dashboard/employee') ?>" class="flex py-2 px-4 rounded-lg hover:bg-bps-green-fade hover:text-white <?= current_url() == base_url('dashboard/employee') ? 'bg-bps-orange text-white' : '' ?>">
            <svg class="w-5 h-5 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.333 6.764a3 3 0 1 1 3.141-5.023M2.5 16H1v-2a4 4 0 0 1 4-4m7.379-8.121a3 3 0 1 1 2.976 5M15 10a4 4 0 0 1 4 4v2h-1.761M13 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-4 6h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z"/>
            </svg>
            Employee
        </a>
        <?php if(session()->get('role') == 'admin'): ?>
        <a href="<?= base_url('dashboard/users') ?>" class="flex py-2 px-4 rounded-lg hover:bg-bps-green-fade hover:text-white <?= current_url() == base_url('dashboard/users') ? 'bg-bps-orange text-white' : '' ?>">
            <svg class="w-5 h-5 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 3a3 3 0 1 1-1.614 5.53M15 12a4 4 0 0 1 4 4v1h-3.348M10 4.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z"/>
            </svg>
            Users
        </a>
        <?php endif ?>
    </div>
</nav>
