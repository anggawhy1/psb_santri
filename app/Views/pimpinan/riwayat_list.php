<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="bg-white rounded-xl shadow-sm p-6">

    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">

        <div>
            <h2 class="text-xl font-bold text-gray-800">Riwayat Pendaftar</h2>
            <p class="text-sm text-gray-500">Data santri yang telah selesai proses seleksi.</p>
            <p class="text-sm text-gray-500">Total data: <?= $pager->getTotal('pendaftar') ?></p>
        </div>

        <div class="relative z-20 w-full md:w-auto">

            <form action="" method="GET" class="w-full md:w-auto flex items-center gap-2">

                <input type="hidden" name="sort" value="<?= $sort ?? 'newest' ?>">

                <div class="relative flex-grow">
                    <input type="text" name="keyword" value="<?= $keyword ?>" placeholder="Cari Nama / No.Reg..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-emerald-500 focus:border-emerald-500 w-full md:w-64">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>

                <button type="button" onclick="toggleFilter()" class=" text-gray-700 px-4 py-2 rounded-lg text-sm font-bold hover:bg-gray-200 border border-gray-300 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                    </svg>
                    Filter
                </button>
            </form>
            <div id="filterMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl border border-gray-100 overflow-hidden transform origin-top-right transition-all">
                <div class="px-4 py-2 bg-gray-50 text-[10px] font-bold text-gray-400 uppercase tracking-wider">Urutkan Berdasarkan</div>

                <a href="?keyword=<?= $keyword ?>&sort=newest" class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-700 flex justify-between items-center group">
                    <span>Terbaru</span>
                    <?php if (($sort ?? 'newest') == 'newest'): ?>
                        <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    <?php endif; ?>
                </a>

                <a href="?keyword=<?= $keyword ?>&sort=oldest" class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-700 flex justify-between items-center group">
                    <span>Terlama</span>
                    <?php if (($sort ?? '') == 'oldest'): ?>
                        <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    <?php endif; ?>
                </a>
            </div>

        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 border-b">
                <tr>
                    <th class="px-4 py-3 w-12 text-center">No</th>
                    <th class="px-4 py-3">No. Reg</th>
                    <th class="px-4 py-3">Nama Lengkap</th>
                    <th class="px-4 py-3">Status Akhir</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($data)): ?>
                    <tr>
                        <td colspan="5" class="text-center py-8 text-gray-400">Data tidak ditemukan.</td>
                    </tr>
                <?php else: ?>
                    <?php
                    $page = $pager->getCurrentPage('pendaftar');
                    $perPage = $pager->getPerPage('pendaftar');
                    ?>
                    <?php foreach ($data as $index => $row): ?>
                        <tr class="bg-white border-b hover:bg-gray-50 transition">

                            <td class="px-4 py-4 text-center font-bold text-gray-500">
                                <?= ($page - 1) * $perPage + ($index + 1) ?>
                            </td>

                            <td class="px-4 py-4 font-mono font-bold text-emerald-600"><?= $row['no_registrasi'] ?></td>

                            <td class="px-4 py-4">
                                <div class="font-bold text-gray-900"><?= $row['nama_lengkap'] ?></div>
                                <div class="text-xs text-gray-500"><?= $row['email'] ?></div>
                            </td>

                            <td class="px-4 py-4">
                                <?php if ($row['status_akhir'] == 'Lulus'): ?>
                                    <span class="bg-green-100 text-green-800 text-xs font-bold px-3 py-1 rounded-full">LULUS</span>
                                <?php else: ?>
                                    <span class="bg-red-100 text-red-800 text-xs font-bold px-3 py-1 rounded-full">TIDAK LULUS</span>
                                <?php endif; ?>
                            </td>

                            <td class="px-4 py-4 text-center">
                                <a href="<?= base_url('admin/detailRiwayat/' . $row['id_pendaftar']) ?>" class="text-emerald-600 hover:text-emerald-800 text-xs font-bold border border-emerald-200 px-3 py-1.5 rounded hover:bg-emerald-50 transition flex items-center justify-center gap-1 mx-auto w-28">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    Lihat Detail
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-6 flex flex-col md:flex-row justify-between items-center gap-4 border-t pt-4">
        <div class="text-xs text-gray-500">
            Halaman <span class="font-bold"><?= $pager->getCurrentPage('pendaftar') ?></span> dari <span class="font-bold"><?= $pager->getPageCount('pendaftar') ?></span>
        </div>
        <div>
            <?= $pager->links('pendaftar', 'tailwind_full') ?>
        </div>
    </div>
</div>

<script>
    function toggleFilter() {
        const menu = document.getElementById('filterMenu');
        if (menu.classList.contains('hidden')) {
            menu.classList.remove('hidden');
            setTimeout(() => {
                menu.classList.add('opacity-100', 'scale-100');
                menu.classList.remove('opacity-0', 'scale-95');
            }, 10);
        } else {
            menu.classList.add('hidden');
        }
    }

    // Tutup menu kalau klik di luar area
    window.addEventListener('click', function(e) {
        const btn = document.querySelector('button[onclick="toggleFilter()"]');
        const menu = document.getElementById('filterMenu');
        if (btn && menu && !btn.contains(e.target) && !menu.contains(e.target)) {
            menu.classList.add('hidden');
        }
    });
</script>

<?= $this->endSection() ?>