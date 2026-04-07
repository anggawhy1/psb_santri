<?= $this->extend('layout/pendaftar') ?>
<?= $this->section('content') ?>

<?php
// Mencegah error jika variabel belum dikirim dari controller
$pendaftar  = $pendaftar ?? [];
$pendidikan = $pendidikan ?? [];
$kesehatan  = $kesehatan ?? [];
$ortu       = $ortu ?? [];

// Helper Variables untuk menentukan Tahapan Saat Ini
$status_akhir     = $pendaftar['status_akhir'] ?? 'Menunggu';
$status_bayar     = $bayar['status_pembayaran'] ?? 'Belum';
$status_berkas    = $berkas['status_berkas'] ?? 'Belum';
$status_wawancara = $jadwal['status_wawancara'] ?? 'Belum';

// Logika penentuan tahapan
$tahapan_saat_ini = 'Pembayaran Biaya'; // Default
if ($status_akhir == 'Lulus' || $status_akhir == 'Tidak Lulus') {
    $tahapan_saat_ini = 'Selesai';
} elseif (!empty($jadwal) && $status_wawancara != 'Belum') {
    $tahapan_saat_ini = 'Wawancara Dijadwalkan';
} elseif ($status_berkas == 'Diterima') {
    $tahapan_saat_ini = 'Menunggu Jadwal';
} elseif ($status_berkas == 'Menunggu' || $status_berkas == 'Ditolak') {
    $tahapan_saat_ini = 'Verifikasi Berkas';
} elseif ($status_bayar == 'Diterima') {
    $tahapan_saat_ini = 'Upload Berkas';
} elseif ($status_bayar == 'Menunggu' || $status_bayar == 'Ditolak') {
    $tahapan_saat_ini = 'Verifikasi Pembayaran';
}
?>

