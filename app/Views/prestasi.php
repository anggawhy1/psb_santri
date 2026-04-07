<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<?= $this->include('components/navbar') ?>

<div class="bg-emerald-900 py-24 text-center text-white relative">
    <div class="relative z-10 max-w-4xl mx-auto px-4">
        <span class="text-emerald-300 font-bold tracking-widest uppercase text-sm mb-2 block">Publikasi</span>
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Jejak Prestasi</h1>
        <p class="text-emerald-100 text-lg max-w-2xl mx-auto font-light">
            Daftar pencapaian membanggakan para santri Banyu Agung di kancah regional maupun nasional.
        </p>
    </div>
</div>

<div class="bg-slate-50 min-h-screen py-20 relative">
    <div class="absolute top-0 left-0 w-full h-64 bg-emerald-900/5 rounded-b-[50px]"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <?php if (empty($prestasi)): ?>
            <div class="text-center py-24 bg-white rounded-3xl border border-dashed border-slate-300 shadow-sm">
                <div class="w-20 h-20 bg-emerald-50 text-emerald-300 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                    </svg>
                </div>
                <p class="text-slate-500 font-medium text-lg">Belum ada data prestasi.</p>
                <p class="text-slate-400 text-sm mt-1">Prestasi santri akan segera diupdate.</p>
            </div>
        <?php else: ?>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                <?php foreach ($prestasi as $item): ?>
                    <div class="bg-white rounded-3xl shadow-sm border border-emerald-100 overflow-hidden hover:shadow-xl hover:shadow-emerald-100/50 transition duration-300 flex flex-col h-full group hover:-translate-y-2">
                        <div class="h-64 overflow-hidden relative">
                            <img src="<?= base_url('uploads/konten/' . $item['path_gambar']) ?>" class="w-full h-full object-cover transition duration-700 group-hover:scale-110" alt="<?= esc($item['judul']) ?>">

                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-60"></div>

                            <span class="absolute top-4 right-4 bg-emerald-600 text-white text-[10px] font-black px-3 py-1 rounded-full uppercase tracking-wider shadow-md">
                                Prestasi
                            </span>
                        </div>

                        <div class="p-8 flex-1 flex flex-col">
                            <div class="text-slate-400 text-xs font-bold mb-3 flex items-center gap-2">
                                <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <?= date('d F Y', strtotime($item['created_at'])) ?>
                            </div>

                            <h3 class="text-xl font-bold text-slate-800 mb-3 leading-snug group-hover:text-emerald-600 transition">
                                <?= esc($item['judul']) ?>
                            </h3>

                            <p class="text-slate-500 text-sm leading-relaxed">
                                <?= esc($item['deskripsi']) ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php if (isset($pager)): ?>
                <div class="flex justify-center">
                    <div class="bg-white px-6 py-3 rounded-full shadow-sm border border-slate-100">
                        <?= $pager->links('prestasi', 'tailwind_full') ?>
                    </div>
                </div>
            <?php endif; ?>

        <?php endif; ?>
    </div>
</div>

<section class="relative py-24 bg-emerald-900 overflow-hidden">
    <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-emerald-800 rounded-full blur-3xl opacity-50"></div>
    <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-96 h-96 bg-teal-800 rounded-full blur-3xl opacity-50"></div>

    <div class="relative max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-5xl font-bold text-white mb-6 tracking-tight">Mari Bergabung Bersama Kami</h2>
        <p class="text-emerald-100 text-lg mb-10 max-w-2xl mx-auto">
            Wujudkan impian ananda menjadi generasi Qur'ani yang cerdas intelektual-spiritual dan beradab mulia di Pondok Pesantren Banyu Agung Ibnu Saut Bintoro.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="https://wa.me/6281234567890" target="_blank" class="bg-transparent border-2 border-emerald-400 text-emerald-100 px-10 py-4 rounded-full font-bold text-lg hover:bg-emerald-800 hover:text-white transition flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                </svg>
                Hubungi Admin
            </a>
            <a href="<?= base_url('psb') ?>" class="bg-white text-emerald-900 px-10 py-4 rounded-full font-bold text-lg hover:bg-emerald-50 transition shadow-xl transform hover:-translate-y-1">
                Daftar Sekarang
            </a>
        </div>
    </div>
</section>

<?= $this->include('components/footer') ?>
<?= $this->endSection() ?>