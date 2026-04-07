<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<?= $this->include('components/navbar') ?>

<div class="relative bg-slate-900 h-[650px] overflow-hidden">
    <div class="absolute inset-0">
        <img src="<?= base_url('images/hero.png') ?>" alt="Pesantren Banyu Agung" class="w-full h-full object-cover opacity-80 scale-105 animate-pulse-slow">
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex flex-col justify-center items-center text-center pb-32">
        <span class="inline-block py-1 px-3 rounded-full bg-emerald-500/90 border border-emerald-300/50 text-white text-sm font-bold tracking-widest uppercase mb-6 backdrop-blur-sm shadow-lg">
            Penerimaan Santri Baru (PSB) <?= esc($tahun_psb) ?>
        </span>

        <h1 class="text-4xl md:text-6xl font-extrabold text-white tracking-tight leading-tight mb-4 drop-shadow-lg">
            Pondok Pesantren <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-300 to-teal-200">
                Banyu Agung Ibnu Saut Bintoro
            </span>
        </h1>
        <p class="text-lg md:text-xl text-white/95 max-w-2xl mb-10 leading-relaxed font-light drop-shadow-md">
            Melahirkan Generasi yang Cerdas Intelektual-Spiritual, Berilmu dan Beradab.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
            <a href="<?= base_url('register') ?>" class="px-8 py-4 bg-emerald-50 text-emerald-700 border-2 border-emerald-100 rounded-full font-bold shadow-md shadow-emerald-500/10 transition-all transform hover:-translate-y-1 hover:bg-emerald-100 text-center">
                Daftar Sekarang
            </a>

            <a href="<?= base_url('psb') ?>" class="px-8 py-4 bg-emerald-600 hover:bg-emerald-500 text-white rounded-full font-bold transition-all shadow-lg shadow-emerald-500/40 transform hover:-translate-y-1 text-center border-2 border-emerald-600">
                Penerimaan Santri Baru
            </a>
        </div>
    </div>
</div>

<div class="relative z-10 -mt-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="bg-white p-8 rounded-3xl shadow-xl shadow-slate-200/50 border-b-4 border-emerald-500 hover:-translate-y-2 transition duration-300">
            <div class="w-14 h-14 bg-emerald-100 rounded-2xl flex items-center justify-center text-emerald-600 mb-6">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-slate-800 mb-3">Diniyah & Formal</h3>
            <p class="text-slate-500 leading-relaxed text-sm">Sinergi Kurikulum Salaf (Kitab Kuning) dengan Sekolah Formal (MTs, SMP, SMA) untuk mencetak santri cerdas intelektual-spiritual.</p>
        </div>

        <div class="bg-white p-8 rounded-3xl shadow-xl shadow-slate-200/50 border-b-4 border-emerald-500 hover:-translate-y-2 transition duration-300">
            <div class="w-14 h-14 bg-emerald-100 rounded-2xl flex items-center justify-center text-emerald-600 mb-6">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-slate-800 mb-3">Tahfidz & Bahasa</h3>
            <p class="text-slate-500 leading-relaxed text-sm">Program intensif Tahsin, Tartil, dan Tahfidz Al-Qur'an bersanad, dilengkapi dengan pembinaan aktif Bahasa Arab dan Bahasa Inggris.</p>
        </div>

        <div class="bg-white p-8 rounded-3xl shadow-xl shadow-slate-200/50 border-b-4 border-emerald-500 hover:-translate-y-2 transition duration-300">
            <div class="w-14 h-14 bg-emerald-100 rounded-2xl flex items-center justify-center text-emerald-600 mb-6">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-slate-800 mb-3">Akhlakul Karimah</h3>
            <p class="text-slate-500 leading-relaxed text-sm">Fokus pada pembinaan akhlak & kepemimpinan, didukung lingkungan asrama yang nyaman untuk mendukung ibadah santri.</p>
        </div>

    </div>
</div>

<section id="profil-singkat" class="py-24 bg-white relative overflow-hidden">
    <div class="absolute -left-20 top-40 w-72 h-72 bg-emerald-50 rounded-full blur-3xl -z-10"></div>
    <div class="absolute right-0 bottom-0 w-96 h-96 bg-emerald-50/50 rounded-full blur-3xl -z-10"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-center gap-16">
            <div class="w-full md:w-1/2 relative">
                <div class="absolute -top-4 -left-4 w-24 h-24 bg-emerald-100 rounded-full z-0"></div>
                <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-slate-100 rounded-full z-0"></div>
                <img src="<?= base_url('images/hero7.png') ?>" alt="Tentang Pondok" class="relative z-10 w-full rounded-3xl shadow-2xl rotate-2 hover:rotate-0 transition duration-500 object-cover h-96">
            </div>
            <div class="w-full md:w-1/2">
                <h4 class="text-emerald-600 font-bold uppercase tracking-widest text-sm mb-3">Tentang Kami</h4>

                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-6 leading-tight">
                    Cerdas Intelektual-Spiritual, <br>
                    <span class="text-emerald-600">Berdaya Saing Global.</span>
                </h2>

                <p class="text-slate-600 mb-6 leading-relaxed">
                    Pondok Pesantren Trans Spiritual-Sains Banyu Agung Ibnu Saut Bintoro hadir untuk memadukan ilmu agama dan wawasan modern. Kami berikhtiar mencetak generasi Qur'ani yang tak hanya teguh menjaga tradisi Kitab Kuning dan hafalan Al-Qur'an, namun juga memiliki jiwa kepemimpinan serta berdaya saing global berlandaskan akhlakul karimah.
                </p>

                <a href="<?= base_url('profil') ?>" class="text-emerald-600 font-bold hover:text-emerald-700 inline-flex items-center gap-2 group transition-colors">
                    Lihat Profil & Fasilitas Lengkap
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<?php if (!empty($berita_terbaru)): ?>
    <section class="py-10 bg-slate-50 relative overflow-hidden">
        <div class="absolute top-10 right-10 w-40 h-40 bg-emerald-200/20 rounded-full blur-2xl"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-3xl font-bold text-slate-900">Kabar Pesantren</h2>
                    <p class="text-slate-500 mt-2">Update kegiatan dan informasi terbaru.</p>
                </div>
                <a href="<?= base_url('berita') ?>" class="hidden md:inline-flex items-center justify-center px-5 py-2 border border-slate-300 shadow-sm text-sm font-medium rounded-full text-slate-700 bg-white hover:bg-emerald-50 hover:text-emerald-700 transition">
                    Lihat Semua
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php foreach ($berita_terbaru as $item): ?>
                    <article class="bg-white rounded-2xl shadow-sm border border-emerald-100 overflow-hidden hover:shadow-lg transition duration-300 flex flex-col h-full group hover:-translate-y-1">
                        <div class="h-56 overflow-hidden relative">
                            <img src="<?= base_url('uploads/konten/' . $item['path_gambar']) ?>" class="w-full h-full object-cover transition duration-700 group-hover:scale-110" alt="<?= esc($item['judul']) ?>">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-60"></div>

                            <span class="absolute top-4 right-4 bg-emerald-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md z-20">
                                Berita
                            </span>
                        </div>
                        <div class="p-6 flex-1 flex flex-col">
                            <div class="text-slate-400 text-xs font-bold mb-2 flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <?= date('d M Y', strtotime($item['created_at'])) ?>
                            </div>
                            <h3 class="text-lg font-bold text-slate-900 mb-3 leading-snug group-hover:text-emerald-600 transition">
                                <a href="<?= base_url('berita/detail/' . $item['id_promosi']) ?>"><?= esc($item['judul']) ?></a>
                            </h3>
                            <p class="text-slate-500 text-sm line-clamp-3 mb-4 flex-1">
                                <?= esc(substr($item['deskripsi'], 0, 100)) ?>...
                            </p>
                            <a href="<?= base_url('berita/detail/' . $item['id_promosi']) ?>" class="text-emerald-600 font-bold text-sm transition-all mt-auto hover:underline">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (!empty($prestasi_terbaru)): ?>
    <section class="py-10 bg-white relative overflow-hidden">
        <div class="absolute -left-20 top-20 w-80 h-80 bg-emerald-50 rounded-full blur-3xl opacity-60"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-3xl font-bold text-slate-900">Prestasi Santri</h2>
                    <p class="text-slate-500 mt-2">Pencapaian membanggakan para santri.</p>
                </div>
                <a href="<?= base_url('prestasi') ?>" class="hidden md:inline-flex items-center justify-center px-5 py-2 border border-slate-300 shadow-sm text-sm font-medium rounded-full text-slate-700 bg-white hover:bg-emerald-50 hover:text-emerald-700 transition">
                    Lihat Semua
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php foreach ($prestasi_terbaru as $item): ?>
                    <article class="bg-white rounded-2xl shadow-sm border border-emerald-100 overflow-hidden hover:shadow-lg transition duration-300 flex flex-col h-full group hover:-translate-y-1">
                        <div class="h-56 overflow-hidden relative">
                            <img src="<?= base_url('uploads/konten/' . $item['path_gambar']) ?>" class="w-full h-full object-cover transition duration-700 group-hover:scale-110" alt="<?= esc($item['judul']) ?>">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-60"></div>

                            <span class="absolute top-4 right-4 bg-emerald-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md z-20">
                                Prestasi
                            </span>
                        </div>
                        <div class="p-6 flex-1 flex flex-col">
                            <div class="text-slate-400 text-xs font-bold mb-2 flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <?= date('d M Y', strtotime($item['created_at'])) ?>
                            </div>
                            <h3 class="text-lg font-bold text-slate-900 mb-3 leading-snug group-hover:text-emerald-600 transition">
                                <?= esc($item['judul']) ?>
                            </h3>
                            <p class="text-slate-500 text-sm line-clamp-3 mb-4 flex-1">
                                <?= esc(substr($item['deskripsi'], 0, 100)) ?>...
                            </p>
                            <a href="<?= base_url('prestasi') ?>" class="text-emerald-600 font-bold text-sm transition-all mt-auto hover:underline">
                                Lihat Detail
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (!empty($galeri_terbaru)): ?>
    <section class="py-10 bg-slate-50 relative overflow-hidden">
        <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-[800px] h-96 bg-emerald-100/40 rounded-t-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-3xl font-bold text-slate-900">Galeri Kegiatan</h2>
                    <p class="text-slate-500 mt-2">Dokumentasi aktivitas santri sehari-hari.</p>
                </div>
                <a href="<?= base_url('galeri') ?>" class="hidden md:inline-flex items-center justify-center px-5 py-2 border border-slate-300 shadow-sm text-sm font-medium rounded-full text-slate-700 bg-white hover:bg-emerald-50 hover:text-emerald-700 transition">
                    Lihat Lainnya
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php foreach ($galeri_terbaru as $item): ?>
                    <article class="bg-white rounded-2xl shadow-sm border border-emerald-100 overflow-hidden hover:shadow-lg transition duration-300 flex flex-col h-full group hover:-translate-y-1">
                        <div class="h-56 overflow-hidden relative">
                            <img src="<?= base_url('uploads/konten/' . $item['path_gambar']) ?>" class="w-full h-full object-cover transition duration-700 group-hover:scale-110" alt="<?= esc($item['judul']) ?>">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-60"></div>

                            <span class="absolute top-4 right-4 bg-emerald-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md z-20">
                                Galeri
                            </span>
                        </div>
                        <div class="p-6 flex-1 flex flex-col">
                            <div class="text-slate-400 text-xs font-bold mb-3 flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <?= date('d M Y', strtotime($item['created_at'])) ?>
                            </div>

                            <h3 class="text-lg font-bold text-slate-900 mb-4 leading-snug group-hover:text-emerald-600 transition line-clamp-2">
                                <?= esc($item['judul']) ?>
                            </h3>

                            <a href="<?= base_url('galeri') ?>" class="text-emerald-600 font-bold text-sm transition-all mt-auto hover:underline">
                                Lihat Foto
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

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