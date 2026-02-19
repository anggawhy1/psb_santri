<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="max-w-6xl mx-auto">

    <div class="mb-6">
        <a href="<?= base_url('admin/riwayat') ?>" class="inline-flex items-center gap-2 text-gray-500 hover:text-emerald-600 transition font-medium text-sm bg-white border border-gray-200 px-4 py-2 rounded-lg hover:shadow-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Riwayat
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 mb-8 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-50 rounded-full -mr-10 -mt-10 opacity-50"></div>

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center relative z-10 gap-6">
            <div>
                <p class="text-sm text-gray-500 font-medium mb-1 tracking-wide uppercase">
                    No. Registrasi: <span class="font-mono text-emerald-700 font-bold"><?= $pendaftar['no_registrasi'] ?></span>
                </p>
                <h1 class="text-2xl font-bold text-gray-800"><?= esc($pendaftar['nama_lengkap']) ?></h1>
                <p class="text-gray-500 mt-2 flex items-center gap-2">
                    <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    Program Pilihan: <span class="font-semibold text-emerald-700"><?= $pendaftar['program_pilihan'] ?></span>
                </p>
            </div>

            <div class="flex flex-col items-end">
                <span class="text-xs font-bold text-gray-400 uppercase mb-1">Status Akhir</span>

                <?php if ($pendaftar['status_akhir'] == 'Lulus'): ?>
                    <div class="bg-emerald-50 text-emerald-700 px-4 py-1 rounded-full border border-emerald-100 font-bold tracking-wide text-sm">
                        LULUS
                    </div>
                <?php else: ?>
                    <div class="bg-red-50 text-red-700 px-4 py-1 rounded-full border border-red-100 font-bold tracking-wide text-sm">
                        TIDAK LULUS
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">

        <div class="xl:col-span-2 space-y-8">

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <h3 class="font-bold text-gray-700">Data Diri Santri</h3>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-8">
                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase">Nomor Induk Kependudukan (NIK)</p>
                            <p class="text-sm font-medium text-gray-800 mt-1"><?= esc($pendaftar['nik']) ?></p>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase">Nomor Kartu Keluarga (KK)</p>
                            <p class="text-sm font-medium text-gray-800 mt-1"><?= esc($pendaftar['no_kk']) ?></p>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase">Tempat, Tanggal Lahir</p>
                            <p class="text-sm font-medium text-gray-800 mt-1">
                                <?= esc($pendaftar['tempat_lahir']) ?>, <?= date('d F Y', strtotime($pendaftar['tanggal_lahir'])) ?>
                            </p>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase">Jenis Kelamin</p>
                            <p class="text-sm font-medium text-gray-800 mt-1">
                                <?= $pendaftar['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan' ?>
                            </p>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase">Anak Ke-</p>
                            <p class="text-sm font-medium text-gray-800 mt-1">
                                <?= $pendaftar['anak_ke'] ?> <span class="text-gray-400 font-normal">dari</span> <?= $pendaftar['dari_bersaudara'] ?> <span class="text-gray-400 font-normal">bersaudara</span>
                            </p>
                        </div>
                        <div class="md:col-span-2">
                            <p class="text-xs font-bold text-gray-400 uppercase">Alamat Lengkap</p>
                            <p class="text-sm font-medium text-gray-800 mt-1 leading-relaxed"><?= esc($pendaftar['alamat_lengkap']) ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    <h3 class="font-bold text-gray-700">Riwayat Pendidikan</h3>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-8">
                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase">Status Pendidikan</p>
                            <p class="text-sm font-medium text-gray-800 mt-1"><?= esc($pendidikan['status']) ?></p>
                        </div>

                        <?php if ($pendidikan['status'] == 'Mahasiswa'): ?>
                            <div>
                                <p class="text-xs font-bold text-gray-400 uppercase">Nama Perguruan Tinggi</p>
                                <p class="text-sm font-medium text-gray-800 mt-1"><?= esc($pendidikan['nama_pt']) ?></p>
                            </div>
                        <?php else: ?>
                            <div>
                                <p class="text-xs font-bold text-gray-400 uppercase">NISN</p>
                                <p class="text-sm font-medium text-gray-800 mt-1 font-mono tracking-wide"><?= esc($pendidikan['nisn'] ?: '-') ?></p>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-gray-400 uppercase">Asal Sekolah</p>
                                <p class="text-sm font-medium text-gray-800 mt-1"><?= esc($pendidikan['asal_sekolah']) ?></p>
                            </div>
                        <?php endif; ?>

                        <div class="md:col-span-2">
                            <p class="text-xs font-bold text-gray-400 uppercase">Prestasi Akademik / Non-Akademik</p>
                            <div class="mt-2 p-4 bg-gray-50 rounded-lg border border-gray-100 text-sm text-gray-600 italic leading-relaxed">
                                "<?= esc($pendidikan['prestasi'] ?: 'Tidak ada data prestasi yang dicantumkan.') ?>"
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="space-y-8">

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    <h3 class="font-bold text-gray-700">Data Orang Tua / Wali</h3>
                </div>
                <div class="p-6 space-y-6">
                    <?php foreach ($ortu as $o): ?>
                        <div class="relative pl-4 border-l-4 border-emerald-400">
                            <h4 class="text-xs font-bold text-emerald-600 uppercase mb-3 tracking-wide"><?= $o['hubungan'] ?></h4>
                            <div class="space-y-3">
                                <div class="flex justify-between border-b border-gray-100 pb-2">
                                    <span class="text-xs font-bold text-gray-400 uppercase">Nama</span>
                                    <span class="text-sm font-medium text-gray-800 text-right"><?= esc($o['nama']) ?></span>
                                </div>
                                <div class="flex justify-between border-b border-gray-100 pb-2">
                                    <span class="text-xs font-bold text-gray-400 uppercase">Pekerjaan</span>
                                    <span class="text-sm font-medium text-gray-800 text-right"><?= esc($o['pekerjaan']) ?></span>
                                </div>
                                <div class="flex justify-between pt-1">
                                    <span class="text-xs font-bold text-gray-400 uppercase">No. HP</span>
                                    <span class="text-sm font-medium text-gray-800 text-right font-mono"><?= esc($o['no_hp']) ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                    <h3 class="font-bold text-gray-700">Data Kesehatan</h3>
                </div>
                <div class="p-6 space-y-5">
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase">Golongan Darah</p>
                        <p class="text-sm font-medium text-gray-800 mt-1"><?= esc($kesehatan['gol_darah'] ?: '-') ?></p>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase">Riwayat Penyakit</p>
                        <p class="text-sm font-medium text-gray-800 mt-1"><?= esc($kesehatan['riwayat_penyakit'] ?: 'Tidak ada') ?></p>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase">Alergi Makanan/Obat</p>
                        <p class="text-sm font-medium text-gray-800 mt-1"><?= esc($kesehatan['alergi'] ?: 'Tidak ada') ?></p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="font-bold text-gray-700">Arsip Berkas Digital</h3>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-2 gap-3">
                        <?php
                        $listBerkas = ['akta_kelahiran', 'kartu_keluarga', 'ktp_ortu', 'ktp_pendaftar', 'ijazah_raport', 'pas_foto'];
                        foreach ($listBerkas as $b):
                            if (!empty($berkas[$b])):
                        ?>
                                <a href="<?= base_url('uploads/berkas/' . $berkas[$b]) ?>" target="_blank" class="group flex flex-col items-center justify-center p-3 rounded-lg border border-gray-200 hover:border-emerald-300 hover:bg-emerald-50 transition text-center bg-gray-50">
                                    <svg class="w-6 h-6 text-gray-400 group-hover:text-emerald-500 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                                    </svg>
                                    <span class="text-[10px] font-bold text-gray-600 group-hover:text-emerald-700 uppercase leading-tight"><?= str_replace('_', ' ', $b) ?></span>
                                </a>
                        <?php endif;
                        endforeach; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>