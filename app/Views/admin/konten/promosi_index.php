<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="max-w-6xl mx-auto">
    
    <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            
            <div>
                <h2 class="text-xl font-bold text-gray-800">Kelola Data <?= ucfirst($type) ?></h2>
                <p class="text-sm text-gray-500">Menampilkan data per 10 item.</p>
            </div>
            
            <div class="flex items-center gap-3 w-full md:w-auto relative">
                
                <div class="relative">
                    <button onclick="toggleSortMenu()" class="flex items-center gap-2 bg-white text-gray-700 border border-gray-300 px-4 py-2.5 rounded-lg text-sm font-bold hover:bg-gray-50 transition focus:outline-none shadow-sm">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                        Filter
                        <svg class="w-3 h-3 ml-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>

                    <div id="sortMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl border border-gray-100 z-10 overflow-hidden transform origin-top-right transition-all">
                        <div class="px-4 py-2 bg-gray-50 text-[10px] font-bold text-gray-400 uppercase tracking-wider">Urutkan Berdasarkan</div>
                        
                        <a href="?sort=newest" class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-700 flex justify-between items-center group">
                            <span>Terbaru (Default)</span>
                            <?php if($sort == 'newest'): ?>
                                <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <?php endif; ?>
                        </a>
                        
                        <a href="?sort=oldest" class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-700 flex justify-between items-center group">
                            <span>Terlama</span>
                            <?php if($sort == 'oldest'): ?>
                                <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <?php endif; ?>
                        </a>
                    </div>
                </div>

                <a href="<?= base_url('admin/' . $type . '/tambah') ?>" class="flex items-center gap-2 bg-emerald-600 hover:bg-black text-white font-bold py-2.5 px-5 rounded-lg transition shadow-md text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Tambah
                </a>
            </div>
        </div>
    </div>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-lg mb-6 flex items-center gap-2 text-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden flex flex-col min-h-[400px]">
        <div class="overflow-x-auto flex-grow">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 border-b">
                    <tr>
                        <th class="px-6 py-4 w-16 text-center border-r font-bold">No</th>
                        
                        <th class="px-6 py-4 w-32 border-r">Gambar</th>
                        <th class="px-6 py-4 border-r">Judul & Konten</th>
                        <th class="px-6 py-4 text-center w-48">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($data)): ?>
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-gray-400">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="bg-gray-50 p-4 rounded-full mb-3">
                                        <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                    <p class="font-medium text-gray-500">Belum ada data <?= $type ?>.</p>
                                    <p class="text-xs mt-1 text-gray-400">Klik tombol Tambah untuk memulai.</p>
                                </div>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php 
                            // Hitung Nomor Urut Pagination
                            // Rumus: (Halaman Saat Ini - 1) * Jumlah Per Halaman + Index Loop + 1
                            $page = $pager->getCurrentPage('promosi');
                            $perPage = 10; // Sesuai controller
                            $startNo = ($page - 1) * $perPage;
                        ?>
                        <?php foreach($data as $index => $item): ?>
                        <tr class="bg-white border-b hover:bg-gray-50 transition group">
                            
                            <td class="px-6 py-4 text-center border-r font-medium text-gray-500">
                                <?= $startNo + $index + 1 ?>
                            </td>

                            <td class="px-6 py-4 border-r align-top">
                                <?php if($item['path_gambar']): ?>
                                    <div class="relative w-24 h-16 group-hover:scale-105 transition duration-300">
                                        <img src="<?= base_url('uploads/konten/' . $item['path_gambar']) ?>" class="w-full h-full object-cover rounded-lg border shadow-sm cursor-pointer" onclick="window.open(this.src)">
                                    </div>
                                <?php else: ?>
                                    <div class="w-24 h-16 bg-gray-100 rounded-lg border flex items-center justify-center text-[10px] text-gray-400 font-medium">No Image</div>
                                <?php endif; ?>
                            </td>
                            
                            <td class="px-6 py-4 border-r align-top">
                                <div class="flex flex-col h-full justify-between">
                                    <div>
                                        <h4 class="font-bold text-gray-900 text-base mb-1 line-clamp-1 group-hover:text-emerald-600 transition"><?= esc($item['judul']) ?></h4>
                                        <p class="text-gray-600 text-sm line-clamp-2 leading-relaxed"><?= esc($item['deskripsi']) ?></p>
                                    </div>
                                    <div class="mt-3 flex items-center gap-2 text-xs text-gray-400">
                                        <span class="bg-gray-100 text-gray-500 px-2 py-0.5 rounded flex items-center gap-1">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            <?= date('d M Y', strtotime($item['created_at'])) ?>
                                        </span>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 text-center align-middle">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="<?= base_url('admin/editPromosi/' . $item['id_promosi']) ?>" class="p-2 text-blue-600 bg-blue-50 rounded-lg hover:bg-blue-100 transition border border-blue-200" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                    <a href="<?= base_url('admin/deletePromosi/' . $item['id_promosi']) ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="p-2 text-red-600 bg-red-50 rounded-lg hover:bg-red-100 transition border border-red-200" title="Hapus">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-gray-200 bg-gray-50 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="text-xs text-gray-500">
                Menampilkan halaman <span class="font-bold text-gray-700"><?= $pager->getCurrentPage('promosi') ?></span> dari <span class="font-bold text-gray-700"><?= $pager->getPageCount('promosi') ?></span>
            </div>
            
            <div class="flex justify-center">
                <?= $pager->links('promosi', 'tailwind_full') ?>
            </div>
        </div>
        
    </div>
</div>

<script>
    function toggleSortMenu() {
        const menu = document.getElementById('sortMenu');
        if (menu.classList.contains('hidden')) {
            menu.classList.remove('hidden');
            menu.classList.add('opacity-100', 'scale-100');
            menu.classList.remove('opacity-0', 'scale-95');
        } else {
            menu.classList.add('hidden');
        }
    }

    window.addEventListener('click', function(e) {
        const btn = document.querySelector('button[onclick="toggleSortMenu()"]');
        const menu = document.getElementById('sortMenu');
        if (btn && menu && !btn.contains(e.target) && !menu.contains(e.target)) {
            menu.classList.add('hidden');
        }
    });
</script>

<?= $this->endSection() ?>