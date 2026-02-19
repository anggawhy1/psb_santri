<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="max-w-2xl mx-auto">
    
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Tambah Admin Baru</h2>
        <a href="<?= base_url('pimpinan/kelolaAdmin') ?>" class="text-gray-500 hover:text-emerald-600 font-semibold text-sm flex items-center gap-2 transition bg-white border border-gray-200 px-4 py-2 rounded-lg hover:border-emerald-200 hover:shadow-sm">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
    </svg>
    Kembali
</a>
    </div>

    

    <?php if(session()->getFlashdata('error')): ?>
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6 text-sm flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        
        <div class="h-1.5 bg-emerald-500"></div>

        <div class="p-8">
            <form action="<?= base_url('pimpinan/saveAdmin') ?>" method="POST" autocomplete="off">
                <?= csrf_field() ?>

                <div class="mb-6">
                    <label class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-2">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" value="<?= old('nama_lengkap') ?>" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition placeholder-gray-400 text-sm font-medium bg-gray-50/50" placeholder="Contoh: Admin Pendaftaran 1">
                </div>

                <div class="mb-6">
                    <label class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-2">Username Login</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </span>
                        <input type="text" name="username" value="<?= old('username') ?>" required class="pl-11 w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition placeholder-gray-400 text-sm font-medium bg-gray-50/50" placeholder="admin_psb">
                    </div>
                    <p class="text-[10px] text-gray-400 font-bold mt-2 ml-1 italic">*Digunakan untuk akses masuk ke sistem.</p>
                </div>

                <div class="mb-8">
                    <label class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-2">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </span>
                        <input type="password" name="password" required minlength="6" class="pl-11 w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition placeholder-gray-400 text-sm font-medium bg-gray-50/50" placeholder="******">
                    </div>
                    <p class="text-[10px] text-gray-400 font-bold mt-2 ml-1 italic">*Minimal 6 karakter keamanan.</p>
                </div>

                <div class="flex items-center justify-end gap-3 border-t border-gray-50 pt-6">
                    <a href="<?= base_url('pimpinan/kelolaAdmin') ?>" class="px-6 py-3 rounded-xl text-sm font-bold text-gray-500 hover:text-gray-800 hover:bg-gray-100 transition-all">
                        Batalkan
                    </a>
                    <button type="submit" class="bg-emerald-600 text-white px-8 py-3 rounded-xl font-black text-xs uppercase tracking-widest hover:bg-emerald-700 transition shadow-lg shadow-emerald-100 flex items-center gap-2 transform active:scale-95">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                        Simpan Akun Admin
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>