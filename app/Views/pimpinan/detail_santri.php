<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="max-w-6xl mx-auto space-y-8 pb-20">
    
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-40 h-40 bg-slate-50 rounded-full -mr-12 -mt-12 opacity-80"></div>
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center relative z-10 gap-6">
            <div>
                <a href="<?= $is_riwayat ? base_url('pimpinan/riwayat') : base_url('pimpinan/pendaftar') ?>" class="text-gray-400 hover:text-gray-600 font-bold text-xs uppercase tracking-widest flex items-center gap-2 mb-3 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke <?= $is_riwayat ? 'Arsip Riwayat' : 'Monitoring Aktif' ?>
                </a>
                <h1 class="text-3xl font-black text-gray-800"><?= esc($pendaftar['nama_lengkap']) ?></h1>
                <div class="flex items-center gap-4 mt-2">
                    <span class="font-mono text-sm text-gray-500 bg-gray-100 px-2 py-0.5 rounded border border-gray-200"><?= esc($pendaftar['no_registrasi']) ?></span>
                    <span class="text-sm font-bold text-indigo-600 uppercase tracking-wider text-[10px] bg-indigo-50 px-2 py-1 rounded border border-indigo-100"><?= esc($pendaftar['program_pilihan']) ?></span>
                </div>
            </div>

            <div class="text-right">
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Status Saat Ini</p>
                <?php if($pendaftar['status_akhir'] == 'Lulus'): ?>
                    <span class="bg-emerald-100 text-emerald-800 px-4 py-2 rounded-xl text-sm font-black border border-emerald-200 shadow-sm">LULUS SELEKSI</span>
                <?php elseif($pendaftar['status_akhir'] == 'Tidak Lulus'): ?>
                    <span class="bg-red-100 text-red-800 px-4 py-2 rounded-xl text-sm font-black border border-red-200 shadow-sm">TIDAK LULUS</span>
                <?php else: ?>
                    <span class="bg-yellow-100 text-yellow-800 px-4 py-2 rounded-xl text-sm font-black border border-yellow-200 shadow-sm flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-yellow-600 animate-pulse"></span>
                        PROSES SELEKSI
                    </span>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
        
        <div class="xl:col-span-2 space-y-8">
            
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    <h3 class="font-bold text-gray-700 text-sm uppercase tracking-wide">Data Diri Santri</h3>
                </div>
                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-8 gap-x-8">
                        <div>
                            <p class="text-[10px] text-gray-400 font-bold uppercase mb-1">NIK</p>
                            <p class="font-medium text-gray-800"><?= esc($pendaftar['nik'] ?: '-') ?></p>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-400 font-bold uppercase mb-1">No. KK</p>
                            <p class="font-medium text-gray-800"><?= esc($pendaftar['no_kk'] ?: '-') ?></p>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-400 font-bold uppercase mb-1">Tempat, Tanggal Lahir</p>
                            <p class="font-medium text-gray-800"><?= esc($pendaftar['tempat_lahir']) ?>, <?= $pendaftar['tanggal_lahir'] ? date('d F Y', strtotime($pendaftar['tanggal_lahir'])) : '-' ?></p>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-400 font-bold uppercase mb-1">Jenis Kelamin</p>
                            <p class="font-medium text-gray-800"><?= $pendaftar['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan' ?></p>
                        </div>
                        <div class="md:col-span-2">
                            <p class="text-[10px] text-gray-400 font-bold uppercase mb-1">Alamat Lengkap</p>
                            <p class="font-medium text-gray-800 leading-relaxed"><?= esc($pendaftar['alamat_lengkap'] ?: '-') ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    <h3 class="font-bold text-gray-700 text-sm uppercase tracking-wide">Riwayat Pendidikan</h3>
                </div>
                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-8 gap-x-8">
                        <div>
                            <p class="text-[10px] text-gray-400 font-bold uppercase mb-1">Jenjang Terakhir</p>
                            <p class="font-medium text-gray-800"><?= esc($pendidikan['status'] ?: '-') ?></p>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-400 font-bold uppercase mb-1">Asal Sekolah</p>
                            <p class="font-medium text-gray-800"><?= esc($pendidikan['asal_sekolah'] ?: '-') ?></p>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-400 font-bold uppercase mb-1">NISN</p>
                            <p class="font-medium text-gray-800"><?= esc($pendidikan['nisn'] ?: '-') ?></p>
                        </div>
                        <div class="md:col-span-2">
                            <p class="text-[10px] text-gray-400 font-bold uppercase mb-1">Prestasi</p>
                            <p class="font-medium text-gray-500 italic"><?= esc($pendidikan['prestasi'] ?: 'Tidak ada data prestasi.') ?></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="space-y-8">
            
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <h3 class="font-bold text-gray-700 text-sm uppercase tracking-wide">Progres Seleksi</h3>
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-gray-500">Pembayaran</span>
                        <?php if(($pembayaran['status_pembayaran']??'') == 'Diterima'): ?>
                            <span class="text-[10px] bg-green-100 text-green-700 px-2 py-1 rounded font-bold">LUNAS</span>
                        <?php else: ?>
                            <span class="text-[10px] bg-gray-100 text-gray-500 px-2 py-1 rounded font-bold">PENDING</span>
                        <?php endif; ?>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-gray-500">Berkas</span>
                        <?php if(($berkas['status_berkas']??'') == 'Diterima'): ?>
                            <span class="text-[10px] bg-green-100 text-green-700 px-2 py-1 rounded font-bold">VALID</span>
                        <?php else: ?>
                            <span class="text-[10px] bg-gray-100 text-gray-500 px-2 py-1 rounded font-bold">PROSES</span>
                        <?php endif; ?>
                    </div>
                    <div class="pt-4 border-t border-gray-100">
                        <p class="text-[10px] font-bold text-gray-400 uppercase mb-2">Jadwal Wawancara</p>
                        <?php if(!empty($jadwal['tanggal_wawancara'])): ?>
                            <div class="bg-blue-50 p-3 rounded-lg border border-blue-100 text-center">
                                <p class="text-blue-800 font-bold text-sm"><?= date('d F Y', strtotime($jadwal['tanggal_wawancara'])) ?></p>
                                <p class="text-blue-600 text-xs mt-1"><?= date('H:i', strtotime($jadwal['tanggal_wawancara'])) ?> WIB</p>
                                <p class="text-blue-400 text-[10px] mt-1 truncate"><?= esc($jadwal['tautan_video']) ?></p>
                            </div>
                        <?php else: ?>
                            <p class="text-xs text-gray-400 italic">Belum dijadwalkan.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <h3 class="font-bold text-gray-700 text-sm uppercase tracking-wide">Orang Tua / Wali</h3>
                </div>
                <div class="p-6 space-y-6">
                    <?php if(empty($ortu)): ?>
                        <p class="text-xs text-gray-400 italic">Data belum diisi.</p>
                    <?php else: ?>
                        <?php foreach($ortu as $o): ?>
                            <div class="relative pl-4 border-l-2 border-emerald-400">
                                <h4 class="font-bold text-xs text-emerald-600 uppercase mb-1"><?= $o['hubungan'] ?></h4>
                                <p class="text-sm font-bold text-gray-800"><?= esc($o['nama']) ?></p>
                                <p class="text-xs text-gray-500 mt-1"><?= esc($o['pekerjaan']) ?></p>
                                <p class="text-xs text-emerald-600 mt-1 font-mono"><?= esc($o['no_hp']) ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <h3 class="font-bold text-gray-700 text-sm uppercase tracking-wide">Lampiran Berkas</h3>
                </div>
                <div class="p-6 grid grid-cols-2 gap-3">
                    <?php 
                        $listBerkas = ['akta_kelahiran', 'kartu_keluarga', 'ktp_ortu', 'pas_foto'];
                        foreach($listBerkas as $b): 
                    ?>
                        <div class="p-3 border rounded-lg text-center bg-gray-50">
                            <p class="text-[8px] font-bold text-gray-400 uppercase mb-2"><?= str_replace('_', ' ', $b) ?></p>
                            <?php if(!empty($berkas[$b])): ?>
                                <a href="<?= base_url('uploads/berkas/' . $berkas[$b]) ?>" target="_blank" class="text-[10px] text-blue-600 font-bold hover:underline">LIHAT</a>
                            <?php else: ?>
                                <span class="text-[10px] text-gray-300 italic">-</span>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>