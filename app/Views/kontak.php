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
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
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
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Telepon / WhatsApp</p>
                            <p class="text-slate-700 font-medium text-lg font-mono tracking-tight">+62 856-2475-4265</p>
                        </div>
                    </li>

                    <li class="flex items-start gap-5 group">
                        <div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:bg-emerald-600 group-hover:text-white transition duration-300 shadow-sm">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Email Resmi</p>
                            <p class="text-slate-700 font-medium text-lg">yayasanibnusautbintoro@gmail.com</p>
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