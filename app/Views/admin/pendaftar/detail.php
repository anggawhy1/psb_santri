<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<?php 
    // TAMBAHAN LOGIKA: Nangkap parameter mode dari URL
    $is_edit = (isset($_GET['mode']) && $_GET['mode'] == 'edit'); 
?>

<div class="max-w-6xl mx-auto space-y-6">

    <div>
        <a href="<?= base_url('admin/pendaftar') ?>" class="inline-flex items-center gap-2 text-gray-500 hover:text-emerald-600 transition font-medium text-sm bg-white border border-gray-200 px-4 py-2 rounded-lg hover:shadow-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Data Pendaftar
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 relative overflow-hidden">
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
                    <?= strtoupper($mode) ?> <?= ($mode == 'formulir') ? ($is_edit ? '(EDIT)' : '(LIHAT)') : '' ?>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">

        <div class="<?= ($mode == 'formulir') ? 'xl:col-span-3' : 'xl:col-span-2' ?> space-y-8">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                
                <div class="p-6 border-b border-gray-100 flex items-center justify-between gap-3">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <h3 class="font-bold text-gray-800 text-lg">Rekapitulasi Data Formulir</h3>
                    </div>
                </div>

                <?php if ($mode == 'formulir' && $is_edit): ?>
                    <form action="<?= base_url('admin/updateDataPendaftar') ?>" method="POST" class="p-0">
                        <?= csrf_field() ?>
                        <input type="hidden" name="id_pendaftar" value="<?= $pendaftar['id_pendaftar'] ?>">

                        <div class="p-6 border-b border-gray-100 bg-gray-50/50">
                            <h4 class="text-sm font-bold text-emerald-700 uppercase tracking-widest mb-4">A. Data Diri & Akun</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                <div>
                                    <label class="text-[11px] font-bold text-gray-500 uppercase">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" value="<?= esc($pendaftar['nama_lengkap']) ?>" class="w-full mt-1.5 border border-gray-400 text-gray-900 font-medium rounded-lg text-sm focus:ring-emerald-500 focus:border-emerald-500 shadow-sm py-2.5 px-3">
                                </div>
                                <div>
                                    <label class="text-[11px] font-bold text-gray-500 uppercase">Email <span class="text-red-500 normal-case font-semibold">(Read-Only)</span></label>
                                    <input type="email" value="<?= esc($pendaftar['email']) ?>" readonly class="w-full mt-1.5 border border-gray-300 bg-gray-200 text-gray-600 font-medium cursor-not-allowed rounded-lg text-sm shadow-sm py-2.5 px-3">
                                </div>
                                <div>
                                    <label class="text-[11px] font-bold text-gray-500 uppercase">No. WhatsApp</label>
                                    <input type="number" name="no_hp" value="<?= esc($pendaftar['no_hp']) ?>" class="w-full mt-1.5 border border-gray-400 text-gray-900 font-medium rounded-lg text-sm focus:ring-emerald-500 focus:border-emerald-500 shadow-sm py-2.5 px-3">
                                </div>
                                <div>
                                    <label class="text-[11px] font-bold text-gray-500 uppercase">NIK</label>
                                    <input type="number" name="nik" value="<?= esc($pendaftar['nik']) ?>" class="w-full mt-1.5 border border-gray-400 text-gray-900 font-medium rounded-lg text-sm focus:ring-emerald-500 focus:border-emerald-500 shadow-sm py-2.5 px-3">
                                </div>
                                <div>
                                    <label class="text-[11px] font-bold text-gray-500 uppercase">No. KK</label>
                                    <input type="number" name="no_kk" value="<?= esc($pendaftar['no_kk']) ?>" class="w-full mt-1.5 border border-gray-400 text-gray-900 font-medium rounded-lg text-sm focus:ring-emerald-500 focus:border-emerald-500 shadow-sm py-2.5 px-3">
                                </div>
                                <div>
                                    <label class="text-[11px] font-bold text-gray-500 uppercase">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" value="<?= esc($pendaftar['tempat_lahir']) ?>" class="w-full mt-1.5 border border-gray-400 text-gray-900 font-medium rounded-lg text-sm focus:ring-emerald-500 focus:border-emerald-500 shadow-sm py-2.5 px-3">
                                </div>
                                <div>
                                    <label class="text-[11px] font-bold text-gray-500 uppercase">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" value="<?= esc($pendaftar['tanggal_lahir']) ?>" class="w-full mt-1.5 border border-gray-400 text-gray-900 font-medium rounded-lg text-sm focus:ring-emerald-500 focus:border-emerald-500 shadow-sm py-2.5 px-3">
                                </div>
                                <div>
                                    <label class="text-[11px] font-bold text-gray-500 uppercase">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="w-full mt-1.5 border border-gray-400 text-gray-900 font-medium rounded-lg text-sm focus:ring-emerald-500 focus:border-emerald-500 shadow-sm py-2.5 px-3">
                                        <option value="L" <?= $pendaftar['jenis_kelamin'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                                        <option value="P" <?= $pendaftar['jenis_kelamin'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                                    </select>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="text-[11px] font-bold text-gray-500 uppercase">Anak Ke</label>
                                        <input type="number" name="anak_ke" value="<?= esc($pendaftar['anak_ke']) ?>" class="w-full mt-1.5 border border-gray-400 text-gray-900 font-medium rounded-lg text-sm focus:ring-emerald-500 focus:border-emerald-500 shadow-sm py-2.5 px-3">
                                    </div>
                                    <div>
                                        <label class="text-[11px] font-bold text-gray-500 uppercase">Dari</label>
                                        <input type="number" name="dari_bersaudara" value="<?= esc($pendaftar['dari_bersaudara']) ?>" class="w-full mt-1.5 border border-gray-400 text-gray-900 font-medium rounded-lg text-sm focus:ring-emerald-500 focus:border-emerald-500 shadow-sm py-2.5 px-3">
                                    </div>
                                </div>
                                <div>
                                    <label class="text-[11px] font-bold text-gray-500 uppercase">Program Pilihan</label>
                                    <select name="program_pilihan" class="w-full mt-1.5 border border-emerald-500 bg-emerald-50 text-emerald-800 font-bold rounded-lg text-sm focus:ring-emerald-600 focus:border-emerald-600 shadow-sm py-2.5 px-3">
                                        <option value="Kitab Kuning" <?= $pendaftar['program_pilihan'] == 'Kitab Kuning' ? 'selected' : '' ?>>Kitab Kuning</option>
                                        <option value="Tahfidz" <?= $pendaftar['program_pilihan'] == 'Tahfidz' ? 'selected' : '' ?>>Tahfidz</option>
                                    </select>
                                </div>
                                <div class="md:col-span-2 lg:col-span-3">
                                    <label class="text-[11px] font-bold text-gray-500 uppercase">Alamat Lengkap</label>
                                    <textarea name="alamat_lengkap" rows="2" class="w-full mt-1.5 border border-gray-400 text-gray-900 font-medium rounded-lg text-sm focus:ring-emerald-500 focus:border-emerald-500 shadow-sm py-2.5 px-3"><?= esc($pendaftar['alamat_lengkap']) ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-b border-gray-100">
                            <h4 class="text-sm font-bold text-emerald-700 uppercase tracking-widest mb-4">B. Data Pendidikan</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                
                                <div>
                                    <label class="text-[11px] font-bold text-gray-500 uppercase">Status Pendidikan</label>
                                    <select name="status_pendidikan" id="status_pendidikan" onchange="togglePendidikanFields()" class="w-full mt-1.5 border border-gray-400 text-gray-900 font-medium rounded-lg text-sm focus:ring-emerald-500 focus:border-emerald-500 shadow-sm py-2.5 px-3">
                                        <option value="Pelajar" <?= (($pendidikan['status_pendidikan'] ?? $pendidikan['status'] ?? '') == 'Pelajar') ? 'selected' : '' ?>>Pelajar</option>
                                        <option value="Mahasiswa" <?= (($pendidikan['status_pendidikan'] ?? $pendidikan['status'] ?? '') == 'Mahasiswa') ? 'selected' : '' ?>>Mahasiswa</option>
                                    </select>
                                </div>
                                
                                <div id="field_mahasiswa" class="md:col-span-2 <?= (($pendidikan['status_pendidikan'] ?? $pendidikan['status'] ?? '') == 'Mahasiswa') ? '' : 'hidden' ?>">
                                    <label class="text-[11px] font-bold text-gray-500 uppercase">Nama Perguruan Tinggi</label>
                                    <input type="text" name="nama_pt" id="input_nama_pt" value="<?= esc($pendidikan['nama_pt'] ?? '') ?>" class="w-full mt-1.5 border border-gray-400 text-gray-900 font-medium rounded-lg text-sm focus:ring-emerald-500 focus:border-emerald-500 shadow-sm py-2.5 px-3">
                                </div>

                                <div id="field_pelajar_1" class="<?= (($pendidikan['status_pendidikan'] ?? $pendidikan['status'] ?? '') == 'Mahasiswa') ? 'hidden' : '' ?>">
                                    <label class="text-[11px] font-bold text-gray-500 uppercase">NISN</label>
                                    <input type="number" name="nisn" id="input_nisn" value="<?= esc($pendidikan['nisn'] ?? '') ?>" class="w-full mt-1.5 border border-gray-400 text-gray-900 font-medium rounded-lg text-sm focus:ring-emerald-500 focus:border-emerald-500 shadow-sm py-2.5 px-3">
                                </div>
                                <div id="field_pelajar_2" class="<?= (($pendidikan['status_pendidikan'] ?? $pendidikan['status'] ?? '') == 'Mahasiswa') ? 'hidden' : '' ?>">
                                    <label class="text-[11px] font-bold text-gray-500 uppercase">Asal Sekolah</label>
                                    <input type="text" name="asal_sekolah" id="input_asal_sekolah" value="<?= esc($pendidikan['asal_sekolah'] ?? '') ?>" class="w-full mt-1.5 border border-gray-400 text-gray-900 font-medium rounded-lg text-sm focus:ring-emerald-500 focus:border-emerald-500 shadow-sm py-2.5 px-3">
                                </div>
                                <div id="field_pelajar_3" class="<?= (($pendidikan['status_pendidikan'] ?? $pendidikan['status'] ?? '') == 'Mahasiswa') ? 'hidden' : '' ?>">
                                    <label class="text-[11px] font-bold text-gray-500 uppercase">Kelas Terakhir</label>
                                    <input type="text" name="kelas_terakhir" id="input_kelas_terakhir" value="<?= esc($pendidikan['kelas_terakhir'] ?? '') ?>" class="w-full mt-1.5 border border-gray-400 text-gray-900 font-medium rounded-lg text-sm focus:ring-emerald-500 focus:border-emerald-500 shadow-sm py-2.5 px-3">
                                </div>
                                <div id="field_pelajar_4" class="<?= (($pendidikan['status_pendidikan'] ?? $pendidikan['status'] ?? '') == 'Mahasiswa') ? 'hidden' : '' ?>">
                                    <label class="text-[11px] font-bold text-gray-500 uppercase">Status Siswa</label>
                                    <select name="status_siswa" id="input_status_siswa" class="w-full mt-1.5 border border-gray-400 text-gray-900 font-medium rounded-lg text-sm focus:ring-emerald-500 focus:border-emerald-500 shadow-sm py-2.5 px-3">
                                        <option value="Siswa Baru" <?= ($pendidikan['status_siswa'] ?? '') == 'Siswa Baru' ? 'selected' : '' ?>>Siswa Baru</option>
                                        <option value="Siswa Pindahan" <?= ($pendidikan['status_siswa'] ?? '') == 'Siswa Pindahan' ? 'selected' : '' ?>>Siswa Pindahan</option>
                                    </select>
                                </div>
                                <div id="field_pelajar_5" class="<?= (($pendidikan['status_pendidikan'] ?? $pendidikan['status'] ?? '') == 'Mahasiswa') ? 'hidden' : '' ?>">
                                    <label class="text-[11px] font-bold text-gray-500 uppercase">Jenjang Didaftar</label>
                                    <select name="jenjang_pendidikan_didaftar" id="input_jenjang" class="w-full mt-1.5 border border-gray-400 text-gray-900 font-medium rounded-lg text-sm focus:ring-emerald-500 focus:border-emerald-500 shadow-sm py-2.5 px-3">
                                        <option value="SMP" <?= ($pendidikan['jenjang_pendidikan_didaftar'] ?? '') == 'SMP' ? 'selected' : '' ?>>SMP</option>
                                        <option value="SMA" <?= ($pendidikan['jenjang_pendidikan_didaftar'] ?? '') == 'SMA' ? 'selected' : '' ?>>SMA</option>
                                    </select>
                                </div>
                                <div id="field_pelajar_6" class="<?= (($pendidikan['status_pendidikan'] ?? $pendidikan['status'] ?? '') == 'Mahasiswa') ? 'hidden' : '' ?>">
                                    <label class="text-[11px] font-bold text-gray-500 uppercase">Sekolah Tujuan</label>
                                    <select name="nama_sekolah" id="input_sekolah_tujuan" class="w-full mt-1.5 border border-gray-400 text-gray-900 font-medium rounded-lg text-sm focus:ring-emerald-500 focus:border-emerald-500 shadow-sm py-2.5 px-3">
                                        <option value="SMP Al-Ikhlas" <?= ($pendidikan['nama_sekolah'] ?? '') == 'SMP Al-Ikhlas' ? 'selected' : '' ?>>SMP Al-Ikhlas</option>
                                        <option value="SMA Al-Ikhlas" <?= ($pendidikan['nama_sekolah'] ?? '') == 'SMA Al-Ikhlas' ? 'selected' : '' ?>>SMA Al-Ikhlas</option>
                                    </select>
                                </div>
                                
                                <div class="md:col-span-2 lg:col-span-3">
                                    <label class="text-[11px] font-bold text-gray-500 uppercase">Prestasi Akademik / Non-Akademik</label>
                                    <textarea name="prestasi" rows="2" class="w-full mt-1.5 border border-gray-400 text-gray-900 font-medium rounded-lg text-sm focus:ring-emerald-500 focus:border-emerald-500 shadow-sm py-2.5 px-3"><?= esc($pendidikan['prestasi'] ?? '') ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-b border-gray-100 bg-gray-50/50">
                            <h4 class="text-sm font-bold text-emerald-700 uppercase tracking-widest mb-4">C. Data Orang Tua / Wali</h4>
                            
                            <?php if(empty($ortu)): ?>
                                <p class="text-sm text-gray-500 italic">Data orang tua kosong.</p>
                            <?php else: ?>
                                <div class="space-y-6">
                                    <?php foreach ($ortu as $index => $o): ?>
                                        <div class="bg-white p-5 rounded-xl border border-gray-300 shadow-md">
                                            <p class="text-xs font-bold text-emerald-600 mb-3 border-b border-gray-100 pb-2">Orang Tua / Wali <?= $index + 1 ?></p>
                                            
                                            <input type="hidden" name="id_ortu[]" value="<?= $o['id'] ?? '' ?>">
                                            
                                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                                                <div>
                                                    <label class="text-[11px] font-bold text-gray-500 uppercase">Hubungan</label>
                                                    <select name="hubungan_ortu[]" class="w-full mt-1.5 border border-gray-400 text-gray-900 font-medium rounded-lg text-sm py-2.5 px-3">
                                                        <option value="Ayah" <?= ($o['hubungan'] ?? '') == 'Ayah' ? 'selected' : '' ?>>Ayah</option>
                                                        <option value="Ibu" <?= ($o['hubungan'] ?? '') == 'Ibu' ? 'selected' : '' ?>>Ibu</option>
                                                        <option value="Wali" <?= ($o['hubungan'] ?? '') == 'Wali' ? 'selected' : '' ?>>Wali</option>
                                                    </select>
                                                </div>
                                                <div>
                                                    <label class="text-[11px] font-bold text-gray-500 uppercase">Nama Lengkap</label>
                                                    <input type="text" name="nama_ortu[]" value="<?= esc($o['nama'] ?? '') ?>" class="w-full mt-1.5 border border-gray-400 text-gray-900 font-medium rounded-lg text-sm py-2.5 px-3">
                                                </div>
                                                <div>
                                                    <label class="text-[11px] font-bold text-gray-500 uppercase">Pekerjaan</label>
                                                    <input type="text" name="pekerjaan_ortu[]" value="<?= esc($o['pekerjaan'] ?? '') ?>" class="w-full mt-1.5 border border-gray-400 text-gray-900 font-medium rounded-lg text-sm py-2.5 px-3">
                                                </div>
                                                <div>
                                                    <label class="text-[11px] font-bold text-gray-500 uppercase">No. HP/WA</label>
                                                    <input type="text" name="no_hp_ortu[]" value="<?= esc($o['no_hp'] ?? '') ?>" class="w-full mt-1.5 border border-gray-400 text-gray-900 font-medium rounded-lg text-sm py-2.5 px-3">
                                                </div>
                                                <div>
                                                    <label class="text-[11px] font-bold text-gray-500 uppercase">Pendidikan</label>
                                                    <select name="pendidikan_ortu[]" class="w-full mt-1.5 border border-gray-400 text-gray-900 font-medium rounded-lg text-sm py-2.5 px-3">
                                                        <?php $p_opt = ['Tidak/Belum Sekolah', 'SD/Sederajat', 'SMP/Sederajat', 'SMA/SMK/Sederajat', 'D1/D2/D3', 'D4/S1', 'S2', 'S3']; ?>
                                                        <?php foreach($p_opt as $opt): ?>
                                                            <option value="<?= $opt ?>" <?= ($o['pendidikan'] ?? '') == $opt ? 'selected' : '' ?>><?= $opt ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div>
                                                    <label class="text-[11px] font-bold text-gray-500 uppercase">Pendapatan</label>
                                                    <select name="pendapatan_ortu[]" class="w-full mt-1.5 border border-gray-400 text-gray-900 font-medium rounded-lg text-sm py-2.5 px-3">
                                                        <option value="< 1 Juta" <?= ($o['pendapatan'] ?? '') == '< 1 Juta' ? 'selected' : '' ?>>< 1 Juta</option>
                                                        <option value="1 - 3 Juta" <?= ($o['pendapatan'] ?? '') == '1 - 3 Juta' ? 'selected' : '' ?>>1 - 3 Juta</option>
                                                        <option value="3 - 5 Juta" <?= ($o['pendapatan'] ?? '') == '3 - 5 Juta' ? 'selected' : '' ?>>3 - 5 Juta</option>
                                                        <option value="> 5 Juta" <?= ($o['pendapatan'] ?? '') == '> 5 Juta' ? 'selected' : '' ?>>> 5 Juta</option>
                                                    </select>
                                                </div>
                                                <div>
                                                    <label class="text-[11px] font-bold text-gray-500 uppercase">Status</label>
                                                    <select name="status_ortu[]" class="w-full mt-1.5 border border-gray-400 text-gray-900 font-medium rounded-lg text-sm py-2.5 px-3">
                                                        <option value="hidup" <?= ($o['status'] ?? '') == 'hidup' ? 'selected' : '' ?>>Hidup</option>
                                                        <option value="meninggal" <?= ($o['status'] ?? '') == 'meninggal' ? 'selected' : '' ?>>Meninggal</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="p-6">
                            <h4 class="text-sm font-bold text-emerald-700 uppercase tracking-widest mb-4">D. Data Kesehatan</h4>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div>
                                    <label class="text-[11px] font-bold text-gray-500 uppercase">Golongan Darah</label>
                                    <select name="gol_darah" class="w-full mt-1.5 border border-gray-400 text-gray-900 font-medium rounded-lg text-sm focus:ring-emerald-500 py-2.5 px-3">
                                        <option value="No" <?= ($kesehatan['gol_darah'] ?? '') == 'No' ? 'selected' : '' ?>>- Belum Tahu -</option>
                                        <option value="A" <?= ($kesehatan['gol_darah'] ?? '') == 'A' ? 'selected' : '' ?>>A</option>
                                        <option value="B" <?= ($kesehatan['gol_darah'] ?? '') == 'B' ? 'selected' : '' ?>>B</option>
                                        <option value="AB" <?= ($kesehatan['gol_darah'] ?? '') == 'AB' ? 'selected' : '' ?>>AB</option>
                                        <option value="O" <?= ($kesehatan['gol_darah'] ?? '') == 'O' ? 'selected' : '' ?>>O</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="text-[11px] font-bold text-gray-500 uppercase">Alergi Makanan / Obat</label>
                                    <input type="text" name="alergi" value="<?= esc($kesehatan['alergi'] ?? '') ?>" class="w-full mt-1.5 border border-gray-400 text-gray-900 font-medium rounded-lg text-sm focus:ring-emerald-500 py-2.5 px-3">
                                </div>
                                <div class="md:col-span-3">
                                    <label class="text-[11px] font-bold text-gray-500 uppercase">Riwayat Penyakit Berat</label>
                                    <textarea name="riwayat_penyakit" rows="2" class="w-full mt-1.5 border border-gray-400 text-gray-900 font-medium rounded-lg text-sm focus:ring-emerald-500 py-2.5 px-3"><?= esc($kesehatan['riwayat_penyakit'] ?? '') ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="p-6 bg-gray-50 flex justify-end">
                            <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white px-8 py-3 rounded-xl font-bold text-sm shadow-md transition transform hover:-translate-y-0.5 uppercase tracking-wide">
                                Simpan Semua Perubahan
                            </button>
                        </div>
                    </form>

                <?php else: ?>
                    <div class="p-0">
                        <div class="p-6 border-b border-gray-100 bg-gray-50/50">
                            <h4 class="text-sm font-bold text-emerald-700 uppercase tracking-widest mb-4">A. Data Diri & Akun</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-y-4 gap-x-8">
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
                                    <p class="text-[11px] font-bold text-gray-400 uppercase">NIK / No. KK</p>
                                    <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($pendaftar['nik'] ?? '-') ?> / <?= esc($pendaftar['no_kk'] ?? '-') ?></p>
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
                            <h4 class="text-sm font-bold text-emerald-700 uppercase tracking-widest mb-4">B. Data Pendidikan</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-y-4 gap-x-8">
                                <div>
                                    <p class="text-[11px] font-bold text-gray-400 uppercase">Status Pendidikan</p>
                                    <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($pendidikan['status_pendidikan'] ?? $pendidikan['status'] ?? '-') ?></p>
                                </div>
                                
                                <?php if (($pendidikan['status_pendidikan'] ?? $pendidikan['status'] ?? '') == 'Mahasiswa'): ?>
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
                                        <p class="text-[11px] font-bold text-gray-400 uppercase">Asal Sekolah / Kelas</p>
                                        <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($pendidikan['asal_sekolah'] ?? '-') ?> (Kelas <?= esc($pendidikan['kelas_terakhir'] ?? '-') ?>)</p>
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
                                <p class="text-sm text-gray-500 italic text-center py-4">- Data tidak ditemukan -</p>
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

                        <div class="p-6">
                            <h4 class="text-sm font-bold text-emerald-700 uppercase tracking-widest mb-4">D. Data Kesehatan</h4>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-y-4 gap-x-8">
                                <div>
                                    <p class="text-[11px] font-bold text-gray-400 uppercase">Golongan Darah</p>
                                    <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($kesehatan['gol_darah'] ?: '-') ?></p>
                                </div>
                                <div>
                                    <p class="text-[11px] font-bold text-gray-400 uppercase">Alergi Makanan / Obat</p>
                                    <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($kesehatan['alergi'] ?: 'Tidak ada') ?></p>
                                </div>
                                <div class="md:col-span-3">
                                    <p class="text-[11px] font-bold text-gray-400 uppercase">Riwayat Penyakit Berat</p>
                                    <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($kesehatan['riwayat_penyakit'] ?: 'Tidak ada') ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?php if ($mode == 'wawancara' || $mode == 'kelulusan'): ?>
            <div class="space-y-8">
                <?php if ($mode == 'wawancara'): ?>
                    <div class="bg-white rounded-xl shadow-lg border border-blue-100 overflow-hidden ring-1 ring-blue-500 sticky top-6">
                        <div class="px-6 py-4 bg-blue-600 text-white font-bold text-center uppercase tracking-wide text-sm flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Jadwal Wawancara
                        </div>
                        <form action="<?= base_url('admin/setJadwal') ?>" method="POST" class="p-6 space-y-5">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id_pendaftar" value="<?= $pendaftar['id_pendaftar'] ?>">

                            <div>
                                <label class="text-xs font-bold text-gray-500 uppercase block mb-1">Tanggal Tes</label>
                                <input type="date" name="tanggal" class="w-full border-gray-400 rounded-lg text-sm focus:ring-blue-500 shadow-sm py-2" required>
                            </div>
                            <div>
                                <label class="text-xs font-bold text-gray-500 uppercase block mb-1">Jam Pelaksanaan</label>
                                <input type="time" name="jam" class="w-full border-gray-400 rounded-lg text-sm focus:ring-blue-500 shadow-sm py-2" required>
                            </div>
                            <div>
                                <label class="text-xs font-bold text-gray-500 uppercase block mb-1">Lokasi / Link Meeting</label>
                                <input type="text" name="lokasi" class="w-full border-gray-400 rounded-lg text-sm focus:ring-blue-500 placeholder-gray-300 shadow-sm py-2" placeholder="Contoh: Gedung Utama Lt. 2 / Zoom..." required>
                            </div>
                            <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-bold text-sm shadow-md hover:bg-blue-700 transition-colors uppercase tracking-widest mt-2">Simpan Jadwal</button>
                        </form>
                    </div>

                <?php elseif ($mode == 'kelulusan'): ?>
                    <div class="bg-white rounded-xl shadow-lg border border-emerald-100 overflow-hidden ring-1 ring-emerald-500 sticky top-6">
                        <div class="px-6 py-4 bg-emerald-600 text-white font-bold text-center uppercase tracking-wide text-sm flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Putusan Seleksi Akhir
                        </div>
                        <form action="<?= base_url('admin/setKelulusan') ?>" method="POST" class="p-6 space-y-6">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id_pendaftar" value="<?= $pendaftar['id_pendaftar'] ?>">

                            <div class="flex flex-col gap-4">
                                <label class="flex items-center gap-3 p-4 border-2 rounded-xl cursor-pointer hover:bg-emerald-50 border-emerald-100 hover:border-emerald-300 transition-all group">
                                    <input type="radio" name="status_akhir" value="Lulus" class="text-emerald-600 focus:ring-emerald-500 h-5 w-5" required>
                                    <span class="text-sm font-black text-emerald-700 uppercase tracking-widest group-hover:text-emerald-800">LULUS SELEKSI</span>
                                </label>
                                <label class="flex items-center gap-3 p-4 border-2 rounded-xl cursor-pointer hover:bg-red-50 border-red-100 hover:border-red-300 transition-all group">
                                    <input type="radio" name="status_akhir" value="Tidak Lulus" class="text-red-600 focus:ring-red-500 h-5 w-5">
                                    <span class="text-sm font-black text-red-700 uppercase tracking-widest group-hover:text-red-800">TIDAK LULUS</span>
                                </label>
                            </div>
                            <button type="submit" onclick="return confirm('Apakah Anda yakin? Data akan dipindahkan ke Riwayat.')" class="w-full bg-emerald-600 text-white py-3.5 rounded-xl font-bold text-sm shadow-lg hover:bg-emerald-700 transition uppercase tracking-widest">Konfirmasi Hasil</button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

    </div>
</div>

<script>
    function togglePendidikanFields() {
        const status = document.getElementById('status_pendidikan').value;
        const fieldMahasiswa = document.getElementById('field_mahasiswa');
        const inputNamaPt = document.getElementById('input_nama_pt');
        
        const fieldsPelajar = [
            document.getElementById('field_pelajar_1'),
            document.getElementById('field_pelajar_2'),
            document.getElementById('field_pelajar_3'),
            document.getElementById('field_pelajar_4'),
            document.getElementById('field_pelajar_5'),
            document.getElementById('field_pelajar_6')
        ];

        const inputsPelajar = [
            document.getElementById('input_nisn'),
            document.getElementById('input_asal_sekolah'),
            document.getElementById('input_kelas_terakhir'),
            document.getElementById('input_status_siswa'),
            document.getElementById('input_jenjang'),
            document.getElementById('input_sekolah_tujuan')
        ];

        if (status === 'Mahasiswa') {
            fieldMahasiswa.classList.remove('hidden');
            fieldsPelajar.forEach(field => field.classList.add('hidden'));
            inputsPelajar.forEach(input => input.value = ''); 
        } else {
            fieldsPelajar.forEach(field => field.classList.remove('hidden'));
            fieldMahasiswa.classList.add('hidden');
            inputNamaPt.value = ''; 
        }
    }
</script>

<?= $this->endSection() ?>