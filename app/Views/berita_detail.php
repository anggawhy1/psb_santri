<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<?= $this->include('components/navbar') ?>

<div class="bg-emerald-900 py-24 text-center text-white relative">
    <div class="relative z-10 max-w-4xl mx-auto px-4">
        <div class="inline-flex items-center gap-2 bg-emerald-800/50 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider mb-4 border border-emerald-700/50">
            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
            Berita & Kegiatan
        </div>
        <h1 class="text-3xl md:text-5xl font-extrabold mb-6 leading-tight">
            <?= esc($berita['judul']) ?>
        </h1>
        
        <a href="<?= base_url('berita') ?>" class="inline-flex items-center gap-2 text-emerald-200 hover:text-white transition text-sm font-medium">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Indeks Berita
        </a>
    </div>
</div>

<div class="bg-slate-50 min-h-screen py-20 relative">
    <div class="absolute top-0 left-0 w-full h-64 bg-emerald-900/5 rounded-b-[50px]"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            
            <div class="lg:col-span-2">
                <div class="bg-white rounded-3xl shadow-xl border border-slate-100 overflow-hidden">
                    
                    <div class="h-[400px] w-full relative">
                        <img src="<?= base_url('uploads/konten/' . $berita['path_gambar']) ?>" class="w-full h-full object-cover" alt="<?= esc($berita['judul']) ?>">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    </div>

                    <div class="p-8 md:p-12">
                        <div class="flex flex-wrap items-center gap-6 mb-8 pb-8 border-b border-slate-100 text-sm text-slate-500">
                            
                            <div class="flex items-center gap-2">
                                <div class="p-2 bg-blue-50 text-blue-600 rounded-lg">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                                <div>
                                    <p class="text-xs font-bold uppercase text-slate-400">Penulis</p>
                                    <p class="font-bold text-slate-700 capitalize">
                                        <?= esc($berita['nama_penulis'] ?? 'Admin Pondok') ?>
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-center gap-2">
                                <div class="p-2 bg-emerald-50 text-emerald-600 rounded-lg">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                                <div>
                                    <?php 
                                        $created = strtotime($berita['created_at']);
                                        $updated = strtotime($berita['updated_at']);
                                        $isEdited = ($updated - $created) > 60; 
                                    ?>

                                    <?php if($isEdited): ?>
                                        <p class="text-xs font-bold uppercase text-slate-400">Terakhir Diedit</p>
                                        <p class="font-bold text-slate-700" title="Diposting: <?= date('d M Y, H:i', $created) ?>">
                                            <?= date('d M Y, H:i', $updated) ?> WIB
                                        </p>
                                    <?php else: ?>
                                        <p class="text-xs font-bold uppercase text-slate-400">Diposting Pada</p>
                                        <p class="font-bold text-slate-700">
                                            <?= date('d M Y, H:i', $created) ?> WIB
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>

                        <div class="prose prose-lg prose-slate max-w-none text-slate-700 leading-relaxed text-justify">
                            <?= nl2br(esc($berita['deskripsi'])) ?>
                        </div>

                    </div>
                </div>
            </div>

            <div class="lg:col-span-1 space-y-8">
                
                <div class="bg-white p-6 rounded-3xl shadow-lg border border-slate-100 sticky top-24">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-1 h-8 bg-emerald-500 rounded-full"></div>
                        <h3 class="font-bold text-xl text-slate-800">Berita Lainnya</h3>
                    </div>
                    
                    <div class="space-y-6">
                        <?php foreach($recents as $item): ?>
                        <a href="<?= base_url('berita/detail/' . $item['id_promosi']) ?>" class="flex gap-4 group items-start">
                            <div class="w-20 h-20 flex-shrink-0 rounded-2xl overflow-hidden shadow-sm relative">
                                <img src="<?= base_url('uploads/konten/' . $item['path_gambar']) ?>" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            </div>
                            
                            <div>
                                <h4 class="font-bold text-sm text-slate-800 leading-snug mb-1 group-hover:text-emerald-600 transition line-clamp-2">
                                    <?= esc($item['judul']) ?>
                                </h4>
                                <span class="text-[10px] font-bold text-slate-400 flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <?= date('d M Y', strtotime($item['created_at'])) ?>
                                </span>
                            </div>
                        </a>
                        <?php endforeach; ?>
                    </div>

                    <div class="mt-8 pt-6 border-t border-slate-100 text-center">
                        <a href="<?= base_url('berita') ?>" class="text-sm font-bold text-emerald-600 hover:text-emerald-700 hover:underline">Lihat Semua Arsip &rarr;</a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<?= $this->include('components/footer') ?>
<?= $this->endSection() ?>