<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<?= $this->include('components/navbar') ?>

<div class="bg-emerald-900 py-24 text-center text-white relative">
    <div class="relative z-10 max-w-4xl mx-auto px-4">
        <span class="text-emerald-300 font-bold tracking-widest uppercase text-sm mb-2 block">Tentang Kami</span>
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Profil Pondok Pesantren</h1>
        <p class="text-emerald-100 text-lg max-w-2xl mx-auto font-light">
            Mengenal lebih dekat sejarah, visi, dan komitmen Banyu Agung Ibnu Saut Bintoro dalam mencetak generasi Rabbani.
        </p>
    </div>
</div>

<div class="bg-slate-50 min-h-screen pb-20">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10 relative z-20">

        <div class="bg-white rounded-3xl shadow-xl border border-slate-100 p-8 md:p-12 mb-16">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                
                <div class="order-2 lg:order-1">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="w-12 h-1 bg-emerald-500 rounded-full"></span>
                        <h2 class="text-2xl font-bold text-slate-800 uppercase tracking-wide">Sejarah Singkat</h2>
                    </div>
                    <h3 class="text-3xl font-extrabold text-emerald-900 mb-6 leading-tight">
                        Berawal dari Majelis Kecil, Tumbuh Menjadi Pusat Peradaban.
                    </h3>
                    <div class="space-y-4 text-slate-600 leading-relaxed text-justify">
                        <p>
                            <span class="font-bold text-emerald-700">Pondok Pesantren Banyu Agung Ibnu Saut Bintoro</span> didirikan dengan semangat tulus untuk mencetak generasi Islami yang kokoh dalam aqidah dan luas dalam wawasan. Perjalanan kami dimulai dari sebuah surau sederhana, tempat para santri pertama kali mengeja ayat-ayat suci Al-Qur'an.
                        </p>
                        <p>
                            Seiring berjalannya waktu dan besarnya kepercayaan masyarakat, kami bertransformasi menjadi lembaga pendidikan terpadu. Nama <strong>"Banyu Agung"</strong> dipilih sebagai doa, melambangkan sumber ilmu yang deras, jernih, dan tak pernah kering, membawa keberkahan bagi kehidupan di sekitarnya.
                        </p>
                        <p>
                            Kini, kami memadukan tradisi salaf yang menjaga kemurnian ilmu agama dengan sistem pendidikan modern yang adaptif terhadap teknologi, demi mempersiapkan pemimpin masa depan.
                        </p>
                    </div>
                </div>

                <div class="order-1 lg:order-2 relative h-[400px]">
                    <div class="absolute top-0 right-0 w-4/5 h-4/5 rounded-2xl overflow-hidden shadow-2xl border-4 border-white transform rotate-3 hover:rotate-0 transition duration-500 z-10">
                        <img src="<?= base_url('images/hero.png') ?>" class="w-full h-full object-cover">
                    </div>
                    <div class="absolute bottom-0 left-0 w-3/5 h-3/5 rounded-2xl overflow-hidden shadow-lg border-4 border-emerald-100 transform -rotate-6 hover:rotate-0 transition duration-500 z-20">
                        <img src="<?= base_url('images/hero.png') ?>" class="w-full h-full object-cover grayscale hover:grayscale-0 transition duration-500">
                    </div>
                    <div class="absolute -bottom-5 -right-5 w-24 h-24 bg-amber-400 rounded-full blur-3xl opacity-30"></div>
                </div>

            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-20">
            <div class="bg-white p-10 rounded-3xl shadow-md border border-slate-100 hover:shadow-xl transition duration-300">
                <div class="w-16 h-16 text-emerald-600 flex items-center justify-start mb-6">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-slate-800 mb-4">Visi Pondok</h3>
                <p class="text-lg text-slate-600 italic font-medium leading-relaxed pl-4 border-l-4 border-emerald-500">
                    "Terwujudnya lembaga pendidikan Islam yang unggul dalam Imtaq dan Iptek, berhaluan Ahlussunnah wal Jama'ah, serta melahirkan kader ulama yang berakhlakul karimah."
                </p>
            </div>

            <div class="bg-white p-10 rounded-3xl shadow-md border border-slate-100 hover:shadow-xl transition duration-300">
                <div class="w-16 h-16 text-emerald-600 flex items-center justify-start mb-6">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-slate-800 mb-4">Misi Kami</h3>
                <ul class="space-y-4 text-slate-600">
                    <li class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Menyelenggarakan pendidikan tahfidz Al-Qur'an yang berkualitas dan bersanad.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Mengintegrasikan kurikulum pesantren salaf dengan pendidikan formal nasional.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Membekali santri dengan keterampilan hidup (life skill), bahasa asing, dan teknologi.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Menanamkan nilai-nilai kemandirian, kedisiplinan, dan kepemimpinan.</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="mb-16">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-slate-800">Fasilitas Penunjang</h2>
                <p class="text-slate-500 mt-2">Sarana prasarana yang mendukung kenyamanan dan fokus belajar santri.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <div class="relative group h-64 rounded-2xl overflow-hidden cursor-pointer shadow-md hover:shadow-xl transition">
                    <img src="<?= base_url('images/hero.png') ?>" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex items-end p-6">
                        <h4 class="text-white font-bold text-lg">Masjid Jami' Baitul Ilmi</h4>
                    </div>
                </div>
                <div class="relative group h-64 rounded-2xl overflow-hidden cursor-pointer shadow-md hover:shadow-xl transition">
                    <img src="<?= base_url('images/hero.png') ?>" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex items-end p-6">
                        <h4 class="text-white font-bold text-lg">Gedung Asrama Putra/i</h4>
                    </div>
                </div>
                <div class="relative group h-64 rounded-2xl overflow-hidden cursor-pointer shadow-md hover:shadow-xl transition">
                    <img src="<?= base_url('images/hero.png') ?>" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex items-end p-6">
                        <h4 class="text-white font-bold text-lg">Laboratorium Komputer</h4>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-white p-4 rounded-xl border border-slate-100 flex items-center gap-3 shadow-sm hover:shadow-md transition">
                    <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center text-emerald-600"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg></div>
                    <span class="font-bold text-slate-700 text-sm">Perpustakaan</span>
                </div>
                <div class="bg-white p-4 rounded-xl border border-slate-100 flex items-center gap-3 shadow-sm hover:shadow-md transition">
                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg></div>
                    <span class="font-bold text-slate-700 text-sm">Lab. Sains</span>
                </div>
                <div class="bg-white p-4 rounded-xl border border-slate-100 flex items-center gap-3 shadow-sm hover:shadow-md transition">
                    <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center text-orange-600"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z"></path></svg></div>
                    <span class="font-bold text-slate-700 text-sm">Dapur Higienis</span>
                </div>
                <div class="bg-white p-4 rounded-xl border border-slate-100 flex items-center gap-3 shadow-sm hover:shadow-md transition">
                    <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center text-red-600"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg></div>
                    <span class="font-bold text-slate-700 text-sm">Poskestren</span>
                </div>
                <div class="bg-white p-4 rounded-xl border border-slate-100 flex items-center gap-3 shadow-sm hover:shadow-md transition">
                    <div class="w-10 h-10 bg-teal-100 rounded-lg flex items-center justify-center text-teal-600"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg></div>
                    <span class="font-bold text-slate-700 text-sm">Koperasi/Kantin</span>
                </div>
                <div class="bg-white p-4 rounded-xl border border-slate-100 flex items-center gap-3 shadow-sm hover:shadow-md transition">
                    <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center text-indigo-600"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                    <span class="font-bold text-slate-700 text-sm">Aula Serbaguna</span>
                </div>
                <div class="bg-white p-4 rounded-xl border border-slate-100 flex items-center gap-3 shadow-sm hover:shadow-md transition">
                    <div class="w-10 h-10 bg-lime-100 rounded-lg flex items-center justify-center text-lime-600"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"></path></svg></div>
                    <span class="font-bold text-slate-700 text-sm">MCK Bersih</span>
                </div>
                <div class="bg-white p-4 rounded-xl border border-slate-100 flex items-center gap-3 shadow-sm hover:shadow-md transition">
                    <div class="w-10 h-10 bg-cyan-100 rounded-lg flex items-center justify-center text-cyan-600"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg></div>
                    <span class="font-bold text-slate-700 text-sm">Listrik & Air 24 Jam</span>
                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->include('components/footer') ?>
<?= $this->endSection() ?>