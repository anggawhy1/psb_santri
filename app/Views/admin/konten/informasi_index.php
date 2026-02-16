<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="max-w-5xl mx-auto">
    
    <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
        <div class="flex items-center gap-4">
            <div class="p-3 bg-emerald-50 text-emerald-600 rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div>
                <h2 class="text-xl font-bold text-gray-800">Informasi Pendaftaran</h2>
                <p class="text-sm text-gray-500">Kelola informasi publik yang tampil di halaman depan.</p>
            </div>
        </div>
    </div>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-lg mb-6 flex items-center gap-2 text-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 border-b">
                <tr>
                    <th class="px-6 py-4 w-12 text-center">No</th>
                    <th class="px-6 py-4 w-1/4">Judul Informasi</th>
                    <th class="px-6 py-4">Isi Konten (Cuplikan)</th>
                    <th class="px-6 py-4 w-32 text-center">Update Terakhir</th>
                    <th class="px-6 py-4 w-24 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($data)): ?>
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-400 italic">
                            Belum ada data informasi. (Jalankan Seeder terlebih dahulu)
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach($data as $index => $item): ?>
                    <tr class="bg-white border-b hover:bg-gray-50 transition group">
                        <td class="px-6 py-4 text-center font-bold text-gray-400">
                            <?= $index + 1 ?>
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-bold text-gray-800 text-base"><?= esc($item['judul']) ?></span>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-gray-600 line-clamp-2 leading-relaxed"><?= esc($item['isi']) ?></p>
                        </td>
                        <td class="px-6 py-4 text-center text-xs text-gray-400">
                            <?= date('d/m/Y', strtotime($item['updated_at'])) ?>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <a href="<?= base_url('admin/editInformasi/' . $item['id_informasi']) ?>" class="inline-flex items-center px-3 py-2 bg-emerald-50 text-emerald-600 rounded-lg hover:bg-emerald-600 hover:text-white transition text-xs font-bold border border-emerald-200 hover:border-emerald-600 gap-1 group-hover:shadow-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                Edit
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>