<div class="max-w-7xl mx-auto space-y-8">

    <div class="bg-gradient-to-r from-emerald-700 to-teal-600 rounded-2xl shadow-lg p-8 text-white relative overflow-hidden flex flex-col md:flex-row items-center justify-between gap-6">
        <div class="relative z-10 w-full">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-2">
                <p class="text-emerald-200 font-medium tracking-wider text-sm uppercase">Portal Calon Santri</p>
                <div class="bg-white/20 backdrop-blur-sm px-4 py-1.5 rounded-full text-xs font-bold border border-white/30 inline-block">
                    Tahun Ajaran: <?= esc($tahun_psb) ?>
                </div>
            </div>
            <h2 class="text-3xl font-extrabold mb-2">Selamat Datang, <?= esc(session()->get('nama_lengkap') ?? $pendaftar['nama_lengkap'] ?? 'Pendaftar') ?>!</h2>
            <p class="text-emerald-50 text-sm max-w-xl leading-relaxed">
                Ini adalah halaman utama Anda. Pastikan seluruh data di bawah ini sudah benar. Jika ada kesalahan, silakan hubungi panitia pendaftaran.
            </p>
        </div>
        <svg class="absolute right-0 top-0 h-64 w-64 text-white opacity-10 transform translate-x-16 -translate-y-16 pointer-events-none" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z" />
        </svg>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

        <div class="bg-white py-8 px-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col items-center justify-center text-center">
            <div class="w-14 h-14 mb-4 bg-blue-50 text-blue-500 rounded-full flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                </svg>
            </div>
            <p class="text-[11px] font-bold text-gray-400 uppercase tracking-widest">Nomor Registrasi</p>
            <h3 class="text-xl font-black text-gray-800 mt-1.5"><?= esc($pendaftar['no_registrasi'] ?? session()->get('no_registrasi') ?? '-') ?></h3>
        </div>

        <a href="<?= base_url('pendaftar/status') ?>" class="bg-white py-8 px-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col items-center justify-center text-center hover:shadow-md hover:border-purple-200 hover:-translate-y-1 transition-all group cursor-pointer relative overflow-hidden">
            <div class="w-14 h-14 mb-4 bg-purple-50 text-purple-500 rounded-full flex items-center justify-center group-hover:bg-purple-500 group-hover:text-white transition-all duration-300 shadow-sm z-10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                </svg>
            </div>
            <p class="text-[11px] font-bold text-gray-400 uppercase tracking-widest group-hover:text-purple-600 transition-colors z-10">Tahapan Saat Ini</p>
            <h3 class="text-lg font-black text-gray-800 mt-1.5 leading-snug z-10"><?= $tahapan_saat_ini ?></h3>
        </a>

        <?php
        $statusColor = 'text-yellow-500 bg-yellow-50';
        $statusText = 'Seleksi Aktif';
        $borderColor = 'bg-yellow-500';

        if (($pendaftar['status_akhir'] ?? '') == 'Lulus') {
            $statusColor = 'text-emerald-500 bg-emerald-50';
            $statusText = 'Lulus Seleksi';
            $borderColor = 'bg-emerald-500';
        } elseif (($pendaftar['status_akhir'] ?? '') == 'Tidak Lulus') {
            $statusColor = 'text-red-500 bg-red-50';
            $statusText = 'Tidak Lulus';
            $borderColor = 'bg-red-500';
        }
        ?>
        <div class="bg-white py-8 px-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col items-center justify-center text-center relative overflow-hidden">
            <div class="absolute bottom-0 left-0 w-full h-1.5 <?= $borderColor ?>"></div>

            <div class="w-14 h-14 mb-4 <?= $statusColor ?> rounded-full flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <p class="text-[11px] font-bold text-gray-400 uppercase tracking-widest">Status Kelulusan</p>
            <h3 class="text-xl font-black text-gray-800 mt-1.5"><?= $statusText ?></h3>
        </div>

    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100 flex items-center gap-3">
            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <h3 class="font-bold text-gray-800 text-lg">Data Formulir</h3>
        </div>

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
                        <p class="text-sm font-semibold text-emerald-600 mt-0.5"><?= esc($pendaftar['program_pilihan'] ?? '-') ?></p>
                    </div>
                    <div class="md:col-span-2 lg:col-span-3">
                        <p class="text-[11px] font-bold text-gray-400 uppercase">Alamat Lengkap</p>
                        <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($pendaftar['alamat_lengkap'] ?? '-') ?></p>
                    </div>
                </div>
            </div>

            <div class="p-6 border-b border-gray-100">
                <h4 class="text-sm font-bold text-emerald-700 uppercase tracking-widest mb-4">B. Data Pendidikan</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-y-4 gap-x-8">
                    <div>
                        <p class="text-[11px] font-bold text-gray-400 uppercase">Status Pendidikan</p>
                        <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($pendidikan['status'] ?? '-') ?></p>
                    </div>

                    <?php if (($pendidikan['status_pendidikan'] ?? '') == 'Mahasiswa'): ?>
                        <div class="md:col-span-2">
                            <p class="text-[11px] font-bold text-gray-400 uppercase">Nama Perguruan Tinggi</p>
                            <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($pendidikan['nama_pt'] ?? '-') ?></p>
                        </div>
                    <?php else: ?>
                        <div>
                            <p class="text-[11px] font-bold text-gray-400 uppercase">NISN</p>
                            <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($pendidikan['nisn'] ?? '-') ?></p>
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
                        <p class="text-[11px] font-bold text-gray-400 uppercase">Prestasi</p>
                        <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($pendidikan['prestasi'] ?? '-') ?></p>
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
                            <div class="bg-white p-4 rounded-xl border border-gray-200">
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
                                        <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($o['no_hp'] ?? '-') ?></p>
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
                        <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($kesehatan['gol_darah'] ?? '-') ?></p>
                    </div>
                    <div>
                        <p class="text-[11px] font-bold text-gray-400 uppercase">Alergi</p>
                        <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($kesehatan['alergi'] ?? '-') ?></p>
                    </div>
                    <div class="md:col-span-3">
                        <p class="text-[11px] font-bold text-gray-400 uppercase">Riwayat Penyakit</p>
                        <p class="text-sm font-semibold text-gray-800 mt-0.5"><?= esc($kesehatan['riwayat_penyakit'] ?? '-') ?></p>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<?= $this->endSection() ?>