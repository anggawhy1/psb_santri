<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<?php
// Helper untuk mendeteksi filter yang aktif
$current_wawancara = $status_wawancara ?? '';
$isFilterActive = !empty($current_wawancara);
?>

<div class="max-w-7xl mx-auto space-y-6">

    <div class="bg-white rounded-xl shadow-sm p-6">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <div>
                <h2 class="text-xl font-bold text-gray-800">Monitoring Data Pendaftar</h2>
                <p class="text-sm text-gray-500">Daftar calon santri yang sedang dalam proses seleksi.</p>
                <?php if (isset($pager)): ?>
                    <p class="text-sm text-gray-500 mt-1">Total data: <span class="font-bold"><?= $pager->getTotal('pendaftar') ?></span></p>
                <?php endif; ?>
            </div>

            <div class="relative z-20 w-full md:w-auto">
                <form action="" method="GET" class="w-full md:w-auto flex items-center gap-2">

                    <input type="hidden" name="status_wawancara" value="<?= esc($current_wawancara) ?>">

                    <div class="relative flex-grow">
                        <input type="text" name="keyword" value="<?= esc($keyword ?? '') ?>" placeholder="Cari Nama / No.Reg..." class="pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-emerald-500 focus:border-emerald-500 w-full md:w-64 transition-shadow shadow-sm">
                        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>

                    <button type="button" onclick="toggleFilter()" class="relative text-gray-700 px-4 py-2.5 rounded-lg text-sm font-bold border border-gray-300 flex items-center gap-2 transition-colors shadow-sm <?= $isFilterActive ? 'bg-emerald-50 border-emerald-300 text-emerald-700 hover:bg-emerald-100' : 'hover:bg-gray-100 bg-white' ?>">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                        </svg>
                        Filter

                        <?php if ($isFilterActive): ?>
                            <span class="absolute -top-1.5 -right-1.5 flex h-3.5 w-3.5">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3.5 w-3.5 bg-emerald-500 border-2 border-white"></span>
                            </span>
                        <?php endif; ?>
                    </button>
                </form>

                <div id="filterMenu" class="hidden absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-xl border border-gray-100 overflow-hidden transform origin-top-right transition-all pb-1">
                    <div class="px-4 py-2.5 bg-gray-50 text-[10px] font-bold text-gray-400 uppercase tracking-wider border-b border-gray-100">Status Wawancara</div>

                    <a href="?keyword=<?= urlencode($keyword ?? '') ?>&status_wawancara=" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-700 flex justify-between items-center group transition-colors">
                        <span>Semua Data</span>
                        <?php if (empty($current_wawancara)): ?>
                            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        <?php endif; ?>
                    </a>

                    <a href="?keyword=<?= urlencode($keyword ?? '') ?>&status_wawancara=Dijadwalkan" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-700 flex justify-between items-center group transition-colors">
                        <span>Wawancara Dijadwalkan</span>
                        <?php if ($current_wawancara == 'Dijadwalkan'): ?>
                            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        <?php endif; ?>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden flex flex-col min-h-[400px]">
        <div class="overflow-x-auto flex-grow">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 border-b">
                    <tr>
                        <th class="px-6 py-4 w-12 text-center border-r">No</th>
                        <th class="px-6 py-4 text-left border-r">No. Registrasi</th>
                        <th class="px-6 py-4 text-left border-r">Nama Lengkap</th>
                        <th class="px-6 py-4 text-center border-r">Program Pilihan</th>
                        <th class="px-6 py-4 text-center border-r">Jadwal Wawancara</th>
                        <th class="px-6 py-4 text-center border-r">Status Saat Ini</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($data)): ?>
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-gray-400 italic font-medium">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="bg-gray-50 p-4 rounded-full mb-3 border border-gray-100">
                                        <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                    </div>
                                    <p>Tidak ada pendaftar aktif sesuai kriteria.</p>
                                </div>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php
                        // Kalkulasi nomor urut agar tidak reset di page 2
                        $page = isset($pager) ? $pager->getCurrentPage('pendaftar') : 1;
                        $perPage = isset($pager) ? $pager->getPerPage('pendaftar') : 10;
                        $nomor = ($page - 1) * $perPage + 1;
                        ?>
                        <?php foreach ($data as $row): ?>
                            <tr class="bg-white border-b hover:bg-gray-50 transition">

                                <td class="px-6 py-4 text-center font-bold text-gray-500 border-r">
                                    <?= $nomor++ ?>
                                </td>

                                <td class="px-6 py-4 text-left font-mono font-bold text-emerald-600 border-r">
                                    <?= esc($row['no_registrasi']) ?>
                                </td>

                                <td class="px-6 py-4 text-left border-r">
                                    <div class="font-bold text-gray-900"><?= esc($row['nama_lengkap']) ?></div>
                                    <?php if (isset($row['email'])): ?>
                                        <div class="text-xs text-gray-500 mt-0.5"><?= esc($row['email']) ?></div>
                                    <?php endif; ?>
                                </td>

                                <td class="px-6 py-4 text-center border-r">
                                    <span class="inline-block bg-emerald-50 text-emerald-700 px-3 py-1 rounded-full text-xs font-bold border border-emerald-200">
                                        <?= esc($row['program_pilihan']) ?>
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-center border-r">
                                    <?php if (!empty($row['tanggal_wawancara'])): ?>
                                        <div class="flex flex-col items-center gap-2">

                                            <div class="inline-flex items-center gap-1.5 bg-blue-50 text-blue-700 px-2.5 py-1 rounded text-xs font-bold border border-blue-100 shadow-sm">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                                <?= date('d/m H:i', strtotime($row['tanggal_wawancara'])) ?>
                                            </div>

                                            <?php if (!empty($row['tautan_video'])): ?>
                                                <?php
                                                $link_wawancara = trim($row['tautan_video']);
                                                if (strpos($link_wawancara, 'http') !== 0) {
                                                    $link_wawancara = 'https://' . $link_wawancara;
                                                }
                                                ?>
                                                <div class="flex items-center gap-1">
                                                    <a href="<?= esc($link_wawancara) ?>" target="_blank" class="inline-flex items-center gap-1 bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded-full text-[10px] font-bold transition shadow-sm">
                                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                                        </svg>
                                                        Join
                                                    </a>

                                                    <button type="button" onclick="copyLink('<?= esc($link_wawancara) ?>', this)" class="inline-flex items-center justify-center bg-gray-100 hover:bg-gray-200 text-gray-600 h-6 px-2 rounded-full transition shadow-sm border border-gray-200" title="Salin Link">
                                                        <svg class="w-3 h-3 icon-copy" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                                        </svg>
                                                        <span class="text-copy hidden text-[9px] font-bold text-emerald-600">Disalin!</span>
                                                    </button>
                                                </div>
                                            <?php else: ?>
                                                <span class="text-[10px] text-gray-400 italic">Link belum disematkan</span>
                                            <?php endif; ?>
                                        </div>
                                    <?php else: ?>
                                        <span class="text-gray-300 text-xs">-</span>
                                    <?php endif; ?>
                                </td>

                                <td class="px-6 py-4 text-center border-r">
                                    <div class="inline-flex items-center gap-1 bg-yellow-50 text-yellow-700 px-3 py-1 rounded-full text-xs font-bold border border-yellow-200">
                                        Seleksi Aktif
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-center">
                                    <a href="<?= base_url('pimpinan/detailSantri/' . $row['id_pendaftar']) ?>" class="inline-flex items-center justify-center gap-1 text-emerald-600 hover:text-emerald-800 text-xs font-bold border border-emerald-200 px-3 py-1.5 rounded hover:bg-emerald-50 transition w-28 mx-auto shadow-sm">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

        <?php if (!empty($data) && isset($pager)): ?>
            <div class="px-6 py-4 border-t border-gray-200 bg-gray-50 flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="text-xs text-gray-500">
                    Menampilkan halaman <span class="font-bold text-gray-700"><?= $pager->getCurrentPage('pendaftar') ?></span> dari <span class="font-bold text-gray-700"><?= $pager->getPageCount('pendaftar') ?></span>
                </div>
                <div class="flex justify-center">
                    <?= $pager->links('pendaftar', 'tailwind_full') ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

</div>

<script>
    // Toggle Menu Filter
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

    // Menutup menu jika user klik di luar dropdown
    window.addEventListener('click', function(e) {
        const btn = document.querySelector('button[onclick="toggleFilter()"]');
        const menu = document.getElementById('filterMenu');
        if (btn && menu && !btn.contains(e.target) && !menu.contains(e.target)) {
            menu.classList.add('hidden');
        }
    });

    // Copy Link Function
    function copyLink(text, btnElement) {
        navigator.clipboard.writeText(text).then(function() {
            const icon = btnElement.querySelector('.icon-copy');
            const copyText = btnElement.querySelector('.text-copy');

            icon.classList.add('hidden');
            copyText.classList.remove('hidden');

            setTimeout(function() {
                icon.classList.remove('hidden');
                copyText.classList.add('hidden');
            }, 2000);
        }).catch(function(err) {
            console.error('Gagal menyalin teks: ', err);
            alert('Browser tidak mendukung auto-copy. Silakan salin manual.');
        });
    }
</script>

<?= $this->endSection() ?>