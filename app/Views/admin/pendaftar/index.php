<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="space-y-6">

    <div class="bg-white rounded-xl shadow-sm p-6">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <div>
                <h3 class="font-bold text-lg text-gray-800">Data Pendaftar Masuk</h3>
                <p class="text-sm text-gray-500">Menampilkan data per 10 item.</p>
            </div>

            <form action="" method="GET" class="w-full md:w-auto flex items-center gap-2">
                <div class="relative flex-grow">
                    <input type="text" name="keyword" value="<?= $keyword ?>" placeholder="Cari Nama / No.Reg..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-emerald-500 focus:border-emerald-500 w-full md:w-64">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>

                <?php
                // Cek apakah ada filter yang sedang aktif (selain keyword)
                $isFilterActive = !empty($f_bayar) || !empty($f_berkas) || !empty($f_jadwal);
                ?>
                <button type="button" onclick="toggleFilter()" class="relative text-gray-700 px-4 py-2 rounded-lg text-sm font-bold hover:bg-gray-200 border border-gray-300 flex items-center gap-2 <?= $isFilterActive ? 'bg-emerald-50 border-emerald-300 text-emerald-700 hover:bg-emerald-100' : '' ?>">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                    </svg>
                    Filter

                    <?php if ($isFilterActive): ?>
                        <span class="absolute -top-1 -right-1 flex h-3 w-3">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
                        </span>
                    <?php endif; ?>
                </button>
            </form>
        </div>

        <div id="filterPanel" class="hidden mt-4 pt-4 border-t grid grid-cols-1 md:grid-cols-4 gap-4 bg-gray-50 p-4 rounded-lg transition-all">
            <form action="" method="GET" class="contents">
                <input type="hidden" name="keyword" value="<?= $keyword ?>">

                <div>
                    <label class="block text-xs font-bold text-gray-500 mb-1">Status Pembayaran</label>
                    <select name="status_pembayaran" class="w-full border-gray-300 rounded text-sm focus:ring-emerald-500 focus:border-emerald-500">
                        <option value="">Semua</option>
                        <option value="Menunggu" <?= $f_bayar == 'Menunggu' ? 'selected' : '' ?>>Menunggu</option>
                        <option value="Diterima" <?= $f_bayar == 'Diterima' ? 'selected' : '' ?>>Lunas</option>
                        <option value="Ditolak" <?= $f_bayar == 'Ditolak' ? 'selected' : '' ?>>Ditolak</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-500 mb-1">Status Berkas</label>
                    <select name="status_berkas" class="w-full border-gray-300 rounded text-sm focus:ring-emerald-500 focus:border-emerald-500">
                        <option value="">Semua</option>
                        <option value="Menunggu" <?= $f_berkas == 'Menunggu' ? 'selected' : '' ?>>Menunggu</option>
                        <option value="Diterima" <?= $f_berkas == 'Diterima' ? 'selected' : '' ?>>Diterima</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-500 mb-1">Jadwal Wawancara</label>
                    <select name="status_wawancara" class="w-full border-gray-300 rounded text-sm focus:ring-emerald-500 focus:border-emerald-500">
                        <option value="">Semua</option>
                        <option value="Belum" <?= $f_jadwal == 'Belum' ? 'selected' : '' ?>>Belum Ada</option>
                        <option value="Dijadwalkan" <?= $f_jadwal == 'Dijadwalkan' ? 'selected' : '' ?>>Dijadwalkan</option>
                    </select>
                </div>
                <div class="flex items-end">
                    <button type="submit" class="w-full bg-emerald-600 text-white py-2 px-4 rounded text-sm font-bold hover:bg-emerald-700 transition shadow-sm">
                        Terapkan Filter
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden flex flex-col min-h-[400px]">
        <div class="overflow-x-auto flex-grow">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 border-b">
                    <tr>
                        <th class="px-6 py-4 border-r w-16 text-center">No</th>
                        <th class="px-6 py-4 border-r">Nama / No.Reg</th>
                        <th class="px-6 py-4 border-r text-center">Data Formulir</th>
                        <th class="px-6 py-4 border-r text-center">Status Bayar</th>
                        <th class="px-6 py-4 border-r text-center">Status Berkas</th>
                        <th class="px-6 py-4 border-r text-center">Wawancara</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($data)): ?>
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-gray-400">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="bg-gray-50 p-4 rounded-full mb-3">
                                        <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </div>
                                    <p class="font-medium text-gray-500">Data tidak ditemukan.</p>
                                </div>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php
                        $page = $pager->getCurrentPage('pendaftar');
                        $perPage = 10;
                        $nomor = ($page - 1) * $perPage + 1;
                        ?>
                        <?php foreach ($data as $row): ?>
                            <tr class="bg-white border-b hover:bg-gray-50 transition">

                                <td class="px-6 py-4 border-r text-center font-bold text-gray-500">
                                    <?= $nomor++ ?>
                                </td>

                                <td class="px-6 py-4 border-r">
                                    <a href="<?= base_url('admin/viewFormulir/' . $row['id_pendaftar'] . '?mode=view') ?>" class="group block" title="Lihat Detail Pendaftar">
                                        <div class="font-bold text-emerald-800 group-hover:text-emerald-950 group-hover:underline transition"><?= esc($row['nama_lengkap']) ?></div>
                                    </a>
                                    <div class="text-xs font-mono font-bold text-emerald-600 mt-1">
                                        <?= esc($row['no_registrasi']) ?>
                                    </div>
                                </td>

                                <td class="px-6 py-4 border-r text-center">
                                    <a href="<?= base_url('admin/viewFormulir/' . $row['id_pendaftar'] . '?mode=edit') ?>"
                                        class="inline-block bg-emerald-100 text-emerald-800 text-xs font-bold px-2 py-1 rounded-full border border-emerald-200 hover:bg-emerald-200 hover:text-emerald-900 transition shadow-sm"
                                        title="Edit Data Formulir">
                                        Edit
                                    </a>
                                </td>

                                <td class="px-6 py-4 border-r text-center">
                                    <?php if ($row['status_pembayaran'] != null): ?>
                                        <a href="<?= base_url('admin/viewPembayaran/' . $row['id_pendaftar']) ?>" class="hover:opacity-80 transition inline-block">
                                            <?php if ($row['status_pembayaran'] == 'Diterima'): ?>
                                                <span class="inline-flex items-center gap-1 bg-green-100 text-green-700 text-xs font-bold px-2 py-1 rounded-full border border-green-200">Lunas</span>
                                            <?php elseif ($row['status_pembayaran'] == 'Menunggu'): ?>
                                                <span class="inline-flex items-center gap-1 bg-yellow-100 text-yellow-700 text-xs font-bold px-2 py-1 rounded-full border border-yellow-200 animate-pulse"> Detail</span>
                                            <?php elseif ($row['status_pembayaran'] == 'Ditolak'): ?>
                                                <span class="inline-flex items-center gap-1 bg-red-100 text-red-700 text-xs font-bold px-2 py-1 rounded-full border border-red-200">✖ Ditolak</span>
                                            <?php endif; ?>
                                        </a>
                                    <?php else: ?>
                                        <span class="text-gray-400 text-[10px] italic">Belum Upload</span>
                                    <?php endif; ?>
                                </td>

                                <td class="px-6 py-4 border-r text-center">
                                    <?php if ($row['status_berkas'] != null): ?>
                                        <a href="<?= base_url('admin/viewBerkas/' . $row['id_pendaftar']) ?>" class="hover:opacity-80 transition inline-block">
                                            <?php if ($row['status_berkas'] == 'Diterima'): ?>
                                                <span class="inline-flex items-center gap-1 bg-green-100 text-green-700 text-xs font-bold px-2 py-1 rounded-full border border-green-200">Valid</span>
                                            <?php elseif ($row['status_berkas'] == 'Menunggu'): ?>
                                                <span class="inline-flex items-center gap-1 bg-purple-100 text-purple-700 text-xs font-bold px-2 py-1 rounded-full border border-purple-200"> Detail</span>
                                            <?php elseif ($row['status_berkas'] == 'Ditolak'): ?>
                                                <span class="text-red-500 font-bold text-xs underline">Ditolak</span>
                                            <?php endif; ?>
                                        </a>
                                    <?php else: ?>
                                        <span class="text-gray-400 text-[10px] italic">Belum Upload</span>
                                    <?php endif; ?>
                                </td>

                                <td class="px-6 py-4 border-r text-center">
                                    <?php if ($row['status_wawancara'] == 'Dijadwalkan'): ?>
                                        <a href="<?= base_url('admin/viewWawancara/' . $row['id_pendaftar']) ?>" class="hover:opacity-80 transition inline-block" title="Ubah Jadwal">
                                            <div class="bg-blue-50 text-blue-700 text-[10px] font-bold px-2 py-1 rounded border border-blue-100 inline-block hover:bg-blue-100">
                                                <?= date('d/m H:i', strtotime($row['tanggal_wawancara'])) ?>
                                            </div>
                                        </a>
                                    <?php elseif ($row['status_berkas'] == 'Diterima'): ?>
                                        <a href="<?= base_url('admin/viewWawancara/' . $row['id_pendaftar']) ?>" class="text-amber-600 hover:text-amber-800 transition group inline-flex flex-col items-center" title="Atur Jadwal">
                                            <div class="p-1.5 rounded-full group-hover:bg-amber-100 transition">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </div>
                                            <span class="text-[10px] font-bold">Edit</span>
                                        </a>
                                    <?php else: ?>
                                        <span class="text-gray-400 text-[10px] italic">Belum dijadwalkan</span>
                                    <?php endif; ?>
                                </td>

                                <td class="px-6 py-4 text-center">
                                    <?php if ($row['status_pembayaran'] != 'Diterima'): ?>
                                        <?php if ($row['status_pembayaran'] == 'Menunggu'): ?>
                                            <a href="<?= base_url('admin/viewPembayaran/' . $row['id_pendaftar']) ?>" class="bg-yellow-500 text-white text-xs font-bold px-3 py-1.5 rounded hover:bg-yellow-600 transition shadow-sm inline-block w-28 text-center">Verif Bayar</a>
                                        <?php elseif ($row['status_pembayaran'] == 'Ditolak'): ?>
                                            <span class="text-xs text-red-500 font-medium italic">Menunggu Upload Ulang</span>
                                        <?php else: ?>
                                            <span class="text-[10px] text-gray-400 font-medium italic border border-gray-200 px-2 py-1 rounded bg-gray-50">Menunggu Upload</span>
                                        <?php endif; ?>

                                    <?php elseif ($row['status_berkas'] != 'Diterima'): ?>
                                        <?php if ($row['status_berkas'] == 'Menunggu'): ?>
                                            <a href="<?= base_url('admin/viewBerkas/' . $row['id_pendaftar']) ?>" class="bg-purple-600 text-white text-xs font-bold px-3 py-1.5 rounded hover:bg-purple-700 transition shadow-sm inline-block w-28 text-center">Verif Berkas</a>
                                        <?php elseif ($row['status_berkas'] == 'Ditolak'): ?>
                                            <span class="text-xs text-red-500 font-medium italic">Menunggu Upload Ulang</span>
                                        <?php else: ?>
                                            <span class="text-[10px] text-gray-400 font-medium italic border border-gray-200 px-2 py-1 rounded bg-gray-50">Menunggu Upload</span>
                                        <?php endif; ?>

                                    <?php elseif ($row['status_wawancara'] == 'Belum' || $row['status_wawancara'] == null): ?>
                                        <a href="<?= base_url('admin/viewWawancara/' . $row['id_pendaftar']) ?>" class="bg-blue-600 text-white text-xs font-bold px-3 py-1.5 rounded hover:bg-blue-700 transition shadow-sm inline-block w-28 text-center">Atur Jadwal</a>
                                    <?php else: ?>
                                        <a href="<?= base_url('admin/viewKelulusan/' . $row['id_pendaftar']) ?>" class="bg-emerald-600 text-white text-xs font-bold px-3 py-1.5 rounded hover:bg-emerald-700 transition shadow-sm inline-block w-28 text-center">Putusan</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-gray-200 bg-gray-50 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="text-xs text-gray-500">
                Menampilkan halaman <span class="font-bold text-gray-700"><?= $pager->getCurrentPage('pendaftar') ?></span> dari <span class="font-bold text-gray-700"><?= $pager->getPageCount('pendaftar') ?></span>
            </div>

            <div class="flex justify-center">
                <?= $pager->links('pendaftar', 'tailwind_full') ?>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleFilter() {
        const panel = document.getElementById('filterPanel');
        if (panel.classList.contains('hidden')) {
            panel.classList.remove('hidden');
        } else {
            panel.classList.add('hidden');
        }
    }
</script>

<?= $this->endSection() ?>