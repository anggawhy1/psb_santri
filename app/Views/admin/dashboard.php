<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<?php
$wait_bayar = $wait_bayar ?? 0;
$wait_berkas = $wait_berkas ?? 0;
$wait_wawancara = $wait_wawancara ?? 0;
$wait_hasil = $wait_hasil ?? 0;

$total_pendaftar = $total_pendaftar ?? 0;
$total_lulus = $total_lulus ?? 0;
$total_ditolak = $total_ditolak ?? 0;
?>

<div class="max-w-7xl mx-auto space-y-8">

    <div class="bg-gradient-to-r from-emerald-800 to-teal-600 rounded-2xl shadow-lg p-8 text-white relative overflow-hidden flex items-center justify-between">
        <div class="relative z-10">
            <p class="text-emerald-200 font-medium tracking-wider text-sm mb-1 uppercase">Portal Administrator</p>
            <h2 class="text-3xl font-extrabold mb-2">Selamat Datang, <?= session()->get('nama_lengkap') ?? 'Admin' ?>!</h2>
            <p class="text-emerald-50 text-sm max-w-xl leading-relaxed">
                Pantau antrian verifikasi dan kelola proses penerimaan santri baru secara real-time.
            </p>
        </div>
        <svg class="absolute right-0 top-0 h-48 w-48 text-white opacity-10 transform translate-x-10 -translate-y-10" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 2L2 22h20L12 2zm0 3.83L17.17 18H6.83L12 5.83zM11 16h2v2h-2v-2zm0-7h2v5h-2V9z" />
        </svg>
    </div>

    <div>
        <h3 class="text-gray-800 font-bold text-lg mb-4 flex items-center gap-2">
            <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            Antrian Tugas Admin
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">

            <a href="<?= base_url('admin/pendaftar?status_pembayaran=Menunggu') ?>" class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md hover:border-amber-200 transition group block">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wide group-hover:text-amber-600 transition">Cek Pembayaran</p>
                        <h3 class="text-3xl font-black text-gray-800 mt-2"><?= $wait_bayar ?></h3>
                    </div>
                    <div class="h-12 w-12 bg-amber-50 text-amber-500 rounded-xl flex items-center justify-center group-hover:scale-110 group-hover:bg-amber-500 group-hover:text-white transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                        </svg>
                    </div>
                </div>
            </a>

            <a href="<?= base_url('admin/pendaftar?status_berkas=Menunggu') ?>" class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md hover:border-purple-200 transition group block">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wide group-hover:text-purple-600 transition">Cek Berkas</p>
                        <h3 class="text-3xl font-black text-gray-800 mt-2"><?= $wait_berkas ?></h3>
                    </div>
                    <div class="h-12 w-12 bg-purple-50 text-purple-500 rounded-xl flex items-center justify-center group-hover:scale-110 group-hover:bg-purple-500 group-hover:text-white transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                </div>
            </a>

            <a href="<?= base_url('admin/pendaftar?status_wawancara=Belum') ?>" class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md hover:border-blue-200 transition group block">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wide group-hover:text-blue-600 transition">Atur Jadwal</p>
                        <h3 class="text-3xl font-black text-gray-800 mt-2"><?= $wait_wawancara ?></h3>
                    </div>
                    <div class="h-12 w-12 bg-blue-50 text-blue-500 rounded-xl flex items-center justify-center group-hover:scale-110 group-hover:bg-blue-500 group-hover:text-white transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>
            </a>

            <a href="<?= base_url('admin/pendaftar?status_wawancara=Dijadwalkan') ?>" class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md hover:border-rose-200 transition group block">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wide group-hover:text-rose-600 transition">Tentukan Hasil</p>
                        <h3 class="text-3xl font-black text-gray-800 mt-2"><?= $wait_hasil ?></h3>
                    </div>
                    <div class="h-12 w-12 bg-rose-50 text-rose-500 rounded-xl flex items-center justify-center group-hover:scale-110 group-hover:bg-rose-500 group-hover:text-white transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                        </svg>
                    </div>
                </div>
            </a>

        </div>
    </div>

    <div>
        <h3 class="text-gray-800 font-bold text-lg mb-4 flex items-center gap-2">
            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            Statistik Keseluruhan
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-6">
                <div class="w-16 h-16 bg-gray-50 text-gray-500 rounded-full flex items-center justify-center flex-shrink-0">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Total Pendaftar</p>
                    <h3 class="text-4xl font-black text-gray-800 mt-1"><?= $total_pendaftar ?></h3>
                </div>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-sm border border-emerald-100 relative overflow-hidden flex items-center gap-6">
                <div class="absolute bottom-0 left-0 w-full h-1.5 bg-emerald-500"></div>
                <div class="w-16 h-16 bg-emerald-50 text-emerald-500 rounded-full flex items-center justify-center flex-shrink-0">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-emerald-600 uppercase tracking-widest">Pendaftar Lulus</p>
                    <h3 class="text-4xl font-black text-gray-800 mt-1"><?= $total_lulus ?></h3>
                </div>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-sm border border-red-100 relative overflow-hidden flex items-center gap-6">
                <div class="absolute bottom-0 left-0 w-full h-1.5 bg-red-500"></div>
                <div class="w-16 h-16 bg-red-50 text-red-500 rounded-full flex items-center justify-center flex-shrink-0">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-red-500 uppercase tracking-widest">Tidak Lulus</p>
                    <h3 class="text-4xl font-black text-gray-800 mt-1"><?= $total_ditolak ?></h3>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        <h4 class="font-bold text-lg text-gray-800 mb-6 flex items-center gap-2">
            <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
            </svg>
            Grafik Pendaftaran Harian
        </h4>

        <div class="relative h-72 w-full">
            <?php if ($label_grafik == '[]'): ?>
                <div class="absolute inset-0 flex items-center justify-center text-gray-400 italic text-sm">
                    Belum ada data pendaftar untuk ditampilkan di grafik.
                </div>
            <?php else: ?>
                <canvas id="grafikPendaftar"></canvas>
            <?php endif; ?>
        </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const canvas = document.getElementById('grafikPendaftar');
    if (canvas) {
        const ctx = canvas.getContext('2d');
        const grafikPendaftar = new Chart(ctx, {
            type: 'bar', // Ubah ke Grafik Batang
            data: {
                labels: <?= $label_grafik ?>, 
                datasets: [{
                    label: 'Jumlah Pendaftar',
                    data: <?= $data_grafik ?>, 
                    backgroundColor: 'rgba(16, 185, 129, 0.85)', // Emerald 500
                    hoverBackgroundColor: 'rgba(4, 120, 87, 1)', // Emerald 700 saat di-hover
                    borderRadius: 6, // Ujung batangnya melengkung (modern)
                    borderSkipped: false,
                    barThickness: 30, // Ketebalan maksimal batang agar tidak terlalu raksasa saat data sedikit
                    maxBarThickness: 40
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false // Sembunyikan tulisan legend di atas
                    },
                    tooltip: {
                        backgroundColor: 'rgba(15, 23, 42, 0.9)', // Warna tooltip gelap elegan
                        padding: 12,
                        titleFont: { size: 13 },
                        bodyFont: { size: 14, weight: 'bold' },
                        displayColors: false // Sembunyikan kotak warna di dalam tooltip
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1, // Angka di kiri pasti bulat (1, 2, 3...)
                            font: { size: 12 }
                        },
                        grid: {
                            color: 'rgba(0, 0, 0, 0.04)', // Garis bantu tipis
                            drawBorder: false
                        }
                    },
                    x: {
                        ticks: {
                            font: { size: 12 }
                        },
                        grid: {
                            display: false, // Hilangkan garis bantu vertikal biar bersih
                            drawBorder: false
                        }
                    }
                }
            }
        });
    }
</script>




<?= $this->endSection() ?>