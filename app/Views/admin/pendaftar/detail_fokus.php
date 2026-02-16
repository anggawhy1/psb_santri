<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="max-w-5xl mx-auto space-y-6 pb-20">

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
                <span class="text-xs font-bold text-gray-400 uppercase mb-1">Tahapan Saat Ini</span>
                <div class="bg-emerald-50 text-emerald-700 px-4 py-1 rounded-full border border-emerald-100 font-bold tracking-wide text-sm">
                    <?= strtoupper($mode) ?>
                </div>
            </div>
        </div>
    </div>

    <?php if ($mode == 'pembayaran'): ?>

        <div class="bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden transition-all hover:shadow-xl">

            <div class="p-8 grid grid-cols-1 lg:grid-cols-2 gap-10">

                <div class="space-y-5">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="h-10 w-10 bg-amber-50 text-amber-600 rounded-xl flex items-center justify-center border border-amber-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-slate-800">Bukti Transfer</h3>
                            <p class="text-xs text-slate-500">Lampiran foto atau tangkapan layar</p>
                        </div>
                    </div>

                    <?php if (!empty($pembayaran['bukti_bayar'])): ?>
                        <div class="relative group rounded-xl overflow-hidden border border-slate-200 shadow-sm bg-slate-50">
                            <div class="aspect-auto max-h-[500px] w-full flex items-center justify-center p-2">
                                <img src="<?= base_url('uploads/pembayaran/' . $pembayaran['bukti_bayar']) ?>" class="max-w-full h-auto object-contain cursor-zoom-in group-hover:scale-105 transition-transform duration-500" onclick="window.open(this.src)">
                            </div>

                            <div class="absolute inset-0 bg-slate-900/30 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center pointer-events-none">
                                <span class="bg-white/90 backdrop-blur-sm text-slate-800 px-4 py-2 rounded-full text-xs font-semibold shadow-lg transform translate-y-2 group-hover:translate-y-0 transition-transform">
                                    Klik untuk memperbesar
                                </span>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="h-64 bg-slate-50 border-2 border-dashed border-slate-300 rounded-xl flex flex-col items-center justify-center text-slate-400 gap-3">
                            <svg class="w-10 h-10 opacity-40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p class="text-sm font-medium">Pendaftar belum mengunggah berkas</p>
                        </div>
                    <?php endif; ?>
                </div>


                <div class="flex flex-col justify-center">

                    <div class="mb-6">
                        <h3 class="text-xl font-bold text-slate-800">Konfirmasi Pembayaran</h3>
                        <p class="text-sm text-slate-500 mt-1">Validasi bukti transfer yang dikirimkan pendaftar.</p>
                    </div>

                    <?php if (($pembayaran['status_pembayaran'] ?? '') != 'Diterima'): ?>

                        <form id="formAksi" action="<?= base_url('admin/verifikasiPembayaran') ?>" method="POST" class="space-y-5">
                            <input type="hidden" name="id_pendaftar" value="<?= $pendaftar['id_pendaftar'] ?>">

                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-slate-700">Status Verifikasi</label>
                                <div class="relative">
                                    <select name="status" id="status_bayar" onchange="toggleAlasan('status_bayar', 'alasan_bayar')" class="w-full appearance-none border border-slate-300 rounded-xl px-4 py-3 pr-8 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 text-sm font-medium text-slate-700 bg-white shadow-sm transition">
                                        <option value="Menunggu" <?= ($pembayaran['status_pembayaran'] ?? '') == 'Menunggu' ? 'selected' : '' ?>>⏳ Menunggu Verifikasi</option>
                                        <option value="Diterima">✅ Terima / Lunas</option>
                                        <option value="Ditolak" <?= ($pembayaran['status_pembayaran'] ?? '') == 'Ditolak' ? 'selected' : '' ?>>❌ Tolak / Salah</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-500">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div id="alasan_bayar" class="<?= ($pembayaran['status_pembayaran'] ?? '') == 'Ditolak' ? '' : 'hidden' ?> animate-fadeIn">
                                <label class="block text-sm font-semibold text-red-600 mb-2">Alasan Penolakan <span class="text-red-400">*</span></label>
                                <textarea name="keterangan" rows="3"
                                    class="w-full border border-red-200 bg-red-50 rounded-xl px-4 py-3 text-sm text-slate-700 focus:ring-2 focus:ring-red-500 focus:border-red-500 placeholder-red-300/80 font-light"
                                    placeholder="Contoh: Bukti transfer tidak terbaca atau nominal tidak sesuai..."><?= (strpos(strtolower($pembayaran['keterangan'] ?? ''), 'menunggu') !== false) ? '' : esc($pembayaran['keterangan'] ?? '') ?></textarea>
                            </div>

                            <div class="pt-2">
                                <button type="button" onclick="openModalKonfirmasi()" class="w-full bg-amber-500 text-white font-bold py-3.5 rounded-xl hover:bg-amber-600 transition-all shadow-md hover:shadow-lg active:scale-95 text-sm tracking-wide">
                                    Simpan Verifikasi
                                </button>
                            </div>
                        </form>

                    <?php else: ?>

                        <div class="bg-emerald-50 border border-emerald-100 p-8 rounded-2xl text-center shadow-sm">
                            <div class="inline-flex h-16 w-16 bg-emerald-100 text-emerald-600 rounded-full items-center justify-center mb-4 ring-4 ring-emerald-50">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <h4 class="text-lg font-bold text-emerald-800">Pembayaran Diterima</h4>
                            <p class="text-emerald-600 text-sm mt-2 leading-relaxed">
                                Transaksi ini telah divalidasi.<br>Status keuangan santri sudah <strong>Lunas</strong>.
                            </p>
                        </div>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    <?php endif; ?>

    <?php if ($mode == 'berkas'): ?>
        <div class="bg-white rounded-3xl shadow-xl border border-slate-100 overflow-hidden">
            <div class="p-8">
                <div class="flex items-center gap-4 mb-8 border-b border-gray-50 pb-6">
                    <div class="h-12 w-12 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center shadow-sm ring-1 ring-purple-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800 text-lg tracking-tight">Verifikasi Berkas Digital</h3>
                        <p class="text-sm text-gray-500 font-medium">Periksa validitas dan kelengkapan dokumen pendaftar.</p>
                    </div>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 mb-10">
                    <?php
                    $listBerkas = ['akta_kelahiran', 'kartu_keluarga', 'ktp_ortu', 'ktp_pendaftar', 'ijazah_raport', 'pas_foto'];
                    foreach ($listBerkas as $b):
                    ?>
                        <div class="p-4 border border-gray-200 rounded-2xl bg-gray-50/50 text-center group transition-all duration-300 hover:bg-white hover:shadow-lg hover:border-purple-200 hover:-translate-y-1">
                            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3 truncate px-1 group-hover:text-purple-600">
                                <?= str_replace('_', ' ', $b) ?>
                            </p>

                            <?php if (!empty($berkas[$b])): ?>
                                <a href="<?= base_url('uploads/berkas/' . $berkas[$b]) ?>" target="_blank" class="h-14 w-14 bg-white text-purple-600 border border-purple-100 rounded-2xl flex items-center justify-center mx-auto shadow-sm group-hover:bg-purple-600 group-hover:text-white transition-all duration-300 group-hover:scale-110">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </a>
                            <?php else: ?>
                                <div class="h-14 w-14 bg-gray-100 text-gray-300 rounded-2xl flex items-center justify-center mx-auto border border-gray-200 border-dashed">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
                                    </svg>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <?php if (($berkas['status_berkas'] ?? '') != 'Diterima'): ?>
                    <form id="formAksi" action="<?= base_url('admin/verifikasiBerkas') ?>" method="POST" class="bg-slate-50 p-6 rounded-3xl border border-slate-200/60 shadow-sm space-y-6">
                        <input type="hidden" name="id_pendaftar" value="<?= $pendaftar['id_pendaftar'] ?>">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-end">
                            <div>
                                <label class="text-xs font-bold text-gray-500 uppercase tracking-wider ml-1 mb-2 block">Status Kelengkapan</label>
                                <div class="relative">
                                    <select name="status" id="status_berkas" onchange="toggleAlasan('status_berkas', 'alasan_berkas')" class="w-full bg-white border border-gray-300 text-gray-700 font-semibold rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 h-12 pl-4 pr-10 shadow-sm appearance-none transition-all cursor-pointer">
                                        <option value="Menunggu" <?= ($berkas['status_berkas'] ?? '') == 'Menunggu' ? 'selected' : '' ?>>⏳ Menunggu Verifikasi</option>
                                        <option value="Diterima">✅ Berkas Lengkap & Valid</option>
                                        <option value="Ditolak" <?= ($berkas['status_berkas'] ?? '') == 'Ditolak' ? 'selected' : '' ?>>❌ Berkas Salah / Tidak Lengkap</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <button type="button" onclick="openModalKonfirmasi()" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-3.5 rounded-xl transition-all shadow-md shadow-purple-200 hover:shadow-purple-300 uppercase tracking-wider text-sm active:scale-95">
                                Simpan Verifikasi
                            </button>
                        </div>

                        <div id="alasan_berkas" class="<?= ($berkas['status_berkas'] ?? '') == 'Ditolak' ? '' : 'hidden' ?> animate-fadeIn">
                            <label class="text-xs font-bold text-red-500 uppercase tracking-wider ml-1 mb-2 block">Keterangan Ditolak</label>
                            <textarea name="keterangan" rows="3"
                                class="w-full border-gray-300 rounded-xl p-4 text-sm text-gray-700 focus:ring-2 focus:ring-red-500 focus:border-red-500 shadow-sm placeholder-gray-400"
                                placeholder="Contoh: Pas foto harus berlatar belakang merah, scan ijazah kurang jelas..."><?= (strpos(strtolower($berkas['keterangan'] ?? ''), 'menunggu') !== false) ? '' : esc($berkas['keterangan'] ?? '') ?></textarea>
                        </div>
                    </form>
                <?php else: ?>
                    <div class="bg-emerald-50 border border-emerald-100 p-8 rounded-3xl text-center shadow-sm animate-fadeIn">
                        <div class="h-16 w-16 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h4 class="font-bold text-emerald-900 text-xl tracking-tight mb-1">Administrasi Berkas Selesai</h4>
                        <p class="text-emerald-700 text-sm font-medium">Seluruh dokumen telah diverifikasi dan dinyatakan valid oleh sistem.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($mode == 'wawancara'): ?>
        <div class="bg-white rounded-3xl shadow-xl border border-slate-100 overflow-hidden">
            <div class="p-8 max-w-3xl mx-auto">

                <div class="text-center mb-10">
                    <div class="h-16 w-16 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-sm ring-1 ring-blue-100">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-800 text-2xl tracking-tight mb-2">Penjadwalan Seleksi</h3>
                    <p class="text-gray-500 text-sm font-medium">Atur jadwal ujian masuk santri. Notifikasi akan dikirimkan otomatis.</p>
                </div>

                <form id="formAksi" action="<?= base_url('admin/setJadwal') ?>" method="POST" class="space-y-8 bg-slate-50 p-8 rounded-3xl border border-slate-200/60">
                    <input type="hidden" name="id_pendaftar" value="<?= $pendaftar['id_pendaftar'] ?>">

                    <?php
                    $tgl = '';
                    $jam = '';
                    if (!empty($jadwal['tanggal_wawancara'])) {
                        $dt = new DateTime($jadwal['tanggal_wawancara']);
                        $tgl = $dt->format('Y-m-d');
                        $jam = $dt->format('H:i');
                    }
                    ?>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="text-xs font-bold text-gray-500 uppercase tracking-wider ml-1 mb-2 block">Hari & Tanggal</label>
                            <input type="date" name="tanggal" value="<?= $tgl ?>" class="w-full bg-white border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm h-12 px-4 font-semibold text-gray-700 transition-all" required>
                        </div>
                        <div>
                            <label class="text-xs font-bold text-gray-500 uppercase tracking-wider ml-1 mb-2 block">Waktu Pelaksanaan</label>
                            <input type="time" name="jam" value="<?= $jam ?>" class="w-full bg-white border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm h-12 px-4 font-semibold text-gray-700 transition-all" required>
                        </div>
                    </div>

                    <div>
                        <label class="text-xs font-bold text-gray-500 uppercase tracking-wider ml-1 mb-2 block">Lokasi Ujian / Tautan Zoom</label>
                        <input type="text" name="lokasi" value="<?= esc($jadwal['tautan_video'] ?? '') ?>" class="w-full bg-white border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm h-12 px-4 font-medium text-gray-700 placeholder-gray-400 transition-all" placeholder="Contoh: Masukkan Link Meeting" required>
                    </div>

                    <div class="pt-2">
                        <button type="button" onclick="openModalKonfirmasi()" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-xl transition-all shadow-md shadow-blue-200 hover:shadow-blue-300 uppercase tracking-wider text-sm active:scale-95 transform hover:-translate-y-0.5">
                            <?= !empty($jadwal) ? 'Perbarui Jadwal' : 'Simpan & Publikasikan' ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($mode == 'kelulusan'): ?>
        <div class="bg-white rounded-3xl shadow-xl border border-slate-100 overflow-hidden">
            <div class="p-10 max-w-3xl mx-auto">

                <div class="text-center mb-10">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-slate-50 text-slate-600 rounded-2xl mb-4 shadow-sm border border-slate-100">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-slate-800 text-2xl tracking-tight mb-2">Keputusan Seleksi Akhir</h3>
                    <p class="text-slate-500 text-sm font-medium">Langkah ini akan menentukan status penerimaan santri. Mohon tinjau dengan seksama.</p>
                </div>

                <form id="formAksi" action="<?= base_url('admin/setKelulusan') ?>" method="POST" class="space-y-8">
                    <input type="hidden" name="id_pendaftar" value="<?= $pendaftar['id_pendaftar'] ?>">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <label onclick="hideAlasanLulus()" class="relative flex flex-col items-center p-8 border-2 rounded-3xl cursor-pointer transition-all duration-300 border-slate-100 hover:border-emerald-200 hover:bg-emerald-50/50 group has-[:checked]:border-emerald-500 has-[:checked]:bg-emerald-50 has-[:checked]:shadow-lg has-[:checked]:shadow-emerald-100">
                            <input type="radio" name="status_akhir" value="Lulus" class="peer sr-only" required>

                            <div class="h-16 w-16 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>

                            <span class="font-bold text-emerald-700 text-xl tracking-tight">LULUS</span>
                            <span class="text-xs text-emerald-600/70 mt-1 font-medium text-center">Diterima menjadi Santri</span>

                            <div class="absolute top-4 right-4 opacity-0 peer-checked:opacity-100 transition-all duration-300 transform peer-checked:scale-100 scale-50">
                                <div class="bg-emerald-500 text-white rounded-full p-1 shadow-md">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </label>

                        <label onclick="showAlasanLulus()" class="relative flex flex-col items-center p-8 border-2 rounded-3xl cursor-pointer transition-all duration-300 border-slate-100 hover:border-red-200 hover:bg-red-50/50 group has-[:checked]:border-red-500 has-[:checked]:bg-red-50 has-[:checked]:shadow-lg has-[:checked]:shadow-red-100">
                            <input type="radio" name="status_akhir" value="Tidak Lulus" class="peer sr-only">

                            <div class="h-16 w-16 bg-red-100 text-red-600 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </div>

                            <span class="font-bold text-red-700 text-xl tracking-tight">TIDAK LULUS</span>
                            <span class="text-xs text-red-600/70 mt-1 font-medium text-center">Belum Memenuhi Syarat</span>

                            <div class="absolute top-4 right-4 opacity-0 peer-checked:opacity-100 transition-all duration-300 transform peer-checked:scale-100 scale-50">
                                <div class="bg-red-500 text-white rounded-full p-1 shadow-md">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </label>
                    </div>

                    <div id="alasan_lulus" class="hidden animate-fadeIn">
                        <div class="bg-red-50 p-6 rounded-2xl border border-red-100">
                            <label class="text-xs font-bold text-red-500 uppercase tracking-wider mb-2 block ml-1">Alasan Penolakan</label>
                            <textarea name="keterangan" rows="4"
                                class="w-full bg-white border-red-200 rounded-xl text-sm text-slate-700 focus:ring-2 focus:ring-red-500 focus:border-red-500 shadow-sm placeholder-gray-400 p-4 transition-all"
                                placeholder="Tuliskan alasan mengapa calon santri tidak lulus seleksi..."><?= esc($pendaftar['keterangan'] ?? '') ?></textarea>
                        </div>
                    </div>

                    <button type="button" onclick="openModalKonfirmasi()" class="w-full bg-emerald-600 text-white font-bold py-4 rounded-xl shadow-lg hover:bg-emerald-700 transition-all transform active:scale-95 text-sm uppercase tracking-widest hover:shadow-xl">
                        Simpan & Publikasikan
                    </button>
                </form>
            </div>
        </div>
    <?php endif; ?>

