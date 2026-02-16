<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    
    <div class="mb-10 flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Profil Saya</h2>
            <p class="mt-2 text-sm text-gray-500">Kelola informasi akun dan keamanan Anda di sini.</p>
        </div>
        <div class="hidden sm:block p-3 bg-emerald-100 rounded-full text-emerald-600">
             <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
        </div>
    </div>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 p-4 rounded-md shadow-sm mb-8 flex items-start gap-3 animate-fade-in-down">
            <svg class="w-5 h-5 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            <div>
                <p class="font-medium">Sukses!</p>
                <p class="text-sm"><?= session()->getFlashdata('success') ?></p>
            </div>
        </div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>
        <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-md shadow-sm mb-8 flex items-start gap-3 animate-fade-in-down">
            <svg class="w-5 h-5 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <div>
                 <p class="font-medium">Terjadi Kesalahan</p>
                <p class="text-sm"><?= session()->getFlashdata('error') ?></p>
            </div>
        </div>
    <?php endif; ?>

    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        
        <div class="bg-gray-50/80 px-8 py-8 border-b border-gray-100 flex flex-col sm:flex-row items-center gap-6">
            <div class="relative">
                <div class="h-20 w-20 bg-gradient-to-br from-emerald-400 to-emerald-600 text-white rounded-full flex items-center justify-center text-3xl shadow-lg ring-4 ring-white">
                    <span class="font-bold"><?= strtoupper(substr($user['nama_lengkap'], 0, 1)) ?></span>
                </div>
                 <div class="absolute bottom-0 right-0 bg-white rounded-full p-1 shadow-md border border-gray-100">
                    <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
            </div>
            <div class="text-center sm:text-left">
                <h3 class="text-xl font-bold text-gray-900"><?= $user['nama_lengkap'] ?></h3>
                <p class="text-gray-500 text-sm mb-2">@<?= $user['username'] ?></p>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 uppercase tracking-wider">
                    <?= $user['role'] ?>
                </span>
            </div>
        </div>

        <div class="p-8 sm:p-10">
            <form id="formProfile" action="<?= base_url('admin/updateProfile') ?>" method="POST">
                <?= csrf_field() ?>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">
                    <div class="group">
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2 group-focus-within:text-emerald-600 transition-colors">Nama Lengkap</label>
                        <div class="relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <input type="text" value="<?= $user['nama_lengkap'] ?>" disabled class="block w-full pl-10 pr-3 py-3 border-gray-200 rounded-lg bg-gray-50 text-gray-500 sm:text-sm cursor-not-allowed focus:ring-0 focus:border-gray-200 transition-all">
                        </div>
                        <p class="mt-1 text-xs text-gray-400">Nama lengkap tidak dapat diubah.</p>
                    </div>

                    <div class="group">
                        <label for="username" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2 group-focus-within:text-emerald-600 transition-colors">Username</label>
                        <div class="relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 group-focus-within:text-emerald-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                            </div>
                            <input type="text" name="username" id="username" value="<?= $user['username'] ?>" required class="block w-full pl-10 pr-3 py-3 border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm transition-all placeholder-gray-300">
                        </div>
                    </div>
                </div>

                <div class="bg-yellow-50/50 rounded-xl p-6 md:p-8 border border-yellow-100 relative overflow-hidden mb-10">
                    <div class="absolute -top-6 -right-6 text-yellow-100 opacity-50">
                        <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
                    </div>

                    <div class="relative z-10">
                        <h4 class="text-base font-bold text-yellow-800 mb-6 flex items-center gap-2">
                            <span class="bg-yellow-100 p-1.5 rounded-lg text-yellow-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </span>
                            Ganti Password (Opsional)
                        </h4>
                        
                        <div class="space-y-6">
                             <div>
                                <label class="block text-xs font-bold text-yellow-700 uppercase tracking-wide mb-2">Password Lama</label>
                                <input type="password" name="password_old" class="block w-full border-yellow-200 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 bg-white py-2.5 px-4 text-sm placeholder-yellow-300 transition-all" placeholder="Masukkan password lama untuk verifikasi">
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-xs font-bold text-yellow-700 uppercase tracking-wide mb-2">Password Baru</label>
                                    <input type="password" name="password" class="block w-full border-yellow-200 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 bg-white py-2.5 px-4 text-sm placeholder-yellow-300 transition-all">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-yellow-700 uppercase tracking-wide mb-2">Konfirmasi Password</label>
                                    <input type="password" name="password_confirm" class="block w-full border-yellow-200 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 bg-white py-2.5 px-4 text-sm placeholder-yellow-300 transition-all">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end pt-6 border-t border-gray-100">
                    <button type="button" onclick="showModal()" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-sm font-bold rounded-lg text-white bg-gray-900 hover:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 shadow-lg hover:shadow-xl transition-all duration-200 transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="confirmModal" class="relative z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-900/75 backdrop-blur-sm transition-opacity opacity-0 pointer-events-none" id="modalBackdrop"></div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg scale-95 opacity-0 pointer-events-none" id="modalPanel">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-full bg-emerald-50 sm:mx-0 sm:h-12 sm:w-12 ring-8 ring-emerald-50/50">
                            <svg class="h-6 w-6 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:ml-5 sm:mt-0 sm:text-left">
                            <h3 class="text-xl font-bold leading-6 text-gray-900" id="modal-title">Simpan Perubahan?</h3>
                            <div class="mt-3">
                                <p class="text-sm text-gray-500 leading-relaxed">
                                    Pastikan data yang Anda masukkan sudah benar sebelum menyimpan. Perubahan pada profil akan langsung diterapkan pada sistem.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-4 sm:flex sm:flex-row-reverse sm:px-6 gap-3 border-t border-gray-100">
                    <button type="button" onclick="submitForm()" class="inline-flex w-full justify-center rounded-lg bg-emerald-600 px-5 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition-all sm:w-auto">Ya, Simpan</button>
                    <button type="button" onclick="hideModal()" class="mt-3 inline-flex w-full justify-center rounded-lg bg-white px-5 py-2.5 text-sm font-semibold text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto transition-all">Batal</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const modal = document.getElementById('confirmModal');
    const backdrop = document.getElementById('modalBackdrop');
    const panel = document.getElementById('modalPanel');

    function showModal() {
        modal.classList.remove('hidden');
        // Small delay to allow display block to apply before opacity transition
        setTimeout(() => {
            backdrop.classList.remove('opacity-0', 'pointer-events-none');
            panel.classList.remove('scale-95', 'opacity-0', 'pointer-events-none');
            panel.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function hideModal() {
        backdrop.classList.add('opacity-0', 'pointer-events-none');
        panel.classList.remove('scale-100', 'opacity-100');
        panel.classList.add('scale-95', 'opacity-0', 'pointer-events-none');
        
        // Wait for transition to finish before hiding
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    function submitForm() {
        document.getElementById('formProfile').submit();
    }
</script>

<style>
    /* Optional simple fade-in animation for alerts */
    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-down {
        animation: fadeInDown 0.3s ease-out forwards;
    }
</style>

<?= $this->endSection() ?>