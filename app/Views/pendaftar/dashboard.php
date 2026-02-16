<?= $this->extend('layout/pendaftar') ?>

<?= $this->section('content') ?>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-emerald-500">
        <p class="text-sm text-gray-500 mb-1">Status Pendaftaran</p>
        <h3 class="text-2xl font-bold text-gray-800">Menunggu</h3>
    </div>
    
    <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-blue-500">
        <p class="text-sm text-gray-500 mb-1">Nomor Registrasi</p>
        <h3 class="text-2xl font-bold text-gray-800"><?= session()->get('no_registrasi') ?></h3>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-purple-500">
        <p class="text-sm text-gray-500 mb-1">Gelombang</p>
        <h3 class="text-2xl font-bold text-gray-800">1 (Satu)</h3>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm p-8 text-center">
    <h3 class="text-lg font-bold text-gray-800 mb-2">Selamat Datang, <?= session()->get('nama_lengkap') ?>!</h3>
    <p class="text-gray-600">Silakan lengkapi biodata dan unggah berkas melalui menu di samping untuk melanjutkan proses pendaftaran.</p>
</div>

<?= $this->endSection() ?>