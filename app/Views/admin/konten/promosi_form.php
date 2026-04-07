<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="max-w-4xl mx-auto">
    
    <div class="flex items-center justify-between mb-8 pb-4 border-b border-gray-200">
        <div>
            <h2 class="text-2xl font-bold text-gray-800"><?= $mode == 'edit' ? 'Edit Data' : 'Tambah Data Baru' ?></h2>
            <p class="text-sm text-gray-500 mt-1">Kelola konten <?= ucfirst($type) ?> website Anda.</p>
        </div>
        <a href="<?= base_url('admin/' . $type) ?>" class="text-gray-500 hover:text-emerald-600 font-semibold text-sm flex items-center gap-2 transition bg-white border border-gray-200 px-4 py-2 rounded-lg hover:border-emerald-200 hover:shadow-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        
        <div class="h-1 bg-gradient-to-r from-emerald-500 to-teal-400"></div>

        <div class="p-8">
            <form action="<?= $mode == 'add' ? base_url('admin/savePromosi') : base_url('admin/updatePromosi') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" name="type" value="<?= $type ?>">
                
                <?php if($mode == 'edit'): ?>
                    <input type="hidden" name="id_promosi" value="<?= $row['id_promosi'] ?>">
                <?php endif; ?>

                <div class="mb-8">
                    <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Judul <?= ucfirst($type) ?> <span class="text-red-500">*</span></label>
                    <input type="text" name="judul" value="<?= $mode=='edit' ? esc($row['judul']) : '' ?>" required class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition placeholder-gray-400 font-medium" placeholder="Contoh: <?= $type == 'prestasi' ? 'Juara 1 Lomba Tahfidz' : 'Kegiatan Santri Menyambut Ramadhan...' ?>">
                </div>

                <?php if ($type !== 'galeri'): ?>
                <div class="mb-8">
                    <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">
                        Deskripsi / Konten 
                        <?php if ($type === 'prestasi'): ?>
                            <span class="text-gray-400 font-normal normal-case text-xs ml-1">(Opsional)</span>
                        <?php else: ?>
                            <span class="text-red-500">*</span>
                        <?php endif; ?>
                    </label>
                    <div class="relative">
                        <textarea name="deskripsi" 
                            rows="<?= $type === 'prestasi' ? '3' : '8' ?>" 
                            <?= $type !== 'prestasi' ? 'required' : '' ?> 
                            <?= $type === 'prestasi' ? 'maxlength="50"' : '' ?>
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition placeholder-gray-400 text-sm leading-relaxed" 
                            placeholder="<?= $type === 'prestasi' ? 'Tulis keterangan singkat (Maksimal 50 karakter)...' : 'Tuliskan detail lengkap mengenai konten ini...' ?>"><?= $mode=='edit' ? esc($row['deskripsi']) : '' ?></textarea>
                        
                        <div class="absolute top-3 right-3 text-gray-400 pointer-events-none">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                        </div>

                        <?php if ($type === 'prestasi'): ?>
                            <p class="text-[10px] text-gray-400 mt-1 absolute right-0 -bottom-5">Maksimal 50 karakter</p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php else: ?>
                    <input type="hidden" name="deskripsi" value="">
                <?php endif; ?>

                <div class="mb-10">
                    <label class="block text-sm font-bold text-gray-700 mb-4 uppercase tracking-wide">Gambar Utama <?= $mode=='add' ? '<span class="text-red-500">*</span>' : '' ?></label>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
                        
                        <div class="w-full">
                            <label for="dropzone-file" class="group flex flex-col items-center justify-center w-full h-56 border-2 border-gray-300 border-dashed rounded-xl cursor-pointer bg-gray-50 hover:bg-emerald-50 hover:border-emerald-400 transition relative overflow-hidden">
                                
                                <div class="flex flex-col items-center justify-center pt-5 pb-6 z-10 transition group-hover:scale-105">
                                    <div class="bg-white p-3 rounded-full shadow-sm mb-3 group-hover:shadow-md transition">
                                        <svg class="w-8 h-8 text-gray-400 group-hover:text-emerald-500 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                    <p class="mb-1 text-sm text-gray-600 font-medium group-hover:text-emerald-700">
                                        <?= $mode=='edit' ? 'Klik untuk Ganti Gambar' : 'Klik untuk Upload' ?>
                                    </p>
                                    <p class="text-xs text-gray-400">PNG, JPG (Max. 2MB)</p>
                                </div>

                                <img id="img-preview" class="absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-300 pointer-events-none">
                                
                                <input id="dropzone-file" name="gambar" type="file" class="hidden" accept="image/*" <?= $mode=='add' ? 'required' : '' ?> onchange="previewImage(this)" />
                            </label>
                        </div>

                        <?php if($mode == 'edit' && !empty($row['path_gambar'])): ?>
                            <div class="bg-gray-50 p-4 rounded-xl border border-gray-200 text-center">
                                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2 block">Gambar Saat Ini</span>
                                <div class="relative group cursor-pointer" onclick="window.open(this.querySelector('img').src)">
                                    <img src="<?= base_url('uploads/konten/' . $row['path_gambar']) ?>" class="h-40 w-auto mx-auto object-cover rounded-lg shadow-sm border border-gray-200 transition group-hover:opacity-90">
                                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                                        <div class="bg-black/50 text-white text-xs px-2 py-1 rounded">Lihat Asli</div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-4 border-t border-gray-100 pt-8">
                    <a href="<?= base_url('admin/' . $type) ?>" class="px-6 py-3 rounded-lg text-sm font-bold text-gray-600 hover:text-gray-800 hover:bg-gray-100 transition">
                        Batal
                    </a>
                    <button type="submit" class="bg-gray-900 text-white px-8 py-3 rounded-lg font-bold hover:bg-black transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <?= $mode=='edit' ? 'Simpan Perubahan' : 'Simpan Data' ?>
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    function previewImage(input) {
        const preview = document.getElementById('img-preview');
        const container = input.closest('label'); 
        const placeholder = container.querySelector('div.flex-col'); 

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('opacity-0'); 
                placeholder.classList.add('opacity-0'); 
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<?= $this->endSection() ?>