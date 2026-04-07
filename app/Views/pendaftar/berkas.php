<?= $this->extend('layout/pendaftar') ?>
<?= $this->section('content') ?>

<?php 
    $status_bayar = $pembayaran['status_pembayaran'] ?? 'Belum'; 
    $is_lunas = ($status_bayar == 'Diterima');
    $is_mahasiswa = ($pendidikan['status'] == 'Mahasiswa');

    $status_verifikasi = $berkas['status_berkas'] ?? 'Belum';
    $ket_verifikasi = $berkas['keterangan'] ?? '-';
?>

<div class="bg-white rounded-xl shadow-sm p-4 md:p-6">
    <div class="border-b pb-4 mb-6">
        <h3 class="text-lg font-bold text-gray-800">Kelengkapan Berkas</h3>
        <p class="text-sm text-gray-500">Unggah dokumen pendukung pendaftaran.</p>
    </div>

    <?php if (!$is_lunas): ?>
        
        <div class="text-center py-10 px-4 bg-gray-50 rounded-lg border-2 border-dashed border-gray-300">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-red-100 text-red-500 mb-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
            </div>
            
            <h3 class="text-xl font-bold text-gray-800 mb-2">Akses Terkunci</h3>
            
            <?php if ($status_bayar == 'Ditolak'): ?>
                <p class="text-red-600 mb-6 max-w-md mx-auto text-sm">
                    Pembayaran Anda <b>Ditolak</b>. Mohon lakukan pembayaran ulang.
                </p>
            <?php elseif ($status_bayar == 'Menunggu'): ?>
                <p class="text-yellow-600 mb-6 max-w-md mx-auto text-sm">
                    Pembayaran Anda sedang <b>Diverifikasi Admin</b>.
                </p>
            <?php else: ?>
                <p class="text-gray-600 mb-6 max-w-md mx-auto text-sm">
                    Anda belum menyelesaikan administrasi pembayaran.
                </p>
            <?php endif; ?>

            <a href="<?= base_url('pendaftar/pembayaran') ?>" class="w-full sm:w-auto inline-block bg-emerald-600 text-white px-6 py-2.5 rounded-lg font-bold hover:bg-emerald-700 transition shadow-lg text-sm">
                Ke Halaman Pembayaran
            </a>
        </div>

    <?php else: ?>

        <?php if($status_verifikasi == 'Diterima'): ?>
            <div class="bg-emerald-50 border border-emerald-200 rounded-2xl p-8 text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-emerald-100 text-emerald-600 rounded-full mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-emerald-800 mb-2">Berkas Lengkap & Valid!</h3>
                <p class="text-emerald-700">Seluruh dokumen persyaratan telah diperiksa dan disetujui oleh Admin.</p>
                <div class="mt-6">
                    <a href="<?= base_url('pendaftar/status') ?>" class="inline-flex items-center gap-2 bg-emerald-600 text-white px-6 py-2.5 rounded-lg font-bold hover:bg-emerald-700 transition shadow-md text-sm">
                        Cek Status Pendaftaran
                    </a>
                </div>
            </div>

        <?php elseif($status_verifikasi == 'Ditolak'): ?>
            <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg flex items-start gap-3 mb-6 animate-pulse">
                <svg class="w-6 h-6 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <div>
                    <h4 class="font-bold text-red-800">Berkas Perlu Perbaikan</h4>
                    <p class="text-sm text-red-700 mt-1">Catatan Admin: <strong><?= $ket_verifikasi ?></strong></p>
                    <p class="text-xs text-red-600 mt-2 font-medium">Silakan perbaiki dan upload ulang berkas yang diminta.</p>
                </div>
            </div>

        <?php elseif($status_verifikasi == 'Menunggu'): ?>
            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-r-lg mb-6 flex items-start gap-3">
                <svg class="w-6 h-6 text-yellow-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <div>
                    <h4 class="font-bold text-yellow-800">Sedang Diverifikasi</h4>
                    <p class="text-sm text-yellow-700 mt-1">Berkas Anda sedang dalam antrian pengecekan oleh Admin.</p>
                </div>
            </div>

        <?php else: ?>
            <div class="bg-green-50 text-green-800 p-4 rounded-lg mb-6 flex items-start gap-3">
                <svg class="w-5 h-5 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <div class="text-sm">
                    <span class="font-bold">Status Pembayaran Valid.</span> Silakan unggah berkas di bawah ini.
                </div>
            </div>
        <?php endif; ?>

        <?php if(session()->getFlashdata('success')): ?>
            <div class="bg-blue-100 text-blue-700 p-3 rounded mb-4 text-xs md:text-sm"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>
        
        <?php if(session()->getFlashdata('error')): ?>
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-xs md:text-sm"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <?php if($status_verifikasi != 'Diterima'): ?>
            <div class="space-y-8">
                <?php 
                    // PERBAIKAN: Susunan array berkas diubah, ktp_pendaftar dimasukkan langsung tanpa syarat if($is_mahasiswa)
                    $daftar_berkas = [
                        ['id' => 'akta_kelahiran', 'label' => 'Akta Kelahiran'],
                        ['id' => 'kartu_keluarga', 'label' => 'Kartu Keluarga (KK)'],
                        ['id' => 'ktp_ortu', 'label' => 'KTP Orang Tua / Wali'],
                        ['id' => 'ktp_pendaftar', 'label' => 'KTP / KTM Calon Santri', 'note' => 'KTP untuk mahasiswa, dan KTM untuk pelajar'],
                        ['id' => 'ijazah_raport', 'label' => 'Ijazah / Raport Terakhir'],
                        ['id' => 'pas_foto', 'label' => 'Pas Foto (3x4)', 'note' => 'Latar belakang merah/biru'],
                    ];

                    foreach($daftar_berkas as $row):
                ?>
                <div class="flex flex-col lg:flex-row lg:items-center justify-between border-b pb-6 gap-4">
                    <div class="max-w-xs">
                        <h4 class="font-bold text-gray-800 text-sm md:text-base"><?= $row['label'] ?> <span class="text-red-500">*</span></h4>
                        <?php if(isset($row['note'])): ?>
                            <p class="text-[10px] text-gray-500 leading-tight"><?= $row['note'] ?></p>
                        <?php endif; ?>
                        
                        <div class="mt-1">
                            <?php if(!empty($berkas[$row['id']])): ?>
                                <span class="text-xs flex items-center gap-1 font-bold <?= ($status_verifikasi == 'Ditolak') ? 'text-yellow-600' : 'text-emerald-600' ?>">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                    <?= ($status_verifikasi == 'Ditolak') ? 'Perlu Cek / Upload Ulang' : 'Terunggah' ?>
                                    <a href="<?= base_url('uploads/berkas/'.$berkas[$row['id']]) ?>" target="_blank" class="underline text-blue-500 ml-2 font-medium">Lihat Dokumen</a>
                                </span>
                            <?php else: ?>
                                <span class="text-[10px] bg-red-50 text-red-500 px-2 py-0.5 rounded-full border border-red-100">Belum diunggah</span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <form action="<?= base_url('pendaftar/uploadBerkas') ?>" method="POST" enctype="multipart/form-data" class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2">
                        <?= csrf_field() ?>
                        <input type="hidden" name="jenis_berkas" value="<?= $row['id'] ?>">
                        <input type="file" name="file_berkas" required class="block w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 transition">
                        <button type="submit" class="bg-emerald-600 text-white px-4 py-2 rounded-lg text-xs font-bold hover:bg-emerald-700 shadow-sm active:scale-95 transition">
                            <?= (!empty($berkas[$row['id']])) ? 'Ganti File' : 'Upload' ?>
                        </button>
                    </form>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    <?php endif; ?>
</div>

<?= $this->endSection() ?>