<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="max-w-7xl mx-auto">
    
    <div class="mb-8 border-b border-gray-200 pb-4">
        <h2 class="text-xl font-bold text-gray-800 uppercase tracking-wide">DASHBOARD</h2>
    </div>

    <div class="mb-8 text-center">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-900">SELAMAT DATANG DI PORTAL PENERIMAAN SANTRI BARU</h1>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        
        <div class="bg-gray-200 p-6 rounded-lg shadow-sm text-center flex flex-col items-center justify-center h-32 border border-gray-300">
            <p class="text-sm font-semibold text-gray-600 mb-1">Total Pendaftar</p>
            <h3 class="text-3xl font-bold text-gray-800"><?= $stats['pendaftar'] ?></h3>
        </div>

        <div class="bg-gray-200 p-6 rounded-lg shadow-sm text-center flex flex-col items-center justify-center h-32 border border-gray-300">
            <p class="text-sm font-semibold text-gray-600 mb-1">Total Sudah Bayar</p>
            <h3 class="text-3xl font-bold text-gray-800"><?= $stats['bayar'] ?></h3>
        </div>

        <div class="bg-gray-200 p-6 rounded-lg shadow-sm text-center flex flex-col items-center justify-center h-32 border border-gray-300">
            <p class="text-sm font-semibold text-gray-600 mb-1">Total Lulus Seleksi</p>
            <h3 class="text-3xl font-bold text-gray-800"><?= $stats['lulus'] ?></h3>
        </div>

        <div class="bg-gray-200 p-6 rounded-lg shadow-sm text-center flex flex-col items-center justify-center h-32 border border-gray-300">
            <p class="text-sm font-semibold text-gray-600 mb-1">Total Tidak Lulus</p>
            <h3 class="text-3xl font-bold text-gray-800"><?= $stats['gagal'] ?></h3>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        <div class="bg-gray-200 rounded-lg p-6 border border-gray-300 flex items-center justify-center">
            <div class="w-full max-w-xs">
                <canvas id="pieChart"></canvas>
            </div>
        </div>

        <div class="bg-gray-200 rounded-lg p-6 border border-gray-300">
            <canvas id="lineChart" class="w-full h-full"></canvas>
        </div>
    </div>

</div>

<script>
    // 1. Data Pie Chart (PHP to JS)
    const pieLabels = <?= json_encode(array_column($pieData, 'program_pilihan')) ?>;
    const pieValues = <?= json_encode(array_column($pieData, 'jumlah')) ?>;

    new Chart(document.getElementById('pieChart'), {
        type: 'pie',
        data: {
            labels: pieLabels.length ? pieLabels : ['Belum ada data'],
            datasets: [{
                data: pieValues.length ? pieValues : [1],
                backgroundColor: ['#6366f1', '#10b981', '#f59e0b', '#ef4444'],
            }]
        }
    });

    // 2. Data Line Chart
    const lineLabels = <?= json_encode(array_column($lineData, 'tanggal')) ?>;
    const lineValues = <?= json_encode(array_column($lineData, 'jumlah')) ?>;

    new Chart(document.getElementById('lineChart'), {
        type: 'line',
        data: {
            labels: lineLabels,
            datasets: [{
                label: 'Pendaftar Harian',
                data: lineValues,
                borderColor: '#1f2937',
                tension: 0.1,
                fill: false
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: { y: { beginAtZero: true } }
        }
    });
</script>

<?= $this->endSection() ?>