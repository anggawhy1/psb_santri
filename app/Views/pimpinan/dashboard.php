<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="max-w-7xl mx-auto space-y-8">

    <div class="bg-gradient-to-r from-emerald-800 to-teal-600 rounded-2xl shadow-lg p-8 text-white relative overflow-hidden flex items-center justify-between">
        <div class="relative z-10">
            <p class="text-emerald-200 font-medium tracking-wider text-sm mb-1 uppercase">Portal Eksekutif</p>
            <h2 class="text-3xl font-extrabold mb-2">Selamat Datang, <?= session()->get('nama_lengkap') ?? 'Pimpinan' ?>!</h2>
            <p class="text-emerald-50 text-sm max-w-xl leading-relaxed">
                Pantau perkembangan dan ringkasan data penerimaan santri baru secara komprehensif.
            </p>
        </div>
        <svg class="absolute right-0 top-0 h-48 w-48 text-white opacity-10 transform translate-x-10 -translate-y-10" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z" />
        </svg>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">

        <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex flex-col items-center justify-center text-center">
            <div class="w-12 h-12 mb-3 bg-slate-100 text-slate-500 rounded-full flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </div>
            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Total Pendaftar</p>
            <h3 class="text-2xl font-black text-gray-800 mt-1"><?= esc($stats['pendaftar'] ?? 0) ?></h3>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex flex-col items-center justify-center text-center">
            <div class="w-12 h-12 mb-3 bg-amber-50 text-amber-500 rounded-full flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                </svg>
            </div>
            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Sudah Bayar</p>
            <h3 class="text-2xl font-black text-gray-800 mt-1"><?= esc($stats['bayar'] ?? 0) ?></h3>
        </div>

        <a href="<?= base_url('pimpinan/pendaftar?status_wawancara=Dijadwalkan') ?>" class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex flex-col items-center justify-center text-center hover:shadow-md hover:border-blue-200 transition group cursor-pointer">
            <div class="w-12 h-12 mb-3 bg-blue-50 text-blue-500 rounded-full flex items-center justify-center group-hover:scale-110 group-hover:bg-blue-500 group-hover:text-white transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest group-hover:text-blue-600 transition">Wawancara Dijadwalkan</p>
            <h3 class="text-2xl font-black text-gray-800 mt-1"><?= esc($stats['wawancara'] ?? 0) ?></h3>
        </a>

        <div class="bg-white p-5 rounded-2xl shadow-sm border border-emerald-100 flex flex-col items-center justify-center text-center relative overflow-hidden">
            <div class="absolute bottom-0 left-0 w-full h-1 bg-emerald-500"></div>
            <div class="w-12 h-12 mb-3 bg-emerald-50 text-emerald-500 rounded-full flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <p class="text-[10px] font-bold text-emerald-600 uppercase tracking-widest">Lulus Seleksi</p>
            <h3 class="text-2xl font-black text-gray-800 mt-1"><?= esc($stats['lulus'] ?? 0) ?></h3>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow-sm border border-red-100 flex flex-col items-center justify-center text-center relative overflow-hidden">
            <div class="absolute bottom-0 left-0 w-full h-1 bg-red-500"></div>
            <div class="w-12 h-12 mb-3 bg-red-50 text-red-500 rounded-full flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <p class="text-[10px] font-bold text-red-500 uppercase tracking-widest">Tidak Lulus</p>
            <h3 class="text-2xl font-black text-gray-800 mt-1"><?= esc($stats['gagal'] ?? 0) ?></h3>
        </div>

    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col items-center">
            <h4 class="font-bold text-sm text-gray-500 uppercase tracking-widest mb-6 w-full text-center border-b border-gray-50 pb-4">
                Distribusi Program Pilihan
            </h4>

            <?php if (empty($pieData)): ?>
                <div class="flex-1 flex flex-col items-center justify-center text-gray-400 w-full min-h-[250px]">
                    <svg class="w-10 h-10 mb-2 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                    </svg>
                    <p class="text-xs italic">Belum ada data pendaftar</p>
                </div>
            <?php else: ?>
                <div class="w-full max-w-[250px] aspect-square relative flex items-center justify-center mb-2">
                    <canvas id="pieChart"></canvas>
                </div>
            <?php endif; ?>
        </div>

        <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col">
            <h4 class="font-bold text-sm text-gray-500 uppercase tracking-widest mb-6 border-b border-gray-50 pb-4 flex items-center gap-2">
                <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
                </svg>
                Grafik Pendaftaran Harian
            </h4>

            <div class="relative flex-1 min-h-[300px] w-full">
                <?php if (empty($lineData)): ?>
                    <div class="absolute inset-0 flex flex-col items-center justify-center text-gray-400">
                        <svg class="w-10 h-10 mb-2 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
                        </svg>
                        <p class="text-xs italic">Belum ada aktivitas pendaftaran</p>
                    </div>
                <?php else: ?>
                    <canvas id="lineChart"></canvas>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // 1. Setup Pie Chart (Distribusi Program Pilihan)
    const pieCanvas = document.getElementById('pieChart');
    if (pieCanvas) {
        const pieLabels = <?= json_encode(array_column($pieData ?? [], 'program_pilihan')) ?>;
        const pieValues = <?= json_encode(array_column($pieData ?? [], 'jumlah')) ?>;

        new Chart(pieCanvas.getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: pieLabels,
                datasets: [{
                    data: pieValues,
                    backgroundColor: [
                        'rgba(16, 185, 129, 0.9)',
                        'rgba(245, 158, 11, 0.9)',
                        'rgba(99, 102, 241, 0.9)',
                    ],
                    borderWidth: 2,
                    borderColor: '#ffffff',
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '65%',
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            padding: 20,
                            font: {
                                size: 12,
                                family: "'Inter', sans-serif"
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(15, 23, 42, 0.9)',
                        bodyFont: {
                            size: 14,
                            weight: 'bold'
                        }
                    }
                }
            }
        });
    }

    // 2. Setup Bar Chart (Tren Pendaftar Harian)
    const lineCanvas = document.getElementById('lineChart');
    if (lineCanvas) {
        const rawLineData = <?= json_encode($lineData ?? []) ?>;
        const lineLabels = rawLineData.map(item => item.tanggal);
        const lineValues = rawLineData.map(item => item.jumlah);

        new Chart(lineCanvas.getContext('2d'), {
            type: 'bar',
            data: {
                labels: lineLabels,
                datasets: [{
                    label: 'Jumlah Pendaftar',
                    data: lineValues,
                    backgroundColor: 'rgba(16, 185, 129, 0.85)', // Diubah jadi hijau (Emerald 500)
                    hoverBackgroundColor: 'rgba(4, 120, 87, 1)',   // Diubah jadi hijau tua (Emerald 700) saat di-hover
                    borderRadius: 6,
                    borderSkipped: false,
                    barThickness: 30,
                    maxBarThickness: 40
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(15, 23, 42, 0.9)',
                        padding: 12,
                        titleFont: {
                            size: 13
                        },
                        bodyFont: {
                            size: 14,
                            weight: 'bold'
                        },
                        displayColors: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            font: {
                                size: 12
                            }
                        },
                        grid: {
                            color: 'rgba(0, 0, 0, 0.04)',
                            drawBorder: false
                        }
                    },
                    x: {
                        ticks: {
                            font: {
                                size: 12
                            }
                        },
                        grid: {
                            display: false,
                            drawBorder: false
                        }
                    }
                }
            }
        });
    }
</script>

<?= $this->endSection() ?>