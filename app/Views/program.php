<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<?= $this->include('components/navbar') ?>

<div class="bg-emerald-900 py-24 text-center text-white relative">
    <div class="relative z-10 max-w-4xl mx-auto px-4">
        <span class="text-emerald-300 font-bold tracking-widest uppercase text-sm mb-2 block">Akademik</span>
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Program Unggulan</h1>
        <p class="text-emerald-100 text-lg max-w-2xl mx-auto font-light">
            Pilih jalur pendidikan yang sesuai dengan minat dan bakat ananda untuk mencetak generasi ulama dan huffadz.
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
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800">Madrasah Diniyah</h3>
                    <p class="text-slate-500 text-sm mt-2 font-medium uppercase tracking-wide">Kajian Kitab Kuning (Turats)</p>
                </div>

                <div class="p-8 md:p-10">
                    <p class="text-slate-600 leading-relaxed mb-8 text-center">
                        Program pendalaman ilmu agama Islam (Tafaqquh Fiddin) berbasis kurikulum pesantren salaf. Santri dibimbing untuk menguasai literatur Islam klasik dengan sanad keilmuan yang jelas.
                    </p>
                    
                    <div class="space-y-4">
                        <div class="flex items-start gap-4 p-4 rounded-xl bg-amber-50/50 border border-amber-100">
                            <div class="mt-1 text-amber-500"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                            <div>
                                <h4 class="font-bold text-slate-800 text-sm">Metode Pembelajaran</h4>
                                <p class="text-xs text-slate-500 mt-1">Sorogan (Individual), Bandongan (Klasikal), dan Musyawarah (Diskusi).</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4 p-4 rounded-xl bg-amber-50/50 border border-amber-100">
                            <div class="mt-1 text-amber-500"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                            <div>
                                <h4 class="font-bold text-slate-800 text-sm">Materi Unggulan</h4>
                                <p class="text-xs text-slate-500 mt-1">Nahwu Shorof (Al-Jurumiyah, Imriti, Alfiyah), Fiqih (Fathul Qorib), Tauhid, dan Akhlak Tasawuf.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-3xl shadow-xl border border-slate-100 overflow-hidden hover:-translate-y-2 transition duration-300 group">
                <div class="bg-emerald-50 p-10 border-b border-emerald-100 text-center relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-32 h-32 bg-emerald-100 rounded-full blur-3xl -ml-10 -mt-10 opacity-60"></div>

                    <div class="w-20 h-20 bg-white text-emerald-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-sm group-hover:scale-110 transition duration-500 relative z-10">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800">Tahfidzul Qur'an</h3>
                    <p class="text-slate-500 text-sm mt-2 font-medium uppercase tracking-wide">Menghafal Al-Qur'an 30 Juz</p>
                </div>

                <div class="p-8 md:p-10">
                    <p class="text-slate-600 leading-relaxed mb-8 text-center">
                        Program khusus bagi santri yang ingin memfokuskan diri untuk menghafal Al-Qur'an 30 Juz secara mutqin (lancar) dan bersanad, dengan bimbingan intensif dari para Hafidz/Hafidzah.
                    </p>
                    
                    <div class="space-y-4">
                        <div class="flex items-start gap-4 p-4 rounded-xl bg-emerald-50/50 border border-emerald-100">
                            <div class="mt-1 text-emerald-500"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                            <div>
                                <h4 class="font-bold text-slate-800 text-sm">Target & Metode</h4>
                                <p class="text-xs text-slate-500 mt-1">Target 30 Juz dalam 3 tahun. Metode Ziyadah (Tambah Hafalan), Murojaah (Mengulang), dan Tasmi' (Setoran).</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4 p-4 rounded-xl bg-emerald-50/50 border border-emerald-100">
                            <div class="mt-1 text-emerald-500"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                            <div>
                                <h4 class="font-bold text-slate-800 text-sm">Program Penunjang</h4>
                                <p class="text-xs text-slate-500 mt-1">Tahsinul Qur'an (Perbaikan Bacaan), Nagham (Seni Baca), dan Kajian Tafsir Dasar.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="mt-20 bg-white rounded-3xl p-10 border border-slate-200 text-center shadow-sm">
            <h3 class="text-xl font-bold text-slate-800 mb-4">Pendidikan Formal Terintegrasi</h3>
            <p class="text-slate-600 max-w-3xl mx-auto leading-relaxed mb-8">
                Seluruh santri, baik program <strong>Madrasah Diniyah</strong> maupun <strong>Tahfidz</strong>, wajib menempuh pendidikan formal di sekolah yang berada di dalam lingkungan pondok pesantren untuk mendapatkan ijazah negara.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <span class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-slate-100 text-slate-700 font-bold text-sm border border-slate-200">
                    <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    SMP Islam Banyu Agung
                </span>
                <span class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-slate-100 text-slate-700 font-bold text-sm border border-slate-200">
                    <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    MA (Madrasah Aliyah) Unggulan
                </span>
            </div>
        </div>

    </div>
</div>

<?= $this->include('components/footer') ?>
<?= $this->endSection() ?>