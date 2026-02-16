<?= $this->extend('layout/pendaftar') ?>
<?= $this->section('content') ?>

<div class="max-w-5xl mx-auto">
    
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800">Pembayaran Pendaftaran</h2>
        <p class="text-gray-600 mt-1">Silakan selesaikan pembayaran untuk melanjutkan ke tahap pemberkasan.</p>
    </div>

    <?php 
        $status = $bayar['status_pembayaran'] ?? null; 
        $bukti  = $bayar['bukti_bayar'] ?? null;
        $ket    = $bayar['keterangan'] ?? '-';
    ?>

    <?php if($status == 'Diterima'): ?>
        <div class="bg-emerald-50 border border-emerald-200 rounded-2xl p-8 text-center max-w-2xl mx-auto">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-emerald-100 text-emerald-600 rounded-full mb-6">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
            <h3 class="text-2xl font-bold text-emerald-800 mb-2">Pembayaran Lunas!</h3>
            <p class="text-emerald-700 mb-8">Terima kasih, pembayaran Anda telah diverifikasi. Silakan lanjutkan untuk melengkapi berkas pendaftaran.</p>
            <a href="<?= base_url('pendaftar/berkas') ?>" class="inline-flex items-center gap-2 bg-emerald-600 text-white px-8 py-3 rounded-xl font-bold hover:bg-emerald-700 transition shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                Lanjut Unggah Berkas
            </a>
        </div>

    <?php elseif($status == 'Menunggu'): ?>
        <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-8 text-center max-w-2xl mx-auto">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-yellow-100 text-yellow-600 rounded-full mb-6 animate-pulse">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <h3 class="text-2xl font-bold text-yellow-800 mb-2">Sedang Diverifikasi</h3>
            <p class="text-yellow-700 mb-6">Bukti pembayaran Anda sudah kami terima dan sedang dalam antrian pengecekan Admin.</p>
            
            <?php if($bukti): ?>
                <div class="bg-white p-2 rounded-lg border border-yellow-200 inline-block shadow-sm">
                    <img src="<?= base_url('uploads/pembayaran/' . $bukti) ?>" class="h-40 w-auto rounded object-cover cursor-pointer" onclick="window.open(this.src)">
                    <p class="text-[10px] text-gray-400 mt-1 uppercase tracking-wide">Bukti Anda</p>
                </div>
            <?php endif; ?>
            <p class="text-xs text-yellow-600 mt-4">*Proses verifikasi maksimal 1x24 jam kerja.</p>
        </div>

    <?php else: ?>

        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">
            
            <div class="lg:col-span-3 space-y-6">
                
                <?php if($status == 'Ditolak'): ?>
                    <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg flex items-start gap-3">
                        <svg class="w-6 h-6 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <div>
                            <h4 class="font-bold text-red-800">Pembayaran Ditolak</h4>
                            <p class="text-sm text-red-700 mt-1">Alasan: <?= $ket ?></p>
                            <p class="text-xs text-red-600 mt-2 font-medium">Silakan upload ulang bukti yang valid.</p>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="bg-gradient-to-r from-emerald-600 to-teal-600 rounded-xl p-6 text-white shadow-lg relative overflow-hidden">
                    <div class="relative z-10">
                        <p class="text-emerald-100 text-sm font-medium mb-1">Total Biaya Pendaftaran</p>
                        <h3 class="text-3xl font-bold">Rp 200.000</h3>
                    </div>
                    <svg class="absolute right-0 bottom-0 h-32 w-32 text-white opacity-10 transform translate-x-4 translate-y-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.31-8.86c-1.77-.45-2.34-.94-2.34-1.67 0-.84.79-1.43 2.1-1.43 1.38 0 1.9.66 1.94 1.64h1.71c-.05-1.34-.87-2.57-2.49-2.97V5H10.9v1.69c-1.51.32-2.72 1.3-2.72 2.81 0 1.79 1.49 2.69 3.66 3.21 1.95.46 2.34 1.15 2.34 1.87 0 .53-.39 1.39-2.1 1.39-1.6 0-2.23-.72-2.32-1.64H8.04c.1 1.7 1.36 2.66 2.86 2.97V19h2.34v-1.67c1.52-.29 2.72-1.16 2.73-2.77-.01-2.2-1.9-2.96-3.66-3.42z"/></svg>
                </div>

                <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm">
                    <h4 class="font-bold text-gray-800 mb-4 text-sm uppercase tracking-wide text-gray-500">Rekening Tujuan</h4>
                    
                    <div class="space-y-3">
                        <div class="flex items-center gap-4 p-3 border border-gray-100 rounded-lg hover:bg-gray-50 transition group">
                            <div class="w-12 h-12 bg-white border rounded flex items-center justify-center p-1">
                                <span class="font-bold text-blue-700 text-xs">BCA</span>
                            </div>
                            <div>
                                <p class="text-lg font-bold text-gray-800 font-mono tracking-tight group-hover:text-emerald-600 transition">123-456-7890</p>
                                <p class="text-xs text-gray-500">Yayasan Ponpes Al-Ikhlas</p>
                            </div>
                            <button onclick="copyToClipboard('1234567890')" class="ml-auto text-xs text-gray-400 hover:text-emerald-600 font-medium bg-gray-100 hover:bg-emerald-50 px-2 py-1 rounded transition">Salin</button>
                        </div>

                        <div class="flex items-center gap-4 p-3 border border-gray-100 rounded-lg hover:bg-gray-50 transition group">
                            <div class="w-12 h-12 bg-white border rounded flex items-center justify-center p-1">
                                <span class="font-bold text-blue-500 text-xs">BRI</span>
                            </div>
                            <div>
                                <p class="text-lg font-bold text-gray-800 font-mono tracking-tight group-hover:text-emerald-600 transition">0000-01-0000-50-0</p>
                                <p class="text-xs text-gray-500">Yayasan Ponpes Al-Ikhlas</p>
                            </div>
                            <button onclick="copyToClipboard('0000010000500')" class="ml-auto text-xs text-gray-400 hover:text-emerald-600 font-medium bg-gray-100 hover:bg-emerald-50 px-2 py-1 rounded transition">Salin</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-md border border-gray-100 p-6 sticky top-6">
                    <h3 class="font-bold text-gray-800 mb-4">Konfirmasi Pembayaran</h3>
                    
                    <?php if(session()->getFlashdata('error')): ?>
                        <div class="bg-red-50 text-red-600 text-xs p-3 rounded mb-4"><?= session()->getFlashdata('error') ?></div>
                    <?php endif; ?>

                    <form action="<?= base_url('pendaftar/uploadPembayaran') ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        
                        <div class="mb-4">
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Upload Bukti Transfer</label>
                            
                            <label for="file-upload" class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-emerald-50 hover:border-emerald-400 transition relative overflow-hidden group">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6 z-10">
                                    <svg class="w-8 h-8 mb-2 text-gray-400 group-hover:text-emerald-500 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                    <p class="mb-1 text-xs text-gray-500 font-medium group-hover:text-emerald-600">Klik untuk upload</p>
                                    <p class="text-[10px] text-gray-400">JPG, PNG (Max 2MB)</p>
                                </div>
                                <img id="preview-img" class="absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity">
                                <input id="file-upload" name="bukti_bayar" type="file" class="hidden" accept="image/*" required onchange="previewFile(this)">
                            </label>
                        </div>

                        <button type="submit" class="w-full bg-emerald-600 text-white py-3 rounded-lg font-bold hover:bg-black transition shadow-lg text-sm flex items-center justify-center gap-2">
                            Kirim Bukti
                        </button>
                    </form>
                </div>
            </div>

        </div>

    <?php endif; ?>

</div>

<script>
    function previewFile(input) {
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e){
                const img = document.getElementById('preview-img');
                img.src = e.target.result;
                img.classList.remove('opacity-0');
            }
            reader.readAsDataURL(file);
        }
    }

    function copyToClipboard(text) {
        navigator.clipboard.writeText(text);
        alert('Nomor rekening disalin!');
    }
</script>

<?= $this->endSection() ?>