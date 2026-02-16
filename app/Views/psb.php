<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<?= $this->include('components/navbar') ?>

<div class="bg-emerald-900 py-24 text-center text-white relative">
    <div class="relative z-10 max-w-4xl mx-auto px-4">
        <span class="text-emerald-300 font-bold tracking-widest uppercase text-sm mb-2 block">Informasi</span>
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Penerimaan Santri Baru</h1>
        <p class="text-emerald-100 text-lg max-w-2xl mx-auto font-light">
            Selamat datang di portal resmi PSB Pondok Pesantren Banyu Agung Ibnu Saut Bintoro Tahun Ajaran 2026/2027.
        </p>
    </div>
</div>

<div class="bg-slate-50 min-h-screen py-20 relative">
    <div class="absolute top-0 left-0 w-full h-64 bg-emerald-900/5 rounded-b-[50px]"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">

            <div class="space-y-8">
                
                <div class="bg-white rounded-3xl shadow-xl border border-slate-100 p-8 md:p-10">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-800 tracking-tight">Syarat Pendaftaran</h3>
                    </div>

                    <ul class="space-y-4">
                        <li class="flex items-start gap-3 text-slate-600">
                            <svg class="w-5 h-5 text-emerald-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            <span>Mengisi formulir pendaftaran online secara lengkap.</span>
                        </li>
                        <li class="flex items-start gap-3 text-slate-600">
                            <svg class="w-5 h-5 text-emerald-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            <span>Scan asli Kartu Keluarga (KK) & Akta Kelahiran.</span>
                        </li>
                        <li class="flex items-start gap-3 text-slate-600">
                            <svg class="w-5 h-5 text-emerald-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            <span>Pas foto terbaru (Background Merah).</span>
                        </li>
                        <li class="flex items-start gap-3 text-slate-600">
                            <svg class="w-5 h-5 text-emerald-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            <span>Biaya Pendaftaran sebesar <strong class="text-slate-800">Rp 200.000,-</strong></span>
                        </li>
                    </ul>
                </div>

                <div class="bg-white rounded-3xl shadow-xl border border-slate-100 p-8 md:p-10">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-800 tracking-tight">Jadwal Gelombang 1</h3>
                    </div>

                    <div class="space-y-8 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px before:h-full before:w-0.5 before:bg-gradient-to-b before:from-slate-200 before:via-slate-200 before:to-transparent">
                        <div class="relative flex items-center justify-between md:justify-start">
                            <div class="flex items-center justify-center w-10 h-10 rounded-full border border-white bg-slate-100 text-slate-500 shadow shrink-0 md:order-1">
                                <div class="w-3 h-3 bg-emerald-500 rounded-full animate-pulse"></div>
                            </div>
                            <div class="w-[calc(100%-4rem)] md:w-[calc(100%-2.5rem)] ml-6 md:order-2">
                                <div class="text-sm font-black text-emerald-600 uppercase tracking-wider">1 Feb - 30 Mar</div>
                                <div class="text-slate-700 font-bold">Pendaftaran & Upload Berkas</div>
                            </div>
                        </div>
                        <div class="relative flex items-center justify-between md:justify-start">
                            <div class="flex items-center justify-center w-10 h-10 rounded-full border border-white bg-slate-100 text-slate-500 shadow shrink-0 md:order-1">
                                <div class="w-2 h-2 bg-slate-400 rounded-full"></div>
                            </div>
                            <div class="w-[calc(100%-4rem)] md:w-[calc(100%-2.5rem)] ml-6 md:order-2">
                                <div class="text-sm font-black text-slate-400 uppercase tracking-wider">5 April</div>
                                <div class="text-slate-700 font-bold">Ujian Masuk / Wawancara</div>
                            </div>
                        </div>
                        <div class="relative flex items-center justify-between md:justify-start">
                            <div class="flex items-center justify-center w-10 h-10 rounded-full border border-white bg-slate-100 text-slate-500 shadow shrink-0 md:order-1">
                                <div class="w-2 h-2 bg-slate-400 rounded-full"></div>
                            </div>
                            <div class="w-[calc(100%-4rem)] md:w-[calc(100%-2.5rem)] ml-6 md:order-2">
                                <div class="text-sm font-black text-slate-400 uppercase tracking-wider">10 April</div>
                                <div class="text-slate-700 font-bold">Pengumuman Kelulusan</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-[40px] shadow-2xl border border-slate-100 overflow-hidden sticky top-24 transition-all hover:shadow-emerald-100/50">
                <div class="p-10">
                    <h2 class="text-3xl font-black text-slate-800 mb-8 text-center tracking-tighter">Akses Portal Santri</h2>
                    
                    <div class="space-y-6">
                        <div class="group p-8 border-2 border-emerald-100 bg-emerald-50 rounded-3xl hover:bg-emerald-600 transition-all duration-300 transform hover:-translate-y-1">
                            <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                                <div class="text-center md:text-left">
                                    <h3 class="font-black text-emerald-900 group-hover:text-white text-xl uppercase tracking-tighter">Belum Registrasi?</h3>
                                    <p class="text-sm text-emerald-700 group-hover:text-emerald-100 mt-1 font-medium">Mulai langkah awal nyantri di sini.</p>
                                </div>
                                <a href="<?= base_url('register') ?>" class="bg-emerald-600 text-white group-hover:bg-white group-hover:text-emerald-700 px-8 py-3 rounded-2xl font-black shadow-lg transition-colors text-sm uppercase tracking-widest flex-shrink-0">
                                    Registrasi
                                </a>
                            </div>
                        </div>

                        <div class="relative flex py-4 items-center">
                            <div class="flex-grow border-t border-slate-200"></div>
                            <span class="flex-shrink-0 mx-6 text-slate-400 text-xs font-black tracking-[0.3em]">ATAU</span>
                            <div class="flex-grow border-t border-slate-200"></div>
                        </div>

                        <div class="group p-8 border-2 border-slate-100 bg-white rounded-3xl hover:border-emerald-200 hover:shadow-lg transition-all duration-300">
                            <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                                <div class="text-center md:text-left">
                                    <h3 class="font-black text-slate-800 text-xl uppercase tracking-tighter">Sudah Mendaftar?</h3>
                                    <p class="text-sm text-slate-500 mt-1 font-medium">Pantau status & lengkapi berkas Anda.</p>
                                </div>
                                <a href="<?= base_url('login') ?>" class="border-2 border-slate-200 text-slate-700 hover:bg-emerald-600 hover:text-white hover:border-emerald-600 px-8 py-3 rounded-2xl font-black transition-all text-sm uppercase tracking-widest flex-shrink-0">
                                    Login
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-slate-50 px-10 py-6 text-center border-t border-slate-100">
                    <p class="text-sm text-slate-500 font-medium italic">
                        Butuh bantuan teknis? Hubungi Admin PSB: 
                        <a href="https://wa.me/6281234567890" target="_blank" class="text-emerald-600 font-bold hover:underline ml-1">0812-3456-7890</a>
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->include('components/footer') ?>

<?= $this->endSection() ?>