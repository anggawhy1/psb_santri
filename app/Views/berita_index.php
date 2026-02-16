<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<?= $this->include('components/navbar') ?>

<div class="bg-emerald-900 py-24 text-center text-white relative">
    <div class="relative z-10 max-w-4xl mx-auto px-4">
        <span class="text-emerald-300 font-bold tracking-widest uppercase text-sm mb-2 block">Publikasi</span>
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Arsip Berita & Kegiatan</h1>
        <p class="text-emerald-100 text-lg max-w-2xl mx-auto font-light">
            Informasi terkini seputar aktivitas santri, kajian kitab, dan agenda resmi Pondok Pesantren.
        </p>
    </div>
</div>

<div class="bg-slate-50 min-h-screen py-20 relative">
    <div class="absolute top-0 left-0 w-full h-64 bg-emerald-900/5 rounded-b-[50px]"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <?php if(empty($berita)): ?>
            <div class="text-center py-24 bg-white rounded-3xl border border-dashed border-slate-300 shadow-sm">
                <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                <p class="text-slate-500 font-medium text-lg">Belum ada berita yang dipublikasikan.</p>
                <p class="text-slate-400 text-sm mt-1">Silakan kembali lagi nanti untuk melihat update terbaru.</p>
            </div>
        <?php else: ?>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                <?php foreach($berita as $item): ?>
                <article class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-xl transition duration-300 flex flex-col h-full group hover:-translate-y-2">
                    <div class="h-60 overflow-hidden relative">
                        <img src="<?= base_url('uploads/konten/' . $item['path_gambar']) ?>" class="w-full h-full object-cover transition duration-700 group-hover:scale-110" alt="<?= esc($item['judul']) ?>">
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-60"></div>
                        
                        <span class="absolute top-4 right-4 bg-emerald-600 text-white text-[10px] font-black px-3 py-1 rounded-full uppercase tracking-wider shadow-md">
                            Berita
                        </span>
                    </div>

                    <div class="p-8 flex-1 flex flex-col">
                        <div class="text-slate-400 text-xs font-bold mb-3 flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <?= date('d F Y', strtotime($item['created_at'])) ?>
                        </div>

                        <h3 class="text-xl font-bold text-slate-800 mb-4 leading-snug group-hover:text-emerald-700 transition">
                            <a href="<?= base_url('berita/detail/' . $item['id_promosi']) ?>">
                                <?= esc($item['judul']) ?>
                            </a>
                        </h3>

                        <p class="text-slate-500 text-sm line-clamp-3 mb-6 flex-1 leading-relaxed">
                            <?= esc(substr($item['deskripsi'], 0, 120)) ?>...
                        </p>

                        <a href="<?= base_url('berita/detail/' . $item['id_promosi']) ?>" class="block text-emerald-600 font-bold text-sm hover:underline border-t border-slate-100 pt-4 mt-auto">
                            Baca Selengkapnya
                        </a>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>

            <div class="flex justify-center">
                <div class="bg-white px-6 py-3 rounded-full shadow-sm border border-slate-100">
                    <?= $pager->links('berita', 'tailwind_full') ?>
                </div>
            </div>

        <?php endif; ?>
    </div>
</div>

<?= $this->include('components/footer') ?>
<?= $this->endSection() ?>