<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="max-w-6xl mx-auto space-y-6">

    <div>
        <a href="<?= base_url('admin/riwayat') ?>" class="inline-flex items-center gap-2 text-gray-500 hover:text-emerald-600 transition font-medium text-sm bg-white border border-gray-200 px-4 py-2 rounded-lg hover:shadow-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Riwayat
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 relative overflow-hidden">
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
                    <div class="bg-emerald-50 text-emerald-700 px-4 py-1.5 rounded-full border border-emerald-200 font-bold tracking-wide text-sm flex items-center gap-1.5 shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        LULUS SELEKSI
                    </div>
                <?php else: ?>
                    <div class="bg-red-50 text-red-700 px-4 py-1.5 rounded-full border border-red-200 font-bold tracking-wide text-sm flex items-center gap-1.5 shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        TIDAK LULUS
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        
        <div class="px-6 py-5 border-b border-gray-100 flex items-center gap-3">
            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            <h3 class="font-bold text-gray-800 text-lg">Rekapitulasi Data Formulir</h3>
        </div>

        <div class="p-0">
            <div class="p-6 border-b border-gray-100 bg-gray-50/50">
                <h4 class="text-sm font-bold text-emerald-700 uppercase tracking-widest mb-5">A. Data Diri & Akun</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-y-5 gap-x-8">
                    <div>
                        <p class="text-[11px] font-bold text-gray-400 uppercase">Nama Lengkap</p>
                        <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($pendaftar['nama_lengkap'] ?? '-') ?></p>
                    </div>
                    <div>
                        <p class="text-[11px] font-bold text-gray-400 uppercase">Email</p>
                        <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($pendaftar['email'] ?? '-') ?></p>
                    </div>
                    <div>
                        <p class="text-[11px] font-bold text-gray-400 uppercase">No. WhatsApp</p>
                        <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($pendaftar['no_hp'] ?? '-') ?></p>
                    </div>
                    <div>
                        <p class="text-[11px] font-bold text-gray-400 uppercase">NIK</p>
                        <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($pendaftar['nik'] ?? '-') ?></p>
                    </div>
                    <div>
                        <p class="text-[11px] font-bold text-gray-400 uppercase">No. KK</p>
                        <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($pendaftar['no_kk'] ?? '-') ?></p>
                    </div>
                    <div>
                        <p class="text-[11px] font-bold text-gray-400 uppercase">Tempat, Tanggal Lahir</p>
                        <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($pendaftar['tempat_lahir'] ?? '-') ?>, <?= !empty($pendaftar['tanggal_lahir']) ? date('d M Y', strtotime($pendaftar['tanggal_lahir'])) : '-' ?></p>
                    </div>
                    <div>
                        <p class="text-[11px] font-bold text-gray-400 uppercase">Jenis Kelamin</p>
                        <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= ($pendaftar['jenis_kelamin'] ?? '') == 'L' ? 'Laki-laki' : (($pendaftar['jenis_kelamin'] ?? '') == 'P' ? 'Perempuan' : '-') ?></p>
                    </div>
                    <div>
                        <p class="text-[11px] font-bold text-gray-400 uppercase">Anak Ke / Dari</p>
                        <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($pendaftar['anak_ke'] ?? '-') ?> dari <?= esc($pendaftar['dari_bersaudara'] ?? '-') ?> bersaudara</p>
                    </div>
                    <div>
                        <p class="text-[11px] font-bold text-gray-400 uppercase">Program Pilihan</p>
                        <p class="text-sm font-bold text-emerald-600 mt-0.5"><?= esc($pendaftar['program_pilihan'] ?? '-') ?></p>
                    </div>
                    <div class="md:col-span-2 lg:col-span-3">
                        <p class="text-[11px] font-bold text-gray-400 uppercase">Alamat Lengkap</p>
                        <p class="text-sm font-semibold text-gray-800 mt-0.5 leading-relaxed"><?= esc($pendaftar['alamat_lengkap'] ?? '-') ?></p>
                    </div>
                </div>
            </div>

            <div class="p-6 border-b border-gray-100">
                <h4 class="text-sm font-bold text-emerald-700 uppercase tracking-widest mb-5">B. Data Pendidikan</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-y-5 gap-x-8">
                    <div>
                        <p class="text-[11px] font-bold text-gray-400 uppercase">Status Pendidikan</p>
                        <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($pendidikan['status'] ?? '-') ?></p>
                    </div>
                    
                    <?php if (($pendidikan['status'] ?? '') == 'Mahasiswa'): ?>
                        <div class="md:col-span-2">
                            <p class="text-[11px] font-bold text-gray-400 uppercase">Nama Perguruan Tinggi</p>
                            <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($pendidikan['nama_pt'] ?? '-') ?></p>
                        </div>
                    <?php else: ?>
                        <div>
                            <p class="text-[11px] font-bold text-gray-400 uppercase">NISN</p>
                            <p class="text-sm font-semibold text-gray-800 mt-0.5 font-mono tracking-wide"><?= esc($pendidikan['nisn'] ?? '-') ?></p>
                        </div>
                        <div>
                            <p class="text-[11px] font-bold text-gray-400 uppercase">Asal Sekolah</p>
                            <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($pendidikan['asal_sekolah'] ?? '-') ?></p>
                        </div>
                        <div>
                            <p class="text-[11px] font-bold text-gray-400 uppercase">Kelas Terakhir</p>
                            <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($pendidikan['kelas_terakhir'] ?? '-') ?></p>
                        </div>
                        <div>
                            <p class="text-[11px] font-bold text-gray-400 uppercase">Status Siswa</p>
                            <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($pendidikan['status_siswa'] ?? '-') ?></p>
                        </div>
                        <div>
                            <p class="text-[11px] font-bold text-gray-400 uppercase">Jenjang Didaftar</p>
                            <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($pendidikan['jenjang_pendidikan_didaftar'] ?? '-') ?></p>
                        </div>
                        <div>
                            <p class="text-[11px] font-bold text-gray-400 uppercase">Sekolah Tujuan</p>
                            <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($pendidikan['nama_sekolah'] ?? '-') ?></p>
                        </div>
                    <?php endif; ?>

                    <div class="md:col-span-2 lg:col-span-3">
                        <p class="text-[11px] font-bold text-gray-400 uppercase">Prestasi Akademik / Non-Akademik</p>
                        <div class="mt-2 p-4 bg-gray-50 rounded-xl border border-gray-100 text-sm text-gray-700 italic leading-relaxed">
                            "<?= esc($pendidikan['prestasi'] ?: 'Tidak ada data prestasi yang dicantumkan.') ?>"
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-6 border-b border-gray-100 bg-gray-50/50">
                <h4 class="text-sm font-bold text-emerald-700 uppercase tracking-widest mb-4">C. Data Orang Tua / Wali</h4>
                
                <?php if (empty($ortu)): ?>
                    <p class="text-sm text-gray-500 italic">- Data tidak ditemukan -</p>
                <?php else: ?>
                    <div class="space-y-6">
                        <?php foreach ($ortu as $index => $o): ?>
                            <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm">
                                <p class="text-xs font-bold text-emerald-600 mb-3 border-b border-gray-100 pb-2">Orang Tua / Wali <?= $index + 1 ?></p>
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                                    <div>
                                        <p class="text-[11px] font-bold text-gray-400 uppercase">Hubungan</p>
                                        <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($o['hubungan'] ?? '-') ?></p>
                                    </div>
                                    <div>
                                        <p class="text-[11px] font-bold text-gray-400 uppercase">Nama Lengkap</p>
                                        <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($o['nama'] ?? '-') ?></p>
                                    </div>
                                    <div>
                                        <p class="text-[11px] font-bold text-gray-400 uppercase">Pekerjaan</p>
                                        <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($o['pekerjaan'] ?? '-') ?></p>
                                    </div>
                                    <div>
                                        <p class="text-[11px] font-bold text-gray-400 uppercase">No. HP/WA</p>
                                        <p class="text-sm font-semibold text-gray-800 mt-0.5 font-mono"><?= esc($o['no_hp'] ?? '-') ?></p>
                                    </div>
                                    <div>
                                        <p class="text-[11px] font-bold text-gray-400 uppercase">Pendidikan</p>
                                        <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($o['pendidikan'] ?? '-') ?></p>
                                    </div>
                                    <div>
                                        <p class="text-[11px] font-bold text-gray-400 uppercase">Pendapatan</p>
                                        <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($o['pendapatan'] ?? '-') ?></p>
                                    </div>
                                    <div>
                                        <p class="text-[11px] font-bold text-gray-400 uppercase">Status</p>
                                        <p class="text-sm font-semibold text-gray-800 mt-0.5 capitalize"><?= esc($o['status'] ?? '-') ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="p-6 border-b border-gray-100">
                <h4 class="text-sm font-bold text-emerald-700 uppercase tracking-widest mb-4">D. Data Kesehatan</h4>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-y-4 gap-x-8">
                    <div>
                        <p class="text-[11px] font-bold text-gray-400 uppercase">Golongan Darah</p>
                        <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($kesehatan['gol_darah'] ?: '-') ?></p>
                    </div>
                    <div>
                        <p class="text-[11px] font-bold text-gray-400 uppercase">Alergi</p>
                        <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($kesehatan['alergi'] ?: 'Tidak ada') ?></p>
                    </div>
                    <div class="md:col-span-3">
                        <p class="text-[11px] font-bold text-gray-400 uppercase">Riwayat Penyakit Berat</p>
                        <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($kesehatan['riwayat_penyakit'] ?: 'Tidak ada') ?></p>
                    </div>
                </div>
            </div>

            <div class="p-6 bg-gray-50/50">
                <h4 class="text-sm font-bold text-emerald-700 uppercase tracking-widest mb-4">E. Arsip Berkas Digital</h4>
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                    <?php
                    $listBerkas = ['akta_kelahiran', 'kartu_keluarga', 'ktp_ortu', 'ktp_pendaftar', 'ijazah_raport', 'pas_foto'];
                    $adaBerkas = false;

                    foreach ($listBerkas as $b):
                        if (!empty($berkas[$b])):
                            $adaBerkas = true;
                    ?>
                            <a href="<?= base_url('uploads/berkas/' . $berkas[$b]) ?>" target="_blank" class="group flex flex-col items-center justify-center p-4 rounded-xl border border-gray-200 hover:border-emerald-300 hover:bg-emerald-50 transition text-center bg-white shadow-sm hover:shadow">
                                <svg class="w-8 h-8 text-gray-300 group-hover:text-emerald-500 mb-2 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                                </svg>
                                <span class="text-[10px] font-bold text-gray-500 group-hover:text-emerald-700 uppercase leading-tight transition-colors"><?= str_replace('_', ' ', $b) ?></span>
                            </a>
                    <?php 
                        endif;
                    endforeach; 

                    if(!$adaBerkas):
                    ?>
                        <div class="col-span-full text-center py-6 bg-white rounded-xl border border-gray-200">
                            <p class="text-sm text-gray-400 italic">Tidak ada berkas yang diunggah.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>