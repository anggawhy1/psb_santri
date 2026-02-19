<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="max-w-6xl mx-auto">

    <div class="mb-6">
        <a href="<?= base_url('admin/pendaftar') ?>" class="inline-flex items-center gap-2 text-gray-500 hover:text-emerald-600 transition font-medium text-sm bg-white border border-gray-200 px-4 py-2 rounded-lg hover:shadow-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Data Pendaftar
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 mb-8 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-50 rounded-full -mr-10 -mt-10 opacity-50"></div>

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center relative z-10 gap-6">
            <div>
                <p class="text-sm text-gray-500 font-medium mb-1 tracking-wide uppercase">No. Registrasi: <span class="font-mono text-emerald-700 font-bold"><?= $pendaftar['no_registrasi'] ?></span></p>
                <h1 class="text-2xl font-bold text-gray-800"><?= esc($pendaftar['nama_lengkap']) ?></h1>
                <p class="text-gray-500 mt-2 flex items-center gap-2">
                    <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    Program Pilihan: <span class="font-semibold text-emerald-700"><?= $pendaftar['program_pilihan'] ?></span>
                </p>
            </div>

            <div class="flex flex-col items-end">
                <span class="text-xs font-bold text-gray-400 uppercase mb-1">Tahapan Saat Ini</span>
                <div class="bg-emerald-50 text-emerald-700 px-4 py-1 rounded-full border border-emerald-100 font-bold tracking-wide text-sm">
                    <?= strtoupper($mode) ?>
                </div>
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
                <?php if ($mode == 'formulir'): ?>
                    <form action="<?= base_url('admin/updateDataPendaftar') ?>" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <?= csrf_field() ?>
                        <input type="hidden" name="id_pendaftar" value="<?= $pendaftar['id_pendaftar'] ?>">
                        
                        <div>
                            <label class="text-xs font-bold text-gray-400 uppercase">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" value="<?= esc($pendaftar['nama_lengkap']) ?>" class="w-full mt-1 border-gray-200 rounded-lg text-sm focus:ring-emerald-500">
                        </div>
                        <div>
                            <label class="text-xs font-bold text-gray-400 uppercase">NIK</label>
                            <input type="text" name="nik" value="<?= esc($pendaftar['nik']) ?>" class="w-full mt-1 border-gray-200 rounded-lg text-sm focus:ring-emerald-500">
                        </div>
                        <div>
                            <label class="text-xs font-bold text-gray-400 uppercase">No. Kartu Keluarga</label>
                            <input type="text" name="no_kk" value="<?= esc($pendaftar['no_kk']) ?>" class="w-full mt-1 border-gray-200 rounded-lg text-sm focus:ring-emerald-500">
                        </div>
                        <div>
                            <label class="text-xs font-bold text-gray-400 uppercase">Program Pilihan</label>
                            <select name="program_pilihan" class="w-full mt-1 border-gray-200 rounded-lg text-sm focus:ring-emerald-500">
                                <option value="Kitab Kuning" <?= $pendaftar['program_pilihan'] == 'Kitab Kuning' ? 'selected' : '' ?>>Kitab Kuning</option>
                                <option value="Tahfidz" <?= $pendaftar['program_pilihan'] == 'Tahfidz' ? 'selected' : '' ?>>Tahfidz</option>
                            </select>
                        </div>
                        <div class="md:col-span-2">
                            <label class="text-xs font-bold text-gray-400 uppercase">Alamat Lengkap</label>
                            <textarea name="alamat_lengkap" rows="3" class="w-full mt-1 border-gray-200 rounded-lg text-sm focus:ring-emerald-500"><?= esc($pendaftar['alamat_lengkap']) ?></textarea>
                        </div>
                        <div class="md:col-span-2 flex justify-end">
                            <button type="submit" class="bg-gray-800 text-white px-6 py-2.5 rounded-lg font-bold text-sm hover:bg-black transition shadow-sm">Simpan Perubahan</button>
                        </div>
                    </form>
                <?php else: ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-8">
                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase">Nama Lengkap</p>
                            <p class="text-sm font-medium text-gray-800 mt-1"><?= esc($pendaftar['nama_lengkap']) ?></p>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase">NIK</p>
                            <p class="text-sm font-medium text-gray-800 mt-1"><?= esc($pendaftar['nik'] ?: '-') ?></p>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase">No. Kartu Keluarga</p>
                            <p class="text-sm font-medium text-gray-800 mt-1"><?= esc($pendaftar['no_kk'] ?: '-') ?></p>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase">Tempat, Tanggal Lahir</p>
                            <p class="text-sm font-medium text-gray-800 mt-1"><?= esc($pendaftar['tempat_lahir'] ?: '-') ?>, <?= $pendaftar['tanggal_lahir'] ? date('d F Y', strtotime($pendaftar['tanggal_lahir'])) : '-' ?></p>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase">Jenis Kelamin</p>
                            <p class="text-sm font-medium text-gray-800 mt-1"><?= $pendaftar['jenis_kelamin'] == 'L' ? 'Laki-laki' : ($pendaftar['jenis_kelamin'] == 'P' ? 'Perempuan' : '-') ?></p>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase">Program Pilihan</p>
                            <span class="inline-block mt-1 px-3 py-1 text-xs font-bold text-emerald-700 bg-emerald-100 rounded-full border border-emerald-200">
                                <?= esc($pendaftar['program_pilihan']) ?>
                            </span>
                        </div>
                        <div class="md:col-span-2">
                            <p class="text-xs font-bold text-gray-400 uppercase">Alamat Lengkap</p>
                            <p class="text-sm font-medium text-gray-800 mt-1 leading-relaxed"><?= esc($pendaftar['alamat_lengkap'] ?: '-') ?></p>
                        </div>
                    </div>
                <?php endif; ?>
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
                        <p class="text-sm font-medium text-gray-800 mt-1"><?= esc($pendidikan['status'] ?: '-') ?></p>
                    </div>
                    
                    <?php if (($pendidikan['status'] ?? '') == 'Mahasiswa'): ?>
                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase">Nama Perguruan Tinggi</p>
                            <p class="text-sm font-medium text-gray-800 mt-1"><?= esc($pendidikan['nama_pt'] ?: '-') ?></p>
                        </div>
                    <?php else: ?>
                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase">NISN</p>
                            <p class="text-sm font-medium text-gray-800 mt-1 font-mono tracking-wide"><?= esc($pendidikan['nisn'] ?: '-') ?></p>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase">Asal Sekolah</p>
                            <p class="text-sm font-medium text-gray-800 mt-1"><?= esc($pendidikan['asal_sekolah'] ?: '-') ?></p>
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
                <?php if (empty($ortu)): ?>
                    <div class="text-center py-4">
                        <p class="text-sm text-gray-400 italic">Data orang tua belum diisi.</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($ortu as $o): ?>
                        <div class="relative pl-4 border-l-4 border-emerald-400">
                            <h4 class="text-xs font-bold text-emerald-600 uppercase mb-3 tracking-wide"><?= esc($o['hubungan']) ?></h4>
                            
                            <div class="space-y-3">
                                <div>
                                    <p class="text-[10px] font-bold text-gray-400 uppercase">Nama Lengkap</p>
                                    <p class="text-sm font-medium text-gray-800"><?= esc($o['nama'] ?: '-') ?></p>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-gray-400 uppercase">Pekerjaan</p>
                                    <p class="text-sm font-medium text-gray-800"><?= esc($o['pekerjaan'] ?: '-') ?></p>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-gray-400 uppercase">No. Handphone</p>
                                    <p class="text-sm font-medium text-gray-800 font-mono"><?= esc($o['no_hp'] ?: '-') ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
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
                    <p class="text-xs font-bold text-gray-400 uppercase">Alergi</p>
                    <p class="text-sm font-medium text-gray-800 mt-1"><?= esc($kesehatan['alergi'] ?: 'Tidak ada') ?></p>
                </div>
            </div>
        </div>

        <?php if ($mode == 'wawancara'): ?>
            <div class="bg-white rounded-xl shadow-lg border border-blue-100 overflow-hidden ring-1 ring-blue-500">
                <div class="px-6 py-4 bg-blue-600 text-white font-bold text-center uppercase tracking-wide text-sm">Jadwal Wawancara</div>
                <form action="<?= base_url('admin/setJadwal') ?>" method="POST" class="p-6 space-y-4">
                    <?= csrf_field() ?>
                    <input type="hidden" name="id_pendaftar" value="<?= $pendaftar['id_pendaftar'] ?>">
                    
                    <div>
                        <label class="text-xs font-bold text-gray-500 uppercase">Tanggal Tes</label>
                        <input type="date" name="tanggal" class="w-full mt-1 border-gray-200 rounded-lg text-sm focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-500 uppercase">Jam Pelaksanaan</label>
                        <input type="time" name="jam" class="w-full mt-1 border-gray-200 rounded-lg text-sm focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-500 uppercase">Lokasi / Link Meeting</label>
                        <input type="text" name="lokasi" class="w-full mt-1 border-gray-200 rounded-lg text-sm focus:ring-blue-500 placeholder-gray-300" placeholder="Contoh: Gedung Utama Lt. 2 / Zoom Meeting" required>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 text-white py-2.5 rounded-lg font-bold text-sm shadow-md hover:bg-blue-700 transition">SIMPAN JADWAL</button>
                </form>
            </div>

        <?php elseif ($mode == 'kelulusan'): ?>
            <div class="bg-white rounded-xl shadow-lg border border-emerald-100 overflow-hidden ring-1 ring-emerald-500">
                <div class="px-6 py-4 bg-emerald-600 text-white font-bold text-center uppercase tracking-wide text-sm">Seleksi Akhir</div>
                <form action="<?= base_url('admin/setKelulusan') ?>" method="POST" class="p-6 space-y-6">
                    <?= csrf_field() ?>
                    <input type="hidden" name="id_pendaftar" value="<?= $pendaftar['id_pendaftar'] ?>">
                    
                    <div class="flex flex-col gap-3">
                        <label class="flex items-center gap-3 p-3 border rounded-xl cursor-pointer hover:bg-emerald-50 border-emerald-200 transition group">
                            <input type="radio" name="status_akhir" value="Lulus" class="text-emerald-600 focus:ring-emerald-500 h-5 w-5" required>
                            <span class="text-sm font-bold text-emerald-800 uppercase group-hover:text-emerald-900">LULUS SELEKSI</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 border rounded-xl cursor-pointer hover:bg-red-50 border-red-200 transition group">
                            <input type="radio" name="status_akhir" value="Tidak Lulus" class="text-red-600 focus:ring-red-500 h-5 w-5">
                            <span class="text-sm font-bold text-red-800 uppercase group-hover:text-red-900">TIDAK LULUS</span>
                        </label>
                    </div>
                    <button type="submit" onclick="return confirm('Apakah Anda yakin? Data akan dipindahkan ke Riwayat.')" class="w-full bg-emerald-600 text-white py-3 rounded-xl font-bold text-sm shadow-lg hover:bg-emerald-700 transition uppercase tracking-wide">KONFIRMASI HASIL</button>
                </form>
            </div>
        <?php endif; ?>

    </div>
</div>
</div>

<?= $this->endSection() ?>