</div>

<div id="modalKonfirmasi" class="fixed inset-0 z-[100] hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex min-h-screen items-center justify-center p-4 text-center sm:p-0">
        <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-md transition-opacity" onclick="closeModalKonfirmasi()"></div>

        <div class="relative transform overflow-hidden rounded-[32px] bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-md animate-popIn border border-gray-100">
            <div class="bg-white px-6 pb-6 pt-10 text-center">
                <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-3xl bg-emerald-50 text-emerald-600 mb-6 shadow-sm">
                    <svg class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-black text-gray-900 uppercase tracking-tighter" id="modal-title">Lanjutkan Aksi?</h3>
                <div class="mt-3">
                    <p class="text-sm text-gray-500 leading-relaxed font-medium">Data yang Anda simpan akan segera diproses dan tidak dapat dibatalkan melalui antrian ini.</p>
                </div>
            </div>
            <div class="bg-gray-50/50 px-8 py-6 flex flex-col gap-3">
                <button type="button" onclick="submitFormAksi()" class="w-full bg-slate-900 text-white py-4 rounded-2xl text-sm font-black uppercase tracking-widest hover:bg-black transition-all shadow-xl shadow-slate-200">Ya, Saya Yakin</button>
                <button type="button" onclick="closeModalKonfirmasi()" class="w-full bg-white text-gray-500 py-3 rounded-2xl text-xs font-bold hover:text-gray-800 transition-colors border border-transparent hover:border-gray-200">Batalkan</button>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleAlasan(selectId, alasanId) {
        const selectElement = document.getElementById(selectId);
        const alasanDiv = document.getElementById(alasanId);
        const textarea = alasanDiv.querySelector('textarea'); // Ambil textarea di dalamnya

        if (selectElement.value === 'Ditolak') {
            alasanDiv.classList.remove('hidden');

            // Logika tambahan: Jika isinya mengandung kata 'menunggu', kosongkan agar placeholder muncul
            if (textarea.value.toLowerCase().includes('menunggu')) {
                textarea.value = '';
            }
        } else {
            alasanDiv.classList.add('hidden');
        }
    }

    function showAlasanLulus() {
        document.getElementById('alasan_lulus').classList.remove('hidden');
    }

    function hideAlasanLulus() {
        document.getElementById('alasan_lulus').classList.add('hidden');
    }

    // Logika Modal Konfirmasi
    function openModalKonfirmasi() {
        document.getElementById('modalKonfirmasi').classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Lock scroll
    }

    function closeModalKonfirmasi() {
        document.getElementById('modalKonfirmasi').classList.add('hidden');
        document.body.style.overflow = 'auto'; // Unlock scroll
    }

    function submitFormAksi() {
        document.getElementById('formAksi').submit();
    }
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

    @keyframes popIn {
        from {
            opacity: 0;
            transform: scale(0.95) translateY(10px);
        }

        to {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }

    .animate-fadeIn {
        animation: fadeIn 0.4s ease-out forwards;
    }

    .animate-popIn {
        animation: popIn 0.3s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
    }

    /* Custom Scrollbar for better looks */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: transparent;
    }

    ::-webkit-scrollbar-thumb {
        background: #e2e8f0;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #cbd5e1;
    }
</style>

<?= $this->endSection() ?>