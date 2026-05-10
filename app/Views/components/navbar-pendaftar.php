<header class="bg-white/80 backdrop-blur-md shadow-sm h-16 flex items-center justify-between px-4 md:px-6 sticky top-0 z-20 border-b border-gray-100">
    
    <div class="flex items-center gap-4">
        <button onclick="window.innerWidth < 1024 ? toggleSidebarMobile() : toggleSidebarDesktop()" class="p-2 rounded-lg text-gray-500 hover:bg-gray-100 hover:text-emerald-600 transition focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path></svg>
        </button>
        
        <h2 class="text-lg font-bold text-gray-800 hidden md:block tracking-tight"><?= $title ?? 'Dashboard' ?></h2>
    </div>

    <div class="relative">
        <button id="profile-btn" onclick="toggleProfileMenu()" class="flex items-center gap-3 focus:outline-none hover:bg-gray-50 p-1.5 pr-3 rounded-full border border-transparent hover:border-gray-200 transition">
            
            <div class="text-right">
                <p class="text-sm font-bold text-gray-700 leading-none"><?= session()->get('nama_lengkap') ?></p>
                <p class="text-[10px] uppercase font-bold text-emerald-600 mt-0.5 bg-emerald-50 px-2 rounded-full inline-block">
                    <?= session()->get('no_registrasi') ?>
                </p>
            </div>

            <div class="h-9 w-9 bg-gradient-to-br from-emerald-500 to-teal-600 text-white rounded-full flex items-center justify-center shadow-md font-bold text-sm">
                <?= strtoupper(substr(session()->get('nama_lengkap'), 0, 1)) ?>
            </div>
        </button>

        <div id="profile-menu" class="hidden absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-xl border border-gray-100 py-2 z-50 transform origin-top-right transition-all">
            <div class="px-4 py-3 border-b border-gray-50 md:hidden bg-gray-50/50">
                <p class="text-sm font-bold text-gray-800"><?= session()->get('nama_lengkap') ?></p>
                <p class="text-xs text-emerald-600 font-bold"><?= session()->get('no_registrasi') ?></p>
            </div>

            <button onclick="showLogoutModalNav()" class="w-full text-left block px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 flex items-center gap-3 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                Keluar Aplikasi
            </button>
        </div>
    </div>
</header>

<div id="logoutModalNav" class="fixed inset-0 z-[60] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity" onclick="hideLogoutModalNav()"></div>
    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-md border border-gray-100">
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
                            <p class="text-sm text-gray-500">Apakah Anda yakin ingin keluar? Sesi Anda akan berakhir.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 gap-2">
                <a href="<?= base_url('auth/logout') ?>" class="inline-flex w-full justify-center rounded-lg bg-red-600 px-4 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-red-700 sm:w-auto">Ya, Keluar</a>
                <button type="button" onclick="hideLogoutModalNav()" class="mt-3 inline-flex w-full justify-center rounded-lg bg-white px-4 py-2.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Batal</button>
            </div>
        </div>
    </div>
</div>

<script>
    function showLogoutModalNav() {
        document.getElementById('profile-menu').classList.add('hidden');
        document.getElementById('logoutModalNav').classList.remove('hidden');
    }
    function hideLogoutModalNav() {
        document.getElementById('logoutModalNav').classList.add('hidden');
    }
</script>