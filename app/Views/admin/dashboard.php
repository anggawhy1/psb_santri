<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
    <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-blue-500">
        <p class="text-gray-500 text-sm">Total Pendaftar</p>
        <h3 class="text-2xl font-bold">0</h3>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-yellow-500">
        <p class="text-gray-500 text-sm">Menunggu Verifikasi</p>
        <h3 class="text-2xl font-bold">0</h3>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-green-500">
        <p class="text-gray-500 text-sm">Diterima</p>
        <h3 class="text-2xl font-bold">0</h3>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-red-500">
        <p class="text-gray-500 text-sm">Ditolak</p>
        <h3 class="text-2xl font-bold">0</h3>
    </div>
</div>

<div class="bg-white rounded-lg shadow-sm p-6">
    <h3 class="font-bold text-lg mb-4">Selamat Datang di Panel Admin</h3>
    <p>Silakan gunakan menu di samping untuk mengelola konten website dan data pendaftaran santri baru.</p>
</div>

<?= $this->endSection() ?>