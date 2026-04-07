<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<?= $this->include('components/navbar') ?>

<div class="bg-slate-50 pt-4 pb-10 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <div class="relative py-20 md:py-24 overflow-hidden rounded-3xl shadow-2xl bg-slate-900 border">

            <div class="absolute inset-0 z-0">
                <img src="<?= base_url('images/hero1.png') ?>" alt="Background PSB" class="w-full h-full object-cover opacity-65 scale-105 transform origin-center">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/10 to-slate-700/10"></div>
            </div>

            <div class="relative z-10 px-6 md:px-16 text-center">

                <h1 class="text-4xl md:text-6xl font-black text-white tracking-tight leading-tight mb-6 drop-shadow-xl">
                    Penerimaan Santri Baru <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-300 to-teal-200">
                        Tahun Ajaran <?= esc($tahun_psb) ?>
                    </span>
                </h1>

                <p class="text-base md:text-lg text-white max-w-3xl mx-auto font-light leading-relaxed mb-10 drop-shadow-md">
                    Melahirkan generasi yang cerdas intelektual-spiritual, berilmu, dan beradab. Mari bergabung bersama Pondok Pesantren Trans Spiritual-Sains Banyu Agung Ibnu Saut Bintoro.
                </p>

                <div class="flex flex-wrap justify-center gap-3">
                    <div class="flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/20 px-4 py-2 rounded-xl shadow-sm">
                        <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        <span class="text-white text-xs font-bold uppercase tracking-wider">Diniyah & Formal</span>
                    </div>

                    <div class="flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/20 px-4 py-2 rounded-xl shadow-sm">
                        <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 000.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                        </svg>
                        <span class="text-white text-xs font-bold uppercase tracking-wider">Tahfidz & Bahasa</span>
                    </div>

                    <div class="flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/20 px-4 py-2 rounded-xl shadow-sm">
                        <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <span class="text-white text-xs font-bold uppercase tracking-wider">Akhlakul Karimah</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-10">

            <div class="text-center mb-12">
                <span class="text-emerald-600 font-bold tracking-widest uppercase text-sm mb-2 block">Mengapa Memilih Kami?</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800">Keunggulan Pondok</h2>
                <div class="w-20 h-1.5 bg-emerald-500 mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <div class="group bg-white p-8 rounded-3xl shadow-xl shadow-slate-200 border border-slate-200 border-b-4 border-b-emerald-500 hover:-translate-y-2 hover:shadow-2xl hover:border-emerald-200 transition-all duration-300 relative overflow-hidden">
                    <div class="absolute -right-10 -top-10 w-32 h-32 bg-emerald-50 rounded-full group-hover:scale-150 transition-transform duration-700 pointer-events-none"></div>

                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-emerald-50 border border-emerald-100 rounded-2xl flex items-center justify-center text-emerald-600 mb-6 shadow-sm group-hover:bg-emerald-500 group-hover:text-white transition-colors duration-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-extrabold text-slate-800 mb-3 group-hover:text-emerald-700 transition-colors">Diniyah & Formal</h3>
                        <p class="text-slate-600 leading-relaxed text-sm font-medium">Sinergi Kurikulum Salaf (Kitab Kuning) dengan Sekolah Formal (MTs, SMP, SMA) untuk mencetak santri cerdas intelektual-spiritual.</p>
                    </div>
                </div>

                <div class="group bg-white p-8 rounded-3xl shadow-xl shadow-slate-200 border border-slate-200 border-b-4 border-b-emerald-500 hover:-translate-y-2 hover:shadow-2xl hover:border-emerald-200 transition-all duration-300 relative overflow-hidden">
                    <div class="absolute -right-10 -top-10 w-32 h-32 bg-emerald-50 rounded-full group-hover:scale-150 transition-transform duration-700 pointer-events-none"></div>

                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-emerald-50 border border-emerald-100 rounded-2xl flex items-center justify-center text-emerald-600 mb-6 shadow-sm group-hover:bg-emerald-500 group-hover:text-white transition-colors duration-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-extrabold text-slate-800 mb-3 group-hover:text-emerald-700 transition-colors">Tahfidz & Bahasa</h3>
                        <p class="text-slate-600 leading-relaxed text-sm font-medium">Program intensif Tahsin, Tartil, dan Tahfidz Al-Qur'an bersanad, dilengkapi dengan pembinaan aktif Bahasa Arab dan Bahasa Inggris.</p>
                    </div>
                </div>

                <div class="group bg-white p-8 rounded-3xl shadow-xl shadow-slate-200 border border-slate-200 border-b-4 border-b-emerald-500 hover:-translate-y-2 hover:shadow-2xl hover:border-emerald-200 transition-all duration-300 relative overflow-hidden">
                    <div class="absolute -right-10 -top-10 w-32 h-32 bg-emerald-50 rounded-full group-hover:scale-150 transition-transform duration-700 pointer-events-none"></div>

                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-emerald-50 border border-emerald-100 rounded-2xl flex items-center justify-center text-emerald-600 mb-6 shadow-sm group-hover:bg-emerald-500 group-hover:text-white transition-colors duration-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-extrabold text-slate-800 mb-3 group-hover:text-emerald-700 transition-colors">Akhlakul Karimah</h3>
                        <p class="text-slate-600 leading-relaxed text-sm font-medium">Fokus pada pembinaan akhlak & kepemimpinan, didukung lingkungan asrama yang nyaman untuk mendukung ibadah santri.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<div class="bg-slate-50 min-h-screen py-16 relative">
    <div class="absolute top-0 left-0 w-full h-64 bg-emerald-900/5 rounded-b-[50px]"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-8">

        <div class="text-center mb-12 mt-4">
            <span class="text-emerald-600 font-bold tracking-widest uppercase text-sm mb-2 block">Panduan Pendaftaran</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800">Informasi & Syarat</h2>
            <div class="w-20 h-1.5 bg-emerald-500 mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8 flex flex-col hover:shadow-md transition-all duration-300">
                <div class="flex items-center gap-3 mb-8 border-b border-slate-100 pb-4">
                    <div class="w-10 h-10 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-800 uppercase tracking-wide">Pilihan Pendidikan</h3>
                </div>

                <div class="flex-1 flex flex-col gap-6">

                    <div>
                        <div class="inline-flex items-center gap-2 mb-4">
                            <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            <h4 class="font-bold text-slate-700 text-sm uppercase tracking-wide">Program Pesantren</h4>
                        </div>

                        <div class="grid grid-cols-2 gap-2 mb-10">
                            <div class="flex items-center gap-3">
                                <div class="w-5 h-5 rounded-full bg-emerald-50 flex items-center justify-center shrink-0">
                                    <svg class="w-3 h-3 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-sm font-medium text-slate-600">Tahfidz Al-Qur'an</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-5 h-5 rounded-full bg-emerald-50 flex items-center justify-center shrink-0">
                                    <svg class="w-3 h-3 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-sm font-medium text-slate-600">Kitab Kuning</span>
                            </div>
                        </div>

                        <div class="inline-flex items-center gap-2 mb-4">
                            <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            <h4 class="font-bold text-slate-700 text-sm uppercase tracking-wide">Materi Kitab</h4>
                        </div>

                        <div class="space-y-3">
                            <div class="flex items-start gap-3">
                                <span class="px-2 py-0.5 bg-blue-100 text-blue-700 text-[10px] font-bold rounded shrink-0 mt-0.5 w-16 text-center">Nahwu</span>
                                <span class="text-xs text-slate-600 font-medium pt-0.5">Al-Jurumiyah, Imrithi, Alfiyah</span>
                            </div>
                            <div class="flex items-start gap-3">
                                <span class="px-2 py-0.5 bg-amber-100 text-amber-700 text-[10px] font-bold rounded shrink-0 mt-0.5 w-16 text-center">Hadits</span>
                                <span class="text-xs text-slate-600 font-medium pt-0.5">Arba'in, Riyadush Sholihin</span>
                            </div>
                            <div class="flex items-start gap-3">
                                <span class="px-2 py-0.5 bg-purple-100 text-purple-700 text-[10px] font-bold rounded shrink-0 mt-0.5 w-16 text-center">Tasawuf</span>
                                <span class="text-xs text-slate-600 font-medium pt-0.5">Ihya Ulumuddin</span>
                            </div>
                            <div class="flex items-start gap-3">
                                <span class="px-2 py-0.5 bg-slate-200 text-slate-700 text-[10px] font-bold rounded shrink-0 mt-0.5 w-16 text-center">Fiqih</span>
                                <span class="text-xs text-slate-600 font-medium pt-0.5 leading-snug">Taqrib, Fathul Qorib & Fathul Mu'in</span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="inline-flex items-center gap-2 mb-4">
                            <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                            <h4 class="font-bold text-slate-700 text-sm uppercase tracking-wide">Pendidikan Formal</h4>
                        </div>

                        <ul class="space-y-4">
                            <li class="flex items-center gap-3">
                                <div class="w-5 h-5 rounded-full bg-emerald-50 flex items-center justify-center shrink-0">
                                    <svg class="w-3 h-3 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-sm font-medium text-slate-600">MTs Negeri 7 Bantul</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <div class="w-5 h-5 rounded-full bg-emerald-50 flex items-center justify-center shrink-0">
                                    <svg class="w-3 h-3 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-sm font-medium text-slate-600">SMPN 1 & 2 Piyungan</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <div class="w-5 h-5 rounded-full bg-emerald-50 flex items-center justify-center shrink-0">
                                    <svg class="w-3 h-3 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-sm font-medium text-slate-600">SMA Negeri 1 Piyungan</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <div class="w-5 h-5 rounded-full bg-emerald-50 flex items-center justify-center shrink-0">
                                    <svg class="w-3 h-3 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-sm font-medium text-slate-600">Sekolah Terdekat Lainnya</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8 flex flex-col hover:shadow-md transition-all duration-300">
                <div class="flex items-center gap-3 mb-8 border-b border-slate-100 pb-4">
                    <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-800 uppercase tracking-wide">Syarat Pendaftaran</h3>
                </div>

                <div class="space-y-6 flex-1 mt-2">
                    <div class="flex items-center gap-4">
                        <div class="w-7 h-7 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-xs shrink-0 ring-4 ring-white">1</div>
                        <span class="text-sm font-medium text-slate-700">Isi Formulir Pendaftaran</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-7 h-7 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-xs shrink-0 ring-4 ring-white">2</div>
                        <span class="text-sm font-medium text-slate-700">Fotokopi/Scan Ijazah</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-7 h-7 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-xs shrink-0 ring-4 ring-white">3</div>
                        <span class="text-sm font-medium text-slate-700">Fotokopi/Scan KK</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-7 h-7 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-xs shrink-0 ring-4 ring-white">4</div>
                        <span class="text-sm font-medium text-slate-700">Fotokopi Akta Kelahiran</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-7 h-7 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-xs shrink-0 ring-4 ring-white">5</div>
                        <span class="text-sm font-medium text-slate-700">Pas Foto 3x4 (4 Lembar)</span>
                    </div>
                </div>

                <div class="mt-8 p-4 bg-emerald-50 border border-emerald-100 rounded-xl text-center shadow-sm">
                    <span class="text-base text-emerald-800 font-bold tracking-wide">Biaya Pendaftaran: Rp 200.000</span>
                </div>

                <div class="mt-4 flex items-start gap-3 p-3.5 bg-amber-50 border border-amber-200 rounded-xl">
                    <div class="text-amber-500 shrink-0 mt-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <p class="text-xs text-amber-800 font-medium leading-relaxed">
                        <span class="font-bold uppercase tracking-wider">Perhatian:</span> Untuk saat ini, kami baru membuka penerimaan pendaftaran khusus untuk <strong class="text-amber-900 border-b border-amber-400">Santri Putra</strong>.
                    </p>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8 flex flex-col hover:shadow-md transition-all duration-300">
                <div class="flex items-center justify-between mb-8 border-b border-slate-100 pb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-slate-100 text-slate-600 rounded-xl flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-slate-800 uppercase tracking-wide">Alur Pendaftaran</h3>
                    </div>
                </div>

                <div class="space-y-6 flex-1">
                    <div class="flex items-start gap-4">
                        <div class="w-7 h-7 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-xs shrink-0 mt-0.5 ring-4 ring-white">1</div>
                        <div>
                            <h4 class="font-bold text-slate-800 text-sm">Registrasi Akun</h4>
                            <p class="text-xs text-slate-500 mt-1 leading-relaxed">Isi Formulir Pendaftaran.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-7 h-7 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-xs shrink-0 mt-0.5 ring-4 ring-white">2</div>
                        <div>
                            <h4 class="font-bold text-slate-800 text-sm">Bayar Biaya</h4>
                            <p class="text-xs text-slate-500 mt-1 leading-relaxed">Lakukan pembayaran, unggah bukti bayar.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-7 h-7 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-xs shrink-0 mt-0.5 ring-4 ring-white">3</div>
                        <div>
                            <h4 class="font-bold text-slate-800 text-sm">Upload Berkas</h4>
                            <p class="text-xs text-slate-500 mt-1 leading-relaxed">Lengkapi data dan unggah dokumen.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-7 h-7 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-xs shrink-0 mt-0.5 ring-4 ring-white">4</div>
                        <div>
                            <h4 class="font-bold text-slate-800 text-sm">Verifikasi Admin</h4>
                            <p class="text-xs text-slate-500 mt-1 leading-relaxed">Pengecekan kelengkapan oleh admin pondok.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-7 h-7 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-xs shrink-0 mt-0.5 ring-4 ring-white">5</div>
                        <div>
                            <h4 class="font-bold text-slate-800 text-sm">Wawancara</h4>
                            <p class="text-xs text-slate-500 mt-1 leading-relaxed">Mengikuti wawancara sesuai jadwal.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-7 h-7 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-xs shrink-0 mt-0.5 ring-4 ring-white">6</div>
                        <div>
                            <h4 class="font-bold text-slate-800 text-sm">Selesai</h4>
                            <p class="text-xs text-slate-500 mt-1 leading-relaxed">Menunggu pengumuman kelulusan.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="w-full mt-4">
            <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 p-8 md:p-12 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-emerald-50 rounded-full blur-3xl -mr-20 -mt-20 pointer-events-none"></div>

                <div class="relative z-10">
                    <div class="text-center max-w-3xl mx-auto mb-10">
                        <div class="inline-flex items-center justify-center w-14 h-14 bg-emerald-100 text-emerald-600 rounded-2xl mb-5 shadow-sm">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl md:text-3xl font-extrabold text-slate-800 mb-4">Jadwal Gelombang Pendaftaran</h3>
                        <p class="text-slate-600 leading-relaxed text-sm md:text-base">
                            Penerimaan Santri Baru Tahun Ajaran <strong class="text-emerald-600">2026/2027</strong> dilaksanakan melalui tiga periode gelombang. Proses pendaftaran dapat sewaktu-waktu ditutup lebih awal apabila kuota penerimaan santri telah terpenuhi.
                        </p>
                    </div>

                    <?php
                    // Logika Otomatis Pengecekan Bulan Aktif
                    $bulanSekarang = (int)date('n'); // Mengambil angka bulan saat ini (1-12)
                    $gelombangAktif = 0;

                    if ($bulanSekarang >= 3 && $bulanSekarang <= 5) {
                        $gelombangAktif = 1; // Maret (3) - Mei (5)
                    } elseif ($bulanSekarang >= 6 && $bulanSekarang <= 8) {
                        $gelombangAktif = 2; // Juni (6) - Agustus (8)
                    } elseif ($bulanSekarang >= 9 && $bulanSekarang <= 12) {
                        $gelombangAktif = 3; // September (9) - Desember (12)
                    }
                    ?>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                        <div class="bg-gradient-to-br <?= $gelombangAktif == 1 ? 'from-emerald-50 border-emerald-300 shadow-md' : 'from-slate-50 border-slate-200' ?> to-white rounded-2xl border p-6 text-center hover:shadow-lg hover:-translate-y-1 hover:border-emerald-300 transition-all duration-300 group relative overflow-hidden">
                            <div class="absolute top-0 inset-x-0 h-1.5 bg-emerald-400"></div>
                            <span class="inline-block py-1.5 px-4 rounded-full <?= $gelombangAktif == 1 ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-200 text-slate-700' ?> text-xs font-bold tracking-wider uppercase mb-5">
                                Gelombang 1
                            </span>
                            <h4 class="text-slate-800 font-extrabold text-lg md:text-xl mb-2 group-hover:text-emerald-600 transition-colors">1 Mar - 30 Mei 2026</h4>
                            <p class="text-slate-500 text-xs leading-relaxed">Periode pendaftaran awal untuk Tahun Ajaran 2026/2027.</p>
                        </div>

                        <div class="bg-gradient-to-br <?= $gelombangAktif == 2 ? 'from-emerald-50 border-emerald-300 shadow-md' : 'from-slate-50 border-slate-200' ?> to-white rounded-2xl border p-6 text-center hover:shadow-lg hover:-translate-y-1 hover:border-emerald-300 transition-all duration-300 group relative overflow-hidden">
                            <div class="absolute top-0 inset-x-0 h-1.5 bg-emerald-500"></div>
                            <span class="inline-block py-1.5 px-4 rounded-full <?= $gelombangAktif == 2 ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-200 text-slate-700' ?> text-xs font-bold tracking-wider uppercase mb-5">
                                Gelombang 2
                            </span>
                            <h4 class="text-slate-800 font-extrabold text-lg md:text-xl mb-2 group-hover:text-emerald-600 transition-colors">1 Jun - 31 Ags 2026</h4>
                            <p class="text-slate-500 text-xs leading-relaxed">Periode pendaftaran lanjutan setelah gelombang pertama berakhir.</p>
                        </div>

                        <div class="bg-gradient-to-br <?= $gelombangAktif == 3 ? 'from-emerald-50 border-emerald-300 shadow-md' : 'from-slate-50 border-slate-200' ?> to-white rounded-2xl border p-6 text-center hover:shadow-lg hover:-translate-y-1 hover:border-emerald-300 transition-all duration-300 group relative overflow-hidden">
                            <div class="absolute top-0 inset-x-0 h-1.5 bg-emerald-600"></div>
                            <span class="inline-block py-1.5 px-4 rounded-full <?= $gelombangAktif == 3 ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-200 text-slate-700' ?> text-xs font-bold tracking-wider uppercase mb-5">
                                Gelombang 3
                            </span>
                            <h4 class="text-slate-800 font-extrabold text-lg md:text-xl mb-2 group-hover:text-emerald-600 transition-colors">1 Sep - 31 Des 2026</h4>
                            <p class="text-slate-500 text-xs leading-relaxed">Periode pendaftaran akhir sebelum tahun ajaran baru dimulai.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="rounded-2xl shadow-md p-8 text-center border border-emerald-600 w-full" style="background-color: #047857;">
            <h3 class="text-2xl font-bold text-white mb-1 tracking-wide">KABAR GEMBIRA!</h3>
            <p class="text-emerald-100 text-sm mb-4">Meringankan ikhtiar ananda dalam menuntut ilmu agama.</p>
            <div class="inline-block bg-white text-emerald-800 font-black text-xl py-2 px-6 rounded-lg shadow-sm">
                UANG PONDOK GRATIS
            </div>
        </div>

        <div class="relative py-24 bg-emerald-900 overflow-hidden rounded-2xl shadow-2xl border border-emerald-800 w-full mt-8 mb-16">
            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-[30rem] h-[30rem] bg-emerald-600/20 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-[30rem] h-[30rem] bg-teal-600/20 rounded-full blur-3xl pointer-events-none"></div>

            <div class="relative z-10 max-w-4xl mx-auto px-6 text-center">
                <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-6 tracking-tight">
                    Mari Bergabung Bersama Kami
                </h2>
                <p class="text-emerald-100 text-lg md:text-xl mb-12 max-w-3xl mx-auto leading-relaxed">
                    Wujudkan impian ananda menjadi generasi Qur'ani yang cerdas intelektual-spiritual dan beradab mulia di Pondok Pesantren Trans Spiritual-Sains Banyu Agung Ibnu Saut Bintoro.
                </p>

                <div class="mb-8">
                    <a href="<?= base_url('register') ?>" class="inline-block w-full sm:w-[85%] md:w-[70%] bg-white text-[#047857] px-10 py-5 rounded-full font-black text-xl md:text-2xl uppercase tracking-widest shadow-[0_10px_40px_rgba(0,0,0,0.3)] hover:bg-emerald-50 hover:scale-105 transition-all duration-300">
                        DAFTAR SEKARANG
                    </a>
                </div>

                <div class="mb-14 text-emerald-200 text-base">
                    Sudah melakukan registrasi?
                    <a href="<?= base_url('login') ?>" class="font-bold text-white hover:text-emerald-300 underline underline-offset-4 decoration-emerald-400/50 hover:decoration-emerald-300 transition-colors ml-1">
                        Login Calon Santri
                    </a>
                </div>

                <div class="w-1/3 h-px bg-gradient-to-r from-transparent via-emerald-700 to-transparent mx-auto mb-10"></div>

                <div>
                    <p class="text-sm font-semibold text-emerald-400 uppercase tracking-[0.15em] mb-6">
                        Butuh Bantuan Pendaftaran? Hubungi Admin
                    </p>

                    <div class="flex flex-col sm:flex-row justify-center items-center gap-6">
                        <a href="https://wa.me/6285624754265" target="_blank" class="group flex items-center gap-4 bg-emerald-800/40 border border-emerald-700/50 text-white py-3.5 px-6 rounded-2xl hover:bg-emerald-800 hover:border-emerald-500 hover:shadow-lg transition-all duration-300 w-full sm:w-auto min-w-[240px] backdrop-blur-sm">
                            <div class="w-12 h-12 bg-emerald-700/80 rounded-full flex items-center justify-center text-emerald-300 group-hover:text-white transition-colors duration-300 shrink-0">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                                </svg>
                            </div>
                            <div class="text-left">
                                <span class="block font-bold text-white text-[15px] group-hover:text-emerald-300 transition-colors"> Hadjar</span>
                                <span class="block text-sm text-emerald-200/70 mt-0.5">+62 856-2475-4265</span>
                            </div>
                        </a>

                        <a href="https://wa.me/6285770798142" target="_blank" class="group flex items-center gap-4 bg-emerald-800/40 border border-emerald-700/50 text-white py-3.5 px-6 rounded-2xl hover:bg-emerald-800 hover:border-emerald-500 hover:shadow-lg transition-all duration-300 w-full sm:w-auto min-w-[240px] backdrop-blur-sm">
                            <div class="w-12 h-12 bg-emerald-700/80 rounded-full flex items-center justify-center text-emerald-300 group-hover:text-white transition-colors duration-300 shrink-0">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                                </svg>
                            </div>
                            <div class="text-left">
                                <span class="block font-bold text-white text-[15px] group-hover:text-emerald-300 transition-colors">Niyazi</span>
                                <span class="block text-sm text-emerald-200/70 mt-0.5">+62 857-7079-8142</span>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>



<?= $this->include('components/footer') ?>

<?= $this->endSection() ?>