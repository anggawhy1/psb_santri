<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="max-w-4xl mx-auto">
    
    <div class="flex items-center justify-between mb-8 pb-4 border-b border-gray-200">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Edit Informasi Pendaftaran</h2>
            <p class="text-sm text-gray-500 mt-1">Perbarui data statis untuk halaman depan.</p>
        </div>
        <a href="<?= base_url('admin/informasi') ?>" class="text-gray-500 hover:text-emerald-600 font-semibold text-sm flex items-center gap-2 transition bg-white border border-gray-200 px-4 py-2 rounded-lg hover:border-emerald-200 hover:shadow-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        
        <div class="h-1 bg-gradient-to-r from-emerald-500 to-teal-400"></div>

        <div class="p-8">
            <form action="<?= base_url('admin/updateInformasi') ?>" method="POST">
                <?= csrf_field() ?>
                <input type="hidden" name="id_informasi" value="<?= $row['id_informasi'] ?>">

                <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 mb-8 rounded-r-lg">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-emerald-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-emerald-700">
                                Anda sedang mengedit bagian: <span class="font-bold"><?= esc($row['judul']) ?></span>.
                                Perubahan akan langsung tampil di website utama.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mb-8">
                    <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Judul Informasi</label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path></svg>
                        </div>
                        <input type="text" name="judul" value="<?= esc($row['judul']) ?>" readonly class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 bg-gray-200 cursor-not-allowed font-bold text-gray-500 transition shadow-inner select-none focus:outline-none">
                    </div>
                    <p class="text-xs text-gray-400 mt-2 flex items-center gap-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Judul ini akan menjadi header section di halaman depan.
                    </p>
                </div>

                <div class="mb-8">
                    <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Isi Konten Lengkap</label>
                    <div class="relative">
                        <textarea name="isi" rows="12" required class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition leading-relaxed text-gray-700 shadow-sm" placeholder="Tuliskan detail informasi di sini..."><?= esc($row['isi']) ?></textarea>
                        <div class="absolute top-3 right-3 text-gray-300 pointer-events-none">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-4 border-t border-gray-100 pt-8">
                    <a href="<?= base_url('admin/informasi') ?>" class="px-6 py-3 rounded-lg text-sm font-bold text-gray-600 hover:text-gray-800 hover:bg-gray-100 transition">
                        Batal
                    </a>
                    <button type="submit" class="bg-emerald-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-emerald-700 transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Simpan Perubahan
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>