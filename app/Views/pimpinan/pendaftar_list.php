<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="max-w-7xl mx-auto">
    
    <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <div>
                <h2 class="text-xl font-bold text-gray-800">Monitoring Data Pendaftar</h2>
                <p class="text-sm text-gray-500">Daftar calon santri yang sedang dalam proses seleksi.</p>
            </div>
            
            <div class="w-full md:w-auto">
                <div class="relative">
                    <input type="text" placeholder="Cari Nama / No.Reg..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-indigo-500 focus:border-indigo-500 w-full md:w-64">
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
                        <th class="px-6 py-4 text-center">Program Pilihan</th> 
                        <th class="px-6 py-4 text-center">Status Saat Ini</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($data)): ?>
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-400 italic font-medium">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-12 h-12 text-gray-200 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                    <p>Tidak ada pendaftar aktif saat ini.</p>
                                </div>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach($data as $index => $row): ?>
                        <tr class="bg-white border-b hover:bg-gray-50 transition group">
                            <td class="px-6 py-4 text-center font-bold text-gray-400">
                                <?= $index + 1 ?>
                            </td>

                            <td class="px-6 py-4 border-r border-gray-50">
                                <span class="text-xs font-mono font-black bg-slate-100 text-slate-600 px-2 py-1 rounded border border-slate-200">
                                    <?= esc($row['no_registrasi']) ?>
                                </span>
                            </td>

                            <td class="px-6 py-4 border-r border-gray-50">
                                <div class="font-bold text-gray-900 group-hover:text-emerald-600 transition-colors">
                                    <?= esc($row['nama_lengkap']) ?>
                                </div>
                            </td>
                            
                            <td class="px-6 py-4 text-center border-r border-gray-50">
                                <span class="bg-blue-50 text-blue-700 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider border border-blue-100 shadow-sm">
                                    <?= esc($row['program_pilihan']) ?>
                                </span>
                            </td>

                            <td class="px-6 py-4 text-center border-r border-gray-50">
                                <div class="inline-flex items-center gap-1.5 bg-yellow-50 text-yellow-700 px-3 py-1 rounded-full text-[10px] font-black border border-yellow-200 uppercase tracking-tighter shadow-sm">
                                    <div class="w-1.5 h-1.5 rounded-full bg-yellow-500 animate-pulse"></div>
                                    Seleksi Aktif
                                </div>
                            </td>

                            <td class="px-6 py-4 text-center">
                                <a href="<?= base_url('pimpinan/detailSantri/' . $row['id_pendaftar']) ?>" class="inline-flex items-center justify-center gap-2 bg-white text-gray-700 hover:text-emerald-600 font-bold text-xs border border-gray-200 hover:border-emerald-200 px-4 py-2 rounded-xl hover:bg-emerald-50 transition-all shadow-sm active:scale-95 group/btn">
                                    <span>Pantau Data</span>
                                    <svg class="w-3.5 h-3.5 transform group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
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