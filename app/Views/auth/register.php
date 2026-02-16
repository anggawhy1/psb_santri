<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="min-h-screen bg-slate-50 py-12 px-4 sm:px-6 lg:px-8 font-sans">
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

                    <div class="input-pelajar md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">NISN <span class="text-red-500 req-pelajar">*</span></label>
                            <input type="number" name="nisn" id="nisn" value="<?= old('nisn') ?>" class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Asal Sekolah <span class="text-red-500 req-pelajar">*</span></label>
                            <input type="text" name="asal_sekolah" id="asal_sekolah" value="<?= old('asal_sekolah') ?>" class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Kelas Terakhir <span class="text-red-500 req-pelajar">*</span></label>
                            <input type="text" name="kelas_terakhir" id="kelas_terakhir" value="<?= old('kelas_terakhir') ?>" class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Status Siswa <span class="text-red-500 req-pelajar">*</span></label>
                            <select name="status_siswa" id="status_siswa" class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm">
                                <option value="" disabled selected>- Pilih -</option>
                                <option value="Siswa Baru" <?= old('status_siswa') == 'Siswa Baru' ? 'selected' : '' ?>>Siswa Baru</option>
                                <option value="Siswa Pindahan" <?= old('status_siswa') == 'Siswa Pindahan' ? 'selected' : '' ?>>Siswa Pindahan</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Daftar Jenjang <span class="text-red-500 req-pelajar">*</span></label>
                            <select name="jenjang_pendidikan_didaftar" id="jenjang_pendidikan_didaftar" class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm">
                                <option value="" disabled selected>- Pilih -</option>
                                <option value="SMP" <?= old('jenjang_pendidikan_didaftar') == 'SMP' ? 'selected' : '' ?>>SMP / MTs</option>
                                <option value="SMA" <?= old('jenjang_pendidikan_didaftar') == 'SMA' ? 'selected' : '' ?>>SMA / MA / SMK</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Sekolah Tujuan <span class="text-red-500 req-pelajar">*</span></label>
                            <select name="nama_sekolah" id="nama_sekolah" class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm">
                                <option value="" disabled selected>- Pilih -</option>
                                <option value="SMP Al-Ikhlas" <?= old('nama_sekolah') == 'SMP Al-Ikhlas' ? 'selected' : '' ?>>SMP Islam Banyu Agung</option>
                                <option value="SMA Al-Ikhlas" <?= old('nama_sekolah') == 'SMA Al-Ikhlas' ? 'selected' : '' ?>>MA Banyu Agung</option>
                            </select>
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Nama Perguruan Tinggi <span class="text-red-500 req-mhs hidden">*</span></label>
                        <input type="text" name="nama_pt" id="nama_pt" value="<?= old('nama_pt') ?>" disabled class="w-full border-slate-300 bg-gray-200 text-gray-500 rounded-xl px-4 py-3 transition shadow-sm" placeholder="Masukkan nama kampus (Khusus Mahasiswa)">
                    </div>

                    <div class="md:col-span-2">
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
                        
                        <div class="parent-item">
                            <h4 class="font-bold text-emerald-800 mb-6 flex items-center gap-2 text-base border-b border-slate-100 pb-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Data Orang Tua / Wali 1
                            </h4>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Hubungan <span class="text-red-500">*</span></label>
                                    <select name="hubungan_ortu[]" required class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm">
                                        <option value="" disabled selected>- Pilih -</option>
                                        <option value="Ayah">Ayah</option>
                                        <option value="Ibu">Ibu</option>
                                        <option value="Wali">Wali</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                                    <input type="text" name="nama_ortu[]" required class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Pekerjaan <span class="text-red-500">*</span></label>
                                    <input type="text" name="pekerjaan_ortu[]" required class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Pendapatan <span class="text-red-500">*</span></label>
                                    <select name="pendapatan_ortu[]" required class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm">
                                        <option value="" disabled selected>- Range -</option>
                                        <option value="< 1 Juta">< 1 Juta</option>
                                        <option value="1 - 3 Juta">1 - 3 Juta</option>
                                        <option value="3 - 5 Juta">3 - 5 Juta</option>
                                        <option value="> 5 Juta">> 5 Juta</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Status <span class="text-red-500">*</span></label>
                                    <select name="status_ortu[]" required class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm">
                                        <option value="" disabled selected>- Pilih Status -</option>
                                        <option value="hidup">Hidup</option>
                                        <option value="meninggal">Meninggal</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">No. HP / WA</label>
                                    <input type="number" name="no_hp_ortu[]" class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3 transition shadow-sm">
                                </div>

                                <input type="hidden" name="pendidikan_ortu[]" value="-">
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 border-t border-slate-100 pt-6">
                        <button type="button" id="add-parent-btn" class="inline-flex items-center gap-2 bg-white text-emerald-700 px-5 py-3 rounded-xl font-bold text-sm hover:bg-emerald-50 transition border-2 border-emerald-100 shadow-sm hover:shadow-md">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                            </svg>
                            Tambah Data Wali Lain
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
                <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-black text-lg py-4 rounded-2xl shadow-lg shadow-emerald-200 hover:shadow-emerald-400 transition-all transform hover:-translate-y-1 uppercase tracking-widest">
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
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const statusSelect = document.getElementById('status_pendidikan');
        const namaPtInput = document.getElementById('nama_pt');
        const reqPelajar = document.querySelectorAll('.req-pelajar');
        const reqMhs = document.querySelectorAll('.req-mhs');

        const inputPelajarIds = [
            'nisn', 'asal_sekolah', 'kelas_terakhir',
            'status_siswa', 'jenjang_pendidikan_didaftar', 'nama_sekolah'
        ];

        function toggleInputs() {
            if (statusSelect.value === 'Mahasiswa') {
                namaPtInput.disabled = false;
                namaPtInput.required = true;
                namaPtInput.classList.remove('bg-gray-200', 'text-gray-500');
                namaPtInput.classList.add('bg-white', 'text-slate-900');
                reqMhs.forEach(el => el.classList.remove('hidden'));
                reqPelajar.forEach(el => el.classList.add('hidden'));
                inputPelajarIds.forEach(id => {
                    const el = document.getElementById(id);
                    if (el) {
                        el.disabled = true;
                        el.required = false;
                        el.classList.add('bg-gray-100', 'text-gray-400');
                        el.classList.remove('bg-white');
                    }
                });
            } else if (statusSelect.value === 'Pelajar') {
                namaPtInput.disabled = true;
                namaPtInput.required = false;
                namaPtInput.classList.add('bg-gray-200', 'text-gray-500');
                namaPtInput.classList.remove('bg-white', 'text-slate-900');
                reqMhs.forEach(el => el.classList.add('hidden'));
                reqPelajar.forEach(el => el.classList.remove('hidden'));
                inputPelajarIds.forEach(id => {
                    const el = document.getElementById(id);
                    if (el) {
                        el.disabled = false;
                        el.required = true;
                        el.classList.remove('bg-gray-100', 'text-gray-400');
                        el.classList.add('bg-white');
                    }
                });
            }
        }

        statusSelect.addEventListener('change', toggleInputs);
        toggleInputs();

        const parentContainer = document.getElementById('parent-container');
        const addBtn = document.getElementById('add-parent-btn');
        let parentCount = 1;

        addBtn.addEventListener('click', function() {
            parentCount++;
            const template = parentContainer.querySelector('.parent-item').cloneNode(true);
            template.querySelector('h4').innerHTML = `
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                Data Orang Tua / Wali ${parentCount}`;
            const inputs = template.querySelectorAll('input, select');
            inputs.forEach(input => {
                if (input.type !== 'hidden') input.value = '';
            });
            parentContainer.appendChild(template);
        });
    });
</script>

<?= $this->endSection() ?>