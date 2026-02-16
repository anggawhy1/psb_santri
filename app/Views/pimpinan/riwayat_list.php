<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="max-w-7xl mx-auto">
    
    <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <div>
                <h2 class="text-xl font-bold text-gray-800">Riwayat Pendaftar (Arsip)</h2>
                <p class="text-sm text-gray-500">Data santri yang telah selesai proses seleksi.</p>
            </div>
            
            <div class="flex items-center gap-3 w-full md:w-auto">
                <div class="relative">
                    <input type="text" placeholder="Cari Nama..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-indigo-500 focus:border-indigo-500 w-full md:w-64">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 border-b">
                    <tr>
                        <th class="px-6 py-4 w-12 text-center">No</th>
                        <th class="px-6 py-4">No. Registrasi</th>
                        <th class="px-6 py-4">Nama Lengkap</th>
                        <th class="px-6 py-4 text-center">Program</th>
                        <th class="px-6 py-4 text-center">Hasil Akhir</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($data)): ?>
                        <tr><td colspan="6" class="text-center py-8 text-gray-400">Belum ada riwayat data.</td></tr>
                    <?php else: ?>
                        <?php foreach($data as $index => $row): ?>
                        <tr class="bg-white border-b hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-center font-bold text-gray-400"><?= $index + 1 ?></td>
                            <td class="px-6 py-4 font-mono font-medium text-gray-600"><?= $row['no_registrasi'] ?></td>
                            <td class="px-6 py-4 font-bold text-gray-800"><?= $row['nama_lengkap'] ?></td>
                            
                            <td class="px-6 py-4 text-center text-gray-600">
                                <?= $row['program_pilihan'] ?>
                            </td>

                            <td class="px-6 py-4 text-center">
                                <?php if($row['status_akhir'] == 'Lulus'): ?>
                                    <span class="bg-green-100 text-green-800 text-xs font-bold px-3 py-1 rounded-full">LULUS</span>
                                <?php else: ?>
                                    <span class="bg-red-100 text-red-800 text-xs font-bold px-3 py-1 rounded-full">TIDAK LULUS</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <a href="<?= base_url('pimpinan/detailSantri/' . $row['id_pendaftar']) ?>" class="text-gray-500 hover:text-indigo-600 font-bold text-xs underline">
                                    Lihat Data
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>