<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<?= $this->include('components/navbar') ?>

<div class="bg-emerald-900 py-24 text-center text-white relative">
    <div class="relative z-10 max-w-4xl mx-auto px-4">
        <span class="text-emerald-300 font-bold tracking-widest uppercase text-sm mb-2 block">Akademik</span>
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Program Unggulan</h1>
        <p class="text-emerald-100 text-lg max-w-2xl mx-auto font-light">
            Bekal terbaik mencetak generasi Qur'ani yang cerdas, mandiri, dan berakhlak mulia.
        </p>
    </div>
</div>

<div class="bg-slate-50 min-h-screen py-20 relative">
    <div class="absolute top-0 left-0 w-full h-64 bg-emerald-900/5 rounded-b-[50px]"></div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

            <div class="bg-white rounded-3xl shadow-xl border border-slate-100 overflow-hidden hover:-translate-y-2 transition duration-300 group">
                <div class="bg-amber-50 p-10 border-b border-amber-100 text-center relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-amber-100 rounded-full blur-3xl -mr-10 -mt-10 opacity-60"></div>

                    <div class="w-20 h-20 bg-white text-amber-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-sm group-hover:scale-110 transition duration-500 relative z-10">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800">Kajian Kitab Kuning</h3>
                    <p class="text-slate-500 text-sm mt-2 font-medium uppercase tracking-wide">Pendalaman Literatur Ulama Salaf (Turats)</p>
                </div>

                <div class="p-8 md:p-10">
                    <p class="text-slate-600 leading-relaxed mb-8 text-center">
                        Program utama untuk mencetak santri yang faqih (paham ilmu agama). Santri dibimbing menguasai literatur Islam klasik dengan sanad keilmuan yang jelas sebagai fondasi akhlak dan cara berpikir.
                    </p>

                    <div class="space-y-4">
                        <div class="flex items-start gap-4 p-4 rounded-xl bg-amber-50/50 border border-amber-100">
                            <div class="mt-1 text-amber-500"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg></div>
                            <div>
                                <h4 class="font-bold text-slate-800 text-sm">Metode Pembelajaran</h4>
                                <p class="text-xs text-slate-500 mt-1">Pendekatan Sorogan (bimbingan individu), Bandongan (klasikal), dan Musyawarah (diskusi interaktif) untuk memastikan pemahaman mendalam.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4 p-4 rounded-xl bg-amber-50/50 border border-amber-100">
                            <div class="mt-1 text-amber-500"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg></div>
                            <div>
                                <h4 class="font-bold text-slate-800 text-sm">Materi Unggulan</h4>
                                <p class="text-xs text-slate-500 mt-1">Ilmu Alat (Al-Jurumiyah, Imriti, Alfiyah), Fiqih (Taqrib, Fathul Qorib, Fathul Mu'in), Hadits (Arba'in, Riyadush Sholihin), dan Tasawuf (Ihya Ulumuddin).</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-3xl shadow-xl border border-slate-100 overflow-hidden hover:-translate-y-2 transition duration-300 group">
                <div class="bg-emerald-50 p-10 border-b border-emerald-100 text-center relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-32 h-32 bg-emerald-100 rounded-full blur-3xl -ml-10 -mt-10 opacity-60"></div>

                    <div class="w-20 h-20 bg-white text-emerald-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-sm group-hover:scale-110 transition duration-500 relative z-10">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800">Tahfidzul Qur'an</h3>
                    <p class="text-slate-500 text-sm mt-2 font-medium uppercase tracking-wide">Menghafal Al-Qur'an</p>
                </div>

                <div class="p-8 md:p-10">
                    <p class="text-slate-600 leading-relaxed mb-8 text-center">
                        Program khusus bagi santri untuk menjaga kemurnian wahyu Ilahi. Santri difokuskan menghafal Al-Qur'an secara mutqin (lancar) dan bersanad, di bawah bimbingan intensif para Hafidz/Hafidzah.
                    </p>

                    <div class="space-y-4">
                        <div class="flex items-start gap-4 p-4 rounded-xl bg-emerald-50/50 border border-emerald-100">
                            <div class="mt-1 text-emerald-500"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg></div>
                            <div>
                                <h4 class="font-bold text-slate-800 text-sm">Target & Metode</h4>
                                <p class="text-xs text-slate-500 mt-1">Sistem halaqoh dengan metode Ziyadah (tambah hafalan), Murojaah (mengulang), dan Tasmi' (setoran bacaan).</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4 p-4 rounded-xl bg-emerald-50/50 border border-emerald-100">
                            <div class="mt-1 text-emerald-500"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg></div>
                            <div>
                                <h4 class="font-bold text-slate-800 text-sm">Program Penunjang</h4>
                                <p class="text-xs text-slate-500 mt-1">Dilengkapi dengan bimbingan Tahsin, Tartil, dan pembinaan kepemimpinan (Adab Islami).</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="mt-20 bg-white rounded-3xl p-10 border border-slate-200 text-center shadow-sm">
            <h3 class="text-xl font-bold text-slate-800 mb-4">Pendidikan Formal Terintegrasi</h3>
            <p class="text-slate-600 max-w-3xl mx-auto leading-relaxed mb-8">
                Pondok Pesantren Trans Spiritual-Sains Banyu Agung Ibnu Saut Bintoro mensinergikan pendidikan agama dan umum. Seluruh santri diarahkan untuk menempuh pendidikan formal di sekolah-sekolah berkualitas di sekitar pondok guna mendapatkan ijazah negara.
            </p>

            <div class="flex flex-wrap justify-center gap-4">

                <?php if (!empty($daftar_sekolah)) : ?>
                    <?php foreach ($daftar_sekolah as $sekolah) : ?>
                        <span class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-slate-100 text-slate-700 font-bold text-sm border border-slate-200">
                            <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                            <?= esc($sekolah) ?>
                        </span>
                    <?php endforeach; ?>
                <?php endif; ?>

                <span class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-slate-100 text-slate-700 font-bold text-sm border border-slate-200">
                    <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    Sekolah di Sekitar Lainnya
                </span>

            </div>
        </div>
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