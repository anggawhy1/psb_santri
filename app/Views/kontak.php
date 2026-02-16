<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<?= $this->include('components/navbar') ?>

<div class="bg-emerald-900 py-24 text-center text-white relative">
    <div class="relative z-10 max-w-4xl mx-auto px-4">
        <span class="text-emerald-300 font-bold tracking-widest uppercase text-sm mb-2 block">Hubungi Kami</span>
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Informasi Kontak</h1>
        <p class="text-emerald-100 text-lg max-w-2xl mx-auto font-light">
            Silakan berkunjung untuk silaturahmi atau hubungi kami melalui saluran resmi di bawah ini.
        </p>
    </div>
</div>

<div class="bg-slate-50 min-h-screen py-20 relative">
    <div class="absolute top-0 left-0 w-full h-64 bg-emerald-900/5 rounded-b-[50px]"></div>

    <div class="max-w-6xl mx-auto px-4 relative z-10">
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            
            <div class="bg-white p-10 rounded-3xl shadow-xl border border-slate-100 h-full flex flex-col justify-center">
                <h3 class="font-bold text-2xl text-slate-800 mb-8 border-b border-slate-100 pb-4">Saluran Komunikasi</h3>
                
                <ul class="space-y-8">
                    <li class="flex items-start gap-5 group">
                        <div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:bg-emerald-600 group-hover:text-white transition duration-300 shadow-sm">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Alamat Lengkap</p>
                            <p class="text-slate-700 font-medium leading-relaxed text-lg">
                                Jl. Situs Payak No.83, Bintaran Wetan, Srimulyo, Kec. Piyungan, Kab. Bantul, D.I. Yogyakarta 55792
                            </p>
                        </div>
                    </li>

                    <li class="flex items-start gap-5 group">
                        <div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:bg-emerald-600 group-hover:text-white transition duration-300 shadow-sm">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Telepon / WhatsApp</p>
                            <p class="text-slate-700 font-medium text-lg font-mono tracking-tight">(0274) 1234567</p>
                        </div>
                    </li>

                    <li class="flex items-start gap-5 group">
                        <div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:bg-emerald-600 group-hover:text-white transition duration-300 shadow-sm">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Email Resmi</p>
                            <p class="text-slate-700 font-medium text-lg">admin@banyuagung.ponpes.id</p>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="bg-white p-2 rounded-3xl shadow-xl border border-slate-100 h-[500px] lg:h-auto overflow-hidden relative group">
                <iframe 
                    src="https://maps.google.com/maps?q=Jl.+Situs+Payak+No.83,+Bintaran+Wetan,+Srimulyo,+Kec.+Piyungan,+Kab.+Bantul,+D.I.+Yogyakarta+55792&t=&z=15&ie=UTF8&iwloc=&output=embed" 
                    width="100%" 
                    height="100%" 
                    style="border:0; border-radius: 1.5rem;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade" 
                    class="grayscale group-hover:grayscale-0 transition duration-700">
                </iframe>
                
                <div class="absolute bottom-6 left-6 bg-white/90 backdrop-blur px-4 py-2 rounded-lg text-xs font-bold text-slate-600 shadow-md pointer-events-none">
                    📍 Lokasi Pondok
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->include('components/footer') ?>
<?= $this->endSection() ?>