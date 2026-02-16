<?= $this->extend('layout/pendaftar') ?>
<?= $this->section('content') ?>

<?php
    // Helper Variables
    $status_akhir = $pendaftar['status_akhir']; // Menunggu, Lulus, Tidak Lulus
    
    $status_bayar = $bayar['status_pembayaran'] ?? 'Belum';
    $status_berkas = $berkas['status_berkas'] ?? 'Belum';
    $status_wawancara = $jadwal['status_wawancara'] ?? 'Belum';
?>

<div class="max-w-4xl mx-auto space-y-6">

    <?php if($status_akhir == 'Lulus'): ?>
        <div class="bg-green-600 rounded-xl shadow-lg p-8 text-center text-white">
            <h2 class="text-3xl font-extrabold mb-2">SELAMAT!</h2>
            <p class="text-lg">Anda dinyatakan <span class="font-bold bg-white text-green-600 px-2 py-1 rounded">LULUS</span> seleksi penerimaan santri baru.</p>
            <p class="mt-4 text-sm opacity-90">Silakan lakukan daftar ulang sesuai informasi yang dikirim via WhatsApp.</p>
        </div>
    <?php elseif($status_akhir == 'Tidak Lulus'): ?>
        <div class="bg-red-600 rounded-xl shadow-lg p-8 text-center text-white">
            <h2 class="text-3xl font-extrabold mb-2">MOHON MAAF</h2>
            <p class="text-lg">Anda dinyatakan <span class="font-bold bg-white text-red-600 px-2 py-1 rounded">TIDAK LULUS</span> seleksi.</p>
            <p class="mt-4 text-sm opacity-90">Tetap semangat dan jangan putus asa.</p>
        </div>
    <?php endif; ?>


    <div class="bg-white rounded-xl shadow-sm p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-6 border-b pb-2">Tahapan Pendaftaran</h3>
        
        <div class="relative pl-4 border-l-2 border-gray-200 space-y-8">
            
            <div class="relative">
                <div class="absolute -left-[21px] bg-green-500 h-10 w-10 rounded-full flex items-center justify-center text-white border-4 border-white shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <div class="ml-6">
                    <h4 class="font-bold text-gray-800 text-lg">Pendaftaran Akun</h4>
                    <p class="text-sm text-gray-500">Akun berhasil dibuat. Data diri awal tersimpan.</p>
                    <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded mt-1 inline-block">Selesai</span>
                </div>
            </div>

            <div class="relative">
                <?php if($status_bayar == 'Diterima'): ?>
                    <div class="absolute -left-[21px] bg-green-500 h-10 w-10 rounded-full flex items-center justify-center text-white border-4 border-white shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                <?php elseif($status_bayar == 'Ditolak'): ?>
                     <div class="absolute -left-[21px] bg-red-500 h-10 w-10 rounded-full flex items-center justify-center text-white border-4 border-white shadow-sm">
                        <span class="font-bold">X</span>
                    </div>
                <?php else: ?>
                    <div class="absolute -left-[21px] bg-yellow-400 h-10 w-10 rounded-full flex items-center justify-center text-white border-4 border-white shadow-sm">
                        <span class="font-bold text-xs">...</span>
                    </div>
                <?php endif; ?>

                <div class="ml-6">
                    <h4 class="font-bold text-gray-800 text-lg">Pembayaran Biaya</h4>
                    <?php if($status_bayar == 'Diterima'): ?>
                        <p class="text-sm text-gray-500">Pembayaran lunas dan terverifikasi.</p>
                        <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded mt-1 inline-block">Selesai</span>
                    <?php elseif($status_bayar == 'Menunggu'): ?>
                        <p class="text-sm text-gray-500">Sedang menunggu verifikasi admin.</p>
                        <span class="text-xs bg-yellow-100 text-yellow-700 px-2 py-1 rounded mt-1 inline-block">Proses</span>
                    <?php elseif($status_bayar == 'Ditolak'): ?>
                        <p class="text-sm text-red-500">Pembayaran ditolak. Silakan upload ulang.</p>
                        <span class="text-xs bg-red-100 text-red-700 px-2 py-1 rounded mt-1 inline-block">Gagal</span>
                    <?php else: ?>
                         <p class="text-sm text-gray-500">Menunggu pembayaran santri.</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="relative">
                <?php if($status_berkas == 'Diterima'): ?>
                    <div class="absolute -left-[21px] bg-green-500 h-10 w-10 rounded-full flex items-center justify-center text-white border-4 border-white shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                <?php elseif($status_berkas == 'Ditolak'): ?>
                     <div class="absolute -left-[21px] bg-red-500 h-10 w-10 rounded-full flex items-center justify-center text-white border-4 border-white shadow-sm">X</div>
                <?php else: ?>
                    <div class="absolute -left-[21px] bg-gray-300 h-10 w-10 rounded-full flex items-center justify-center text-white border-4 border-white shadow-sm">
                         <span class="font-bold text-xs">3</span>
                    </div>
                <?php endif; ?>

                <div class="ml-6">
                    <h4 class="font-bold text-gray-800 text-lg">Verifikasi Berkas</h4>
                    <?php if($status_berkas == 'Diterima'): ?>
                        <p class="text-sm text-gray-500">Seluruh dokumen telah diverifikasi.</p>
                        <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded mt-1 inline-block">Valid</span>
                    <?php elseif($status_berkas == 'Menunggu'): ?>
                        <p class="text-sm text-gray-500">Berkas sudah diupload, menunggu cek admin.</p>
                        <span class="text-xs bg-yellow-100 text-yellow-700 px-2 py-1 rounded mt-1 inline-block">Menunggu</span>
                    <?php else: ?>
                        <p class="text-sm text-gray-500">Menunggu kelengkapan dokumen.</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="relative">
                <?php if($jadwal): ?>
                    <div class="absolute -left-[21px] bg-blue-500 h-10 w-10 rounded-full flex items-center justify-center text-white border-4 border-white shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                <?php else: ?>
                    <div class="absolute -left-[21px] bg-gray-300 h-10 w-10 rounded-full flex items-center justify-center text-white border-4 border-white shadow-sm">
                         <span class="font-bold text-xs">4</span>
                    </div>
                <?php endif; ?>

                <div class="ml-6">
                    <h4 class="font-bold text-gray-800 text-lg">Jadwal Wawancara</h4>
                    <?php if($jadwal): ?>
                        <div class="bg-blue-50 p-3 rounded-lg mt-2 border border-blue-100">
                            <p class="text-sm"><strong>Tanggal:</strong> <?= date('d F Y, H:i', strtotime($jadwal['tanggal_wawancara'])) ?> WIB</p>
                            <p class="text-sm mt-1"><strong>Status:</strong> <?= $jadwal['status_wawancara'] ?></p>
                            <?php if($jadwal['tautan_video']): ?>
                                 <a href="<?= $jadwal['tautan_video'] ?>" target="_blank" class="block mt-2 text-sm text-blue-600 underline font-bold">Link Zoom / Meet</a>
                            <?php else: ?>
                                 <p class="text-xs text-gray-500 mt-1">Lokasi: Kantor Sekretariat PSB</p>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <p class="text-sm text-gray-500">Jadwal wawancara belum ditentukan oleh admin.</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="relative">
                <?php if($status_akhir != 'Menunggu'): ?>
                    <div class="absolute -left-[21px] bg-green-500 h-10 w-10 rounded-full flex items-center justify-center text-white border-4 border-white shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                <?php else: ?>
                    <div class="absolute -left-[21px] bg-gray-300 h-10 w-10 rounded-full flex items-center justify-center text-white border-4 border-white shadow-sm">
                         <span class="font-bold text-xs">5</span>
                    </div>
                <?php endif; ?>

                <div class="ml-6">
                    <h4 class="font-bold text-gray-800 text-lg">Selesai</h4>
                    <?php if($status_akhir == 'Lulus'): ?>
                        <p class="text-sm text-green-600 font-medium">Selamat! Seluruh tahapan selesai dan Anda dinyatakan Lulus.</p>
                    <?php elseif($status_akhir == 'Tidak Lulus'): ?>
                        <p class="text-sm text-red-600 font-medium">Tahapan selesai. Mohon maaf, Anda belum dapat bergabung saat ini.</p>
                    <?php else: ?>
                        <p class="text-sm text-gray-500">Menunggu keputusan akhir dari panitia seleksi.</p>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</div>

<?php if(session()->getFlashdata('error')): ?>
    <script>alert("<?= session()->getFlashdata('error') ?>");</script>
<?php endif; ?>

<?= $this->endSection() ?>