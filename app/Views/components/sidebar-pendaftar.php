<aside id="sidebar" class="layout-transition fixed inset-y-0 left-0 z-40 w-64 bg-white text-slate-600 transform -translate-x-full lg:translate-x-0 border-r border-gray-200 flex flex-col h-screen shadow-xl overflow-x-hidden">

    <div class="h-16 flex items-center border-b border-gray-100 bg-white sticky top-0 z-50">
        <div class="flex items-center gap-3 w-full px-6 overflow-hidden whitespace-nowrap">
            <img src="<?= base_url('images/logo.png') ?>" alt="Logo" class="w-9 h-9 flex-shrink-0 object-contain">
            <span class="font-bold text-lg text-gray-800 tracking-wide truncate">Panel Santri</span>
        </div>
    </div>

    <div class="flex-1 overflow-y-auto no-scrollbar py-4 space-y-1">

        <a href="<?= base_url('pendaftar/dashboard') ?>" class="group flex items-center px-4 py-3 mx-3 rounded-xl transition-all duration-200 hover:bg-emerald-50 hover:text-emerald-600 <?= uri_string() == 'pendaftar/dashboard' ? 'bg-emerald-600 text-white shadow-md shadow-emerald-900/20 hover:!bg-emerald-700 hover:!text-white' : '' ?>">
            <svg class="w-5 h-5 flex-shrink-0 transition-transform group-hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
            </svg>
            <span class="ml-3 font-medium sidebar-text whitespace-nowrap">Dashboard</span>
        </a>

        <a href="<?= base_url('pendaftar/pembayaran') ?>" class="group flex items-center px-4 py-3 mx-3 rounded-xl transition-all duration-200 hover:bg-emerald-50 hover:text-emerald-600 <?= uri_string() == 'pendaftar/pembayaran' ? 'bg-emerald-600 text-white shadow-md shadow-emerald-900/20 hover:!bg-emerald-700 hover:!text-white' : '' ?>">
            <svg class="w-5 h-5 flex-shrink-0 transition-transform group-hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
            </svg>
            <span class="ml-3 font-medium sidebar-text whitespace-nowrap">Pembayaran</span>
        </a>
        
        <a href="<?= base_url('pendaftar/berkas') ?>" class="group flex items-center px-4 py-3 mx-3 rounded-xl transition-all duration-200 hover:bg-emerald-50 hover:text-emerald-600 <?= uri_string() == 'pendaftar/berkas' ? 'bg-emerald-600 text-white shadow-md shadow-emerald-900/20 hover:!bg-emerald-700 hover:!text-white' : '' ?>">
            <svg class="w-5 h-5 flex-shrink-0 transition-transform group-hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <span class="ml-3 font-medium sidebar-text whitespace-nowrap">Unggah Berkas</span>
        </a>

        <a href="<?= base_url('pendaftar/status') ?>" class="group flex items-center px-4 py-3 mx-3 rounded-xl transition-all duration-200 hover:bg-emerald-50 hover:text-emerald-600 <?= uri_string() == 'pendaftar/status' ? 'bg-emerald-600 text-white shadow-md shadow-emerald-900/20 hover:!bg-emerald-700 hover:!text-white' : '' ?>">
            <svg class="w-5 h-5 flex-shrink-0 transition-transform group-hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
            </svg>
            <span class="ml-3 font-medium sidebar-text whitespace-nowrap">Status Pendaftaran</span>
        </a>

    </div>

    <div class="p-4 border-t border-gray-100">
        <button onclick="showLogoutModal()" class="w-full group flex items-center px-4 py-3 mx-2 rounded-xl text-slate-500 hover:bg-red-50 hover:text-red-600 transition-all focus:outline-none">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
            </svg>
            <span class="ml-3 font-medium sidebar-text whitespace-nowrap">Keluar</span>
        </button>
    </div>
</aside>

<div id="logoutModal" class="fixed inset-0 z-[60] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm transition-opacity" onclick="hideLogoutModal()"></div>

    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-md border border-gray-100">
            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                        <h3 class="text-lg font-bold leading-6 text-gray-900">Konfirmasi Keluar</h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">Apakah Anda yakin ingin mengakhiri sesi dan keluar dari panel santri?</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 gap-2">
                <a href="<?= base_url('auth/logout') ?>" class="inline-flex w-full justify-center rounded-lg bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-700 sm:ml-3 sm:w-auto transition">Ya, Keluar</a>
                <button type="button" onclick="hideLogoutModal()" class="mt-3 inline-flex w-full justify-center rounded-lg bg-white px-4 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto transition">Batal</button>
            </div>
        </div>
    </div>
</div>

<script>
    function showLogoutModal() {
        document.getElementById('logoutModal').classList.remove('hidden');
    }

    function hideLogoutModal() {
        document.getElementById('logoutModal').classList.add('hidden');
    }
</script>