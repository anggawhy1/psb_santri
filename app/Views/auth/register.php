<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="min-h-screen bg-slate-50 py-12 px-4 sm:px-6 lg:px-8 font-sans relative">
    <div class="max-w-5xl mx-auto">

        <div class="text-center mb-10">
            <a href="<?= base_url('/') ?>" class="inline-flex flex-col items-center group transition-transform hover:scale-105 duration-300">
                <img src="<?= base_url('images/logo.png') ?>" alt="Logo Pondok" class="h-20 w-auto mb-4 drop-shadow-md">
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                    Formulir Pendaftaran Santri Baru
                </h2>
                <h1 class="text-xl font-bold text-emerald-700 uppercase tracking-widest mt-2">
                    Pondok Pesantren Banyu Agung Ibnu Saut Bintoro
                </h1>
            </a>
            <div class="mt-4">
                <p class="text-slate-500 text-sm">Mohon isi data dengan lengkap dan benar. Tanda (<span class="text-red-500">*</span>) wajib diisi.</p>
            </div>
        </div>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-r-xl shadow-sm mb-8 animate-pulse">
                <div class="flex">
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">Terdapat kesalahan pada isian Anda:</h3>
                        <ul class="mt-2 list-disc list-inside text-sm text-red-700">
                            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('auth/attemptRegister') ?>" method="POST" class="space-y-10" id="formRegister">
            <?= csrf_field() ?>

            <div class="bg-white shadow-xl shadow-slate-200/50 rounded-2xl overflow-hidden border border-slate-100">
                <div class="bg-emerald-600 px-8 py-5 flex items-center gap-3">
                    <span class="bg-white/20 text-white font-bold px-3 py-1 rounded-lg text-sm">A</span>
                    <h3 class="text-lg font-bold text-white tracking-wide">Data Diri & Akun</h3>
                </div>

                <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Nama Lengkap (Sesuai Ijazah) <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_lengkap" value="<?= old('nama_lengkap') ?>" required class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm placeholder-slate-400" placeholder="Contoh: Ahmad Fauzan">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Email (Untuk Login) <span class="text-red-500">*</span></label>
                        <input type="email" name="email" value="<?= old('email') ?>" required class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm" placeholder="email@contoh.com">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Nomor WhatsApp <span class="text-red-500">*</span></label>
                        <input type="number" name="no_hp" value="<?= old('no_hp') ?>" required class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm" placeholder="081234567890">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">NIK <span class="text-red-500">*</span></label>
                        <input type="number" name="nik" value="<?= old('nik') ?>" required class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Nomor KK <span class="text-red-500">*</span></label>
                        <input type="number" name="no_kk" value="<?= old('no_kk') ?>" required class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Tempat Lahir <span class="text-red-500">*</span></label>
                        <input type="text" name="tempat_lahir" value="<?= old('tempat_lahir') ?>" required class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Tanggal Lahir <span class="text-red-500">*</span></label>
                        <input type="date" name="tanggal_lahir" value="<?= old('tanggal_lahir') ?>" required class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Jenis Kelamin <span class="text-red-500">*</span></label>
                        <select name="jenis_kelamin" required class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm">
                            <option value="" disabled selected>- Pilih Jenis Kelamin -</option>
                            <option value="L" <?= old('jenis_kelamin') == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                            <option value="P" <?= old('jenis_kelamin') == 'P' ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Anak Ke- <span class="text-red-500">*</span></label>
                            <input type="number" name="anak_ke" value="<?= old('anak_ke') ?>" required class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Dari (Sdr) <span class="text-red-500">*</span></label>
                            <input type="number" name="dari_bersaudara" value="<?= old('dari_bersaudara') ?>" required class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm">
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Program Pilihan <span class="text-red-500">*</span></label>
                        <select name="program_pilihan" required class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm">
                            <option value="" disabled selected>- Pilih Program -</option>
                            <option value="Kitab Kuning" <?= old('program_pilihan') == 'Kitab Kuning' ? 'selected' : '' ?>>Kitab Kuning (Madrasah Diniyah)</option>
                            <option value="Tahfidz" <?= old('program_pilihan') == 'Tahfidz' ? 'selected' : '' ?>>Tahfidzul Qur'an</option>
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Alamat Lengkap <span class="text-red-500">*</span></label>
                        <textarea name="alamat_lengkap" rows="3" required class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm" placeholder="Jalan, RT/RW, Kelurahan, Kecamatan, Kota/Kab..."><?= old('alamat_lengkap') ?></textarea>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-xl shadow-slate-200/50 rounded-2xl overflow-hidden border border-slate-100">
                <div class="bg-emerald-600 px-8 py-5 flex items-center gap-3">
                    <span class="bg-white/20 text-white font-bold px-3 py-1 rounded-lg text-sm">B</span>
                    <h3 class="text-lg font-bold text-white tracking-wide">Data Pendidikan</h3>
                </div>

                <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Status Pendidikan Saat Ini <span class="text-red-500">*</span></label>
                        <select name="status_pendidikan" id="status_pendidikan" required class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm font-bold text-emerald-800">
                            <option value="" disabled selected>- Pilih Status Pendidikan -</option>
                            <option value="Pelajar" <?= old('status_pendidikan') == 'Pelajar' ? 'selected' : '' ?>>Pelajar (Akan masuk SMP/SMA)</option>
                            <option value="Mahasiswa" <?= old('status_pendidikan') == 'Mahasiswa' ? 'selected' : '' ?>>Mahasiswa</option>
                        </select>
                    </div>

                    <div id="container_pelajar" class="hidden md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">NISN <span class="text-red-500">*</span></label>
                            <input type="number" name="nisn" id="nisn" value="<?= old('nisn') ?>" class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Asal Sekolah <span class="text-red-500">*</span></label>
                            <input type="text" name="asal_sekolah" id="asal_sekolah" value="<?= old('asal_sekolah') ?>" class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Kelas Terakhir <span class="text-red-500">*</span></label>
                            <input type="text" name="kelas_terakhir" id="kelas_terakhir" value="<?= old('kelas_terakhir') ?>" class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Status Siswa (Saat Mendaftar) <span class="text-red-500">*</span></label>
                            <select name="status_siswa" id="status_siswa" class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm">
                                <option value="" disabled selected>- Pilih -</option>
                                <option value="Siswa Baru" <?= old('status_siswa') == 'Siswa Baru' ? 'selected' : '' ?>>Siswa Baru</option>
                                <option value="Siswa Pindahan" <?= old('status_siswa') == 'Siswa Pindahan' ? 'selected' : '' ?>>Siswa Pindahan</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Daftar Jenjang (Saat Mendaftar)<span class="text-red-500">*</span></label>
                            <select name="jenjang_pendidikan_didaftar" id="jenjang_pendidikan_didaftar" class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm">
                                <option value="" disabled selected>- Pilih -</option>
                                <option value="SMP" <?= old('jenjang_pendidikan_didaftar') == 'SMP' ? 'selected' : '' ?>>SMP / MTs</option>
                                <option value="SMA" <?= old('jenjang_pendidikan_didaftar') == 'SMA' ? 'selected' : '' ?>>SMA / MA / SMK</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Sekolah Tujuan <span class="text-red-500">*</span></label>
                            <select name="nama_sekolah" id="nama_sekolah" class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm">
                                <option value="" disabled selected>- Pilih Sekolah -</option>
                                <option value="MTs Negeri 7 Bantul" <?= old('nama_sekolah') == 'MTs Negeri 7 Bantul' ? 'selected' : '' ?>>MTs Negeri 7 Bantul</option>
                                <option value="SMP Negeri 1 Piyungan" <?= old('nama_sekolah') == 'SMP Negeri 1 Piyungan' ? 'selected' : '' ?>>SMP Negeri 1 Piyungan</option>
                                <option value="SMP Negeri 2 Piyungan" <?= old('nama_sekolah') == 'SMP Negeri 2 Piyungan' ? 'selected' : '' ?>>SMP Negeri 2 Piyungan</option>
                                <option value="SMA Negeri 1 Piyungan" <?= old('nama_sekolah') == 'SMA Negeri 1 Piyungan' ? 'selected' : '' ?>>SMA Negeri 1 Piyungan</option>
                                <option value="Lainnya" <?= old('nama_sekolah') == 'Lainnya' ? 'selected' : '' ?>>Sekolah Terdekat Lainnya</option>
                            </select>
                        </div>
                    </div>

                    <div id="container_mahasiswa" class="hidden md:col-span-2">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Nama Perguruan Tinggi <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_pt" id="nama_pt" value="<?= old('nama_pt') ?>" class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm" placeholder="Masukkan nama kampus (Khusus Mahasiswa)">
                    </div>

                    <div class="md:col-span-2 mt-4 border-t border-slate-100 pt-6">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Prestasi (Opsional)</label>
                        <textarea name="prestasi" rows="2" class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm" placeholder="Sebutkan prestasi akademik/non-akademik jika ada..."><?= old('prestasi') ?></textarea>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-xl shadow-slate-200/50 rounded-2xl overflow-hidden border border-slate-100">
                <div class="bg-emerald-600 px-8 py-5 flex items-center gap-3">
                    <span class="bg-white/20 text-white font-bold px-3 py-1 rounded-lg text-sm">C</span>
                    <h3 class="text-lg font-bold text-white tracking-wide">Data Orang Tua / Wali</h3>
                </div>

                <div class="p-8">
                    <div id="parent-container" class="space-y-8">

                        <div class="parent-item bg-slate-50/50 p-6 rounded-2xl border border-slate-100 relative">
                            <div class="flex justify-between items-center mb-6 border-b border-slate-200 pb-3">
                                <h4 class="font-bold text-emerald-800 flex items-center gap-2 text-base">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Data Orang Tua / Wali <span class="parent-number bg-emerald-100 text-emerald-800 px-2 py-0.5 rounded-md ml-1">1</span>
                                </h4>
                                <div class="remove-btn-container"></div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Hubungan <span class="text-red-500">*</span></label>
                                    <select name="hubungan_ortu[]" required class="w-full border-slate-200 bg-white rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm">
                                        <option value="" disabled selected>- Pilih -</option>
                                        <option value="Ayah">Ayah</option>
                                        <option value="Ibu">Ibu</option>
                                        <option value="Wali">Wali</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                                    <input type="text" name="nama_ortu[]" required class="w-full border-slate-200 bg-white rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Pekerjaan <span class="text-red-500">*</span></label>
                                    <input type="text" name="pekerjaan_ortu[]" required class="w-full border-slate-200 bg-white rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Pendapatan <span class="text-red-500">*</span></label>
                                    <select name="pendapatan_ortu[]" required class="w-full border-slate-200 bg-white rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm">
                                        <option value="" disabled selected>- Range -</option>
                                        <option value="< 1 Juta">
                                            < 1 Juta</option>
                                        <option value="1 - 3 Juta">1 - 3 Juta</option>
                                        <option value="3 - 5 Juta">3 - 5 Juta</option>
                                        <option value="> 5 Juta">> 5 Juta</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Status <span class="text-red-500">*</span></label>
                                    <select name="status_ortu[]" required class="w-full border-slate-200 bg-white rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm">
                                        <option value="" disabled selected>- Pilih Status -</option>
                                        <option value="hidup">Hidup</option>
                                        <option value="meninggal">Meninggal</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">No. HP / WA</label>
                                    <input type="number" name="no_hp_ortu[]" class="w-full border-slate-200 bg-white rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm">
                                </div>

                                <div class="md:col-span-2">
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Pendidikan Terakhir <span class="text-red-500">*</span></label>
                                    <select name="pendidikan_ortu[]" required class="w-full border-slate-200 bg-white rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm">
                                        <option value="" disabled selected>- Pilih Pendidikan -</option>
                                        <option value="Tidak/Belum Sekolah">Tidak/Belum Sekolah</option>
                                        <option value="SD/Sederajat">SD/Sederajat</option>
                                        <option value="SMP/Sederajat">SMP/Sederajat</option>
                                        <option value="SMA/SMK/Sederajat">SMA/SMK/Sederajat</option>
                                        <option value="D1/D2/D3">D1/D2/D3</option>
                                        <option value="D4/S1">D4/S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 pt-6 flex justify-center border-t border-slate-100">
                        <button type="button" id="add-parent-btn" class="inline-flex items-center justify-center gap-2 bg-emerald-50 text-emerald-700 px-6 py-3 rounded-full font-bold text-sm hover:bg-emerald-100 transition border border-emerald-200 shadow-sm w-full md:w-auto">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                            </svg>
                            Tambah Form Orang Tua / Wali Lainnya
                        </button>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-xl shadow-slate-200/50 rounded-2xl overflow-hidden border border-slate-100">
                <div class="bg-emerald-600 px-8 py-5 flex items-center gap-3">
                    <span class="bg-white/20 text-white font-bold px-3 py-1 rounded-lg text-sm">D</span>
                    <h3 class="text-lg font-bold text-white tracking-wide">Data Kesehatan</h3>
                </div>
                <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Golongan Darah</label>
                        <select name="gol_darah" class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3">
                            <option value="No" selected>- Belum Tahu -</option>
                            <option value="A" <?= old('gol_darah') == 'A' ? 'selected' : '' ?>>A</option>
                            <option value="B" <?= old('gol_darah') == 'B' ? 'selected' : '' ?>>B</option>
                            <option value="AB" <?= old('gol_darah') == 'AB' ? 'selected' : '' ?>>AB</option>
                            <option value="O" <?= old('gol_darah') == 'O' ? 'selected' : '' ?>>O</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Alergi (Jika ada)</label>
                        <input type="text" name="alergi" value="<?= old('alergi') ?>" class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3" placeholder="Contoh: Udang, Debu...">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Riwayat Penyakit Berat</label>
                        <textarea name="riwayat_penyakit" rows="2" class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3" placeholder="Jika tidak ada, kosongkan saja"><?= old('riwayat_penyakit') ?></textarea>
                    </div>
                </div>
            </div>

            <div class="pt-6">
                <button type="button" id="btn-trigger-submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-black text-lg py-4 rounded-2xl shadow-lg shadow-emerald-200 hover:shadow-emerald-400 transition-all transform hover:-translate-y-1 uppercase tracking-widest">
                    Kirim Formulir Pendaftaran
                </button>
            </div>

            <div class="text-center">
                <p class="text-slate-500 text-sm">
                    Sudah punya akun?
                    <a href="<?= base_url('login') ?>" class="text-emerald-600 font-bold hover:underline hover:text-emerald-800">
                        Login disini
                    </a>
                </p>
            </div>

        </form>
    </div>

    <div id="confirmModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-full bg-emerald-100 sm:mx-0 sm:h-12 sm:w-12">
                                <svg class="h-6 w-6 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-xl font-bold leading-6 text-slate-900" id="modal-title">Konfirmasi Pendaftaran</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-slate-500">Apakah Anda yakin semua data yang diisikan sudah benar dan sesuai dengan dokumen asli? Data yang sudah dikirim tidak dapat diubah kembali oleh calon santri.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-slate-50 px-4 py-4 sm:flex sm:flex-row-reverse sm:px-6 gap-3 border-t border-slate-100">
                        <button type="button" id="btn-confirm-submit" class="inline-flex w-full justify-center rounded-xl bg-emerald-600 px-6 py-3 text-sm font-bold text-white shadow-sm hover:bg-emerald-700 sm:w-auto transition-colors">
                            Ya, Kirim Sekarang
                        </button>
                        <button type="button" id="btn-cancel-submit" class="mt-3 inline-flex w-full justify-center rounded-xl bg-white px-6 py-3 text-sm font-bold text-slate-700 shadow-sm ring-1 ring-inset ring-slate-300 hover:bg-slate-50 sm:mt-0 sm:w-auto transition-colors">
                            Cek Kembali
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        // --- LOGIKA FORM PENDIDIKAN (SHOW/HIDE) ---
        const statusSelect = document.getElementById('status_pendidikan');

        const containerPelajar = document.getElementById('container_pelajar');
        const containerMahasiswa = document.getElementById('container_mahasiswa');
        const inputPt = document.getElementById('nama_pt');
        const inputsPelajar = [
            'nisn', 'asal_sekolah', 'kelas_terakhir',
            'status_siswa', 'jenjang_pendidikan_didaftar', 'nama_sekolah'
        ];

        function toggleInputs() {
            if (statusSelect.value === 'Mahasiswa') {
                // Munculkan Form Mahasiswa
                containerMahasiswa.classList.remove('hidden');
                inputPt.disabled = false;
                inputPt.required = true;

                // Sembunyikan Form Pelajar secara total
                containerPelajar.classList.add('hidden');
                inputsPelajar.forEach(id => {
                    const el = document.getElementById(id);
                    if (el) {
                        el.disabled = true;
                        el.required = false;
                    }
                });

            } else if (statusSelect.value === 'Pelajar') {
                // Munculkan Form Pelajar
                containerPelajar.classList.remove('hidden');
                inputsPelajar.forEach(id => {
                    const el = document.getElementById(id);
                    if (el) {
                        el.disabled = false;
                        el.required = true;
                    }
                });

                // Sembunyikan Form Mahasiswa secara total
                containerMahasiswa.classList.add('hidden');
                inputPt.disabled = true;
                inputPt.required = false;
            } else {
                // Jika belum memilih apa-apa (kondisi awal)
                containerPelajar.classList.add('hidden');
                containerMahasiswa.classList.add('hidden');
                inputPt.disabled = true;
                inputsPelajar.forEach(id => {
                    const el = document.getElementById(id);
                    if (el) el.disabled = true;
                });
            }
        }

        if (statusSelect) {
            statusSelect.addEventListener('change', toggleInputs);
            toggleInputs(); // Jalankan saat pertama kali dimuat
        }


        // --- LOGIKA TAMBAH/HAPUS ORANG TUA ---
        const parentContainer = document.getElementById('parent-container');
        const addBtn = document.getElementById('add-parent-btn');

        function updateParentNumbers() {
            const items = parentContainer.querySelectorAll('.parent-item');
            items.forEach((item, index) => {
                const numberSpan = item.querySelector('.parent-number');
                if (numberSpan) {
                    numberSpan.innerText = index + 1;
                }
            });
        }

        addBtn.addEventListener('click', function() {
            const firstItem = parentContainer.querySelector('.parent-item');
            const template = firstItem.cloneNode(true);

            const inputs = template.querySelectorAll('input, select');
            inputs.forEach(input => {
                if (input.type !== 'hidden') {
                    if (input.tagName === 'SELECT') {
                        input.selectedIndex = 0;
                    } else {
                        input.value = '';
                    }
                }
            });

            template.classList.add('animate-fade-in');

            const btnContainer = template.querySelector('.remove-btn-container');
            btnContainer.innerHTML = `
                <button type="button" class="remove-parent-btn inline-flex items-center gap-1.5 text-red-500 hover:text-red-700 hover:bg-red-50 px-3 py-1.5 rounded-lg text-sm font-bold transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    Hapus
                </button>
            `;

            parentContainer.appendChild(template);
            updateParentNumbers();
        });

        parentContainer.addEventListener('click', function(e) {
            const removeBtn = e.target.closest('.remove-parent-btn');
            if (removeBtn) {
                const parentItem = removeBtn.closest('.parent-item');
                parentItem.remove();
                updateParentNumbers();
            }
        });


        // --- LOGIKA MODAL KONFIRMASI SUBMIT ---
        const formRegister = document.getElementById('formRegister');
        const btnTrigger = document.getElementById('btn-trigger-submit');
        const modal = document.getElementById('confirmModal');
        const btnCancel = document.getElementById('btn-cancel-submit');
        const btnConfirm = document.getElementById('btn-confirm-submit');

        // Saat tombol hijau "Kirim Formulir" ditekan
        btnTrigger.addEventListener('click', function() {
            // Cek dulu apakah semua input wajib (required) sudah diisi
            if (!formRegister.checkValidity()) {
                // Jika belum valid, munculkan peringatan bawaan browser
                formRegister.reportValidity();
                return;
            }
            // Jika sudah valid, tampilkan Modal Konfirmasi
            modal.classList.remove('hidden');
        });

        // Saat tombol "Cek Kembali" di dalam modal ditekan
        btnCancel.addEventListener('click', function() {
            modal.classList.add('hidden'); // Sembunyikan modal
        });

        // Saat tombol "Ya, Kirim Sekarang" ditekan
        btnConfirm.addEventListener('click', function() {
            // Ubah teks tombol biar gak di-klik dua kali
            btnConfirm.innerText = 'Mengirim...';
            btnConfirm.disabled = true;

            // Submit form beneran ke Controller
            formRegister.submit();
        });

    });
</script>

<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fadeIn 0.3s ease-out forwards;
    }
</style>

<?= $this->endSection() ?>