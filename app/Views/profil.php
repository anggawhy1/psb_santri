<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<?= $this->include('components/navbar') ?>

<div class="bg-emerald-900 py-24 text-center text-white relative">
    <div class="relative z-10 max-w-4xl mx-auto px-4">
        <span class="text-emerald-300 font-bold tracking-widest uppercase text-sm mb-2 block">Tentang Kami</span>
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Profil Pondok Pesantren</h1>
        <p class="text-emerald-100 text-lg max-w-2xl mx-auto font-light">
            Mengenal lebih dekat jejak langkah, visi, dan suasana pesantren.
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
                        Dari Majelis Sederhana, Mengalirkan Keberkahan Ilmu.
                    </h3>
                    <div class="space-y-4 text-slate-600 leading-relaxed text-justify">
                        <p>
                            <span class="font-bold text-emerald-700">Pondok Pesantren Trans Spiritual-Sains Banyu Agung Ibnu Saut Bintoro</span> didirikan dengan niat tulus untuk mencetak generasi Islami yang kokoh aqidahnya dan mulia akhlaknya. Perjalanan kami bermula dari sebuah majelis sederhana, tempat para santri pertama kali mengeja ayat-ayat suci Al-Qur'an dan mengenal adab.
                        </p>
                        <p>
                            Seiring besarnya kepercayaan masyarakat, kami terus berkembang. Nama <strong>"Banyu Agung"</strong> dipilih sebagai doa, melambangkan sumber ilmu yang deras, jernih, dan tak pernah kering, membawa keberkahan bagi sekitarnya.
                        </p>
                        <p>
                            Kini, pesantren hadir mengusung konsep <strong>Trans Spiritual-Sains</strong>—memadukan keagungan tradisi salaf (Kitab Kuning) dan Tahfidz dengan wawasan keilmuan modern. Kami berikhtiar menjadi fondasi spiritual yang kuat bagi santri dalam mengiringi pendidikan formal mereka, demi mempersiapkan pemimpin masa depan umat yang cerdas, beradab, dan <strong>berdaya saing global</strong>.
                        </p>
                    </div>
                </div>

                <div class="order-1 lg:order-2 relative h-[400px]">
                    <div class="absolute top-0 right-0 w-4/5 h-4/5 rounded-2xl overflow-hidden shadow-2xl border-4 border-white transform rotate-3 hover:rotate-0 transition duration-500 z-10">
                        <img src="<?= base_url('images/hero.png') ?>" class="w-full h-full object-cover">
                    </div>
                    <div class="absolute bottom-0 left-0 w-3/5 h-3/5 rounded-2xl overflow-hidden shadow-lg border-4 border-emerald-100 transform -rotate-6 hover:rotate-0 transition duration-500 z-20">
                        <img src="<?= base_url('images/hero1.png') ?>" class="w-full h-full object-cover grayscale hover:grayscale-0 transition duration-500">
                    </div>
                    <div class="absolute -bottom-5 -right-5 w-24 h-24 bg-amber-400 rounded-full blur-3xl opacity-30"></div>
                </div>

            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-20">
            <div class="bg-white p-10 rounded-3xl shadow-md border border-slate-100 hover:shadow-xl transition duration-300">
                <div class="w-16 h-16 text-emerald-600 flex items-center justify-start mb-6">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-slate-800 mb-4">Visi Pondok</h3>
                <p class="text-lg text-slate-600 italic font-medium leading-relaxed pl-4 border-l-4 border-emerald-500">
                    "Melahirkan Generasi yang Cerdas Intelektual-Spiritual, Berilmu dan Beradab."
                </p>
            </div>

            <div class="bg-white p-10 rounded-3xl shadow-md border border-slate-100 hover:shadow-xl transition duration-300">
                <div class="w-16 h-16 text-emerald-600 flex items-center justify-start mb-6">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-slate-800 mb-4">Misi Kami</h3>
                <ul class="space-y-4 text-slate-600">
                    <li class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Memperkokoh keimanan dan budi pekerti.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Berwawasan luas.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Bersaing secara global.</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="mb-16">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800 tracking-tight">Fasilitas & Suasana Asrama</h2>
                <p class="text-slate-500 mt-4 max-w-2xl mx-auto leading-relaxed text-sm md:text-base">
                    Menyediakan fasilitas asrama yang representatif, aman, dan nyaman. Kami berupaya menciptakan lingkungan yang asri dan kondusif agar santri bisa fokus menuntut ilmu, menghafal Al-Qur'an, serta beribadah dengan tenang.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">

                <div class="relative h-64 rounded-2xl overflow-hidden cursor-pointer shadow-md hover:shadow-xl transition">
                    <img src="<?= base_url('images/hero7.png') ?>" class="w-full h-full object-cover">
                </div>

                <div class="relative h-64 rounded-2xl overflow-hidden cursor-pointer shadow-md hover:shadow-xl transition">
                    <img src="<?= base_url('images/hero1.png') ?>" class="w-full h-full object-cover">
                </div>

                <div class="relative h-64 rounded-2xl overflow-hidden cursor-pointer shadow-md hover:shadow-xl transition">
                    <img src="<?= base_url('images/hero5.png') ?>" class="w-full h-full object-cover">
                </div>

                <div class="relative h-64 rounded-2xl overflow-hidden cursor-pointer shadow-md hover:shadow-xl transition">
                    <img src="<?= base_url('images/hero9.png') ?>" class="w-full h-full object-cover">
                </div>

                <div class="relative h-64 rounded-2xl overflow-hidden cursor-pointer shadow-md hover:shadow-xl transition">
                    <img src="<?= base_url('images/hero4.png') ?>" class="w-full h-full object-cover">
                </div>

                <div class="relative h-64 rounded-2xl overflow-hidden cursor-pointer shadow-md hover:shadow-xl transition">
                    <img src="<?= base_url('images/hero6.png') ?>" class="w-full h-full object-cover">
                </div>

                <div class="relative h-64 rounded-2xl overflow-hidden cursor-pointer shadow-md hover:shadow-xl transition">
                    <img src="<?= base_url('images/hero3.png') ?>" class="w-full h-full object-cover">
                </div>

                <div class="relative h-64 rounded-2xl overflow-hidden cursor-pointer shadow-md hover:shadow-xl transition">
                    <img src="<?= base_url('images/hero8.png') ?>" class="w-full h-full object-cover">
                </div>

                <div class="relative h-64 rounded-2xl overflow-hidden cursor-pointer shadow-md hover:shadow-xl transition">
                    <img src="<?= base_url('images/hero2.png') ?>" class="w-full h-full object-cover">
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