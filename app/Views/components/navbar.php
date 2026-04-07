<nav class="bg-white/95 backdrop-blur-md shadow-sm sticky top-0 z-50 font-sans border-b border-gray-100 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">
            
            <div class="flex-shrink-0 flex items-center">
                <a href="<?= base_url('/') ?>" class="flex items-center gap-3 group">
                    <img src="<?= base_url('images/logo.png') ?>" alt="Logo Pesantren" class="h-10 w-auto object-contain transition-transform transform group-hover:scale-105">
                    
                    <div class="flex flex-col justify-center">
                        <span class="text-[10px] font-bold text-emerald-500 uppercase tracking-[0.2em] leading-tight">
                            Pondok Pesantren
                        </span>
                        <span class="text-sm md:text-base font-extrabold text-emerald-700 leading-tight">
                            Banyu Agung Ibnu Saut Bintoro
                        </span>
                    </div>
                </a>
            </div>
            
            <div class="hidden lg:flex items-center gap-8">
                
                <nav class="flex gap-6 items-center">
                    <a href="<?= base_url('/') ?>" class="text-sm transition-colors <?= uri_string() == '' ? 'text-emerald-600 font-bold' : 'text-gray-500 font-medium hover:text-emerald-600' ?>">Beranda</a>
                    
                    <a href="<?= base_url('profil') ?>" class="text-sm transition-colors <?= uri_string() == 'profil' ? 'text-emerald-600 font-bold' : 'text-gray-500 font-medium hover:text-emerald-600' ?>">Profil</a>
                    
                    <a href="<?= base_url('program') ?>" class="text-sm transition-colors <?= uri_string() == 'program' ? 'text-emerald-600 font-bold' : 'text-gray-500 font-medium hover:text-emerald-600' ?>">Program</a>
                    
                    <div class="relative group">
                        <button class="flex items-center gap-1 text-sm font-medium transition-colors focus:outline-none py-2 <?= (uri_string() == 'berita' || uri_string() == 'prestasi' || uri_string() == 'galeri' || strpos(uri_string(), 'berita/detail') !== false) ? 'text-emerald-600 font-bold' : 'text-gray-500 hover:text-emerald-600' ?>">
                            Publikasi
                            <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        
                        <div class="absolute left-0 mt-0 w-48 bg-white rounded-xl shadow-xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform group-hover:translate-y-2">
                            <div class="py-2">
                                <a href="<?= base_url('berita') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-600">Berita</a>
                                <a href="<?= base_url('prestasi') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-600">Prestasi Santri</a>
                                <a href="<?= base_url('galeri') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-600">Galeri Kegiatan</a>
                            </div>
                        </div>
                    </div>

                    <a href="<?= base_url('kontak') ?>" class="text-sm transition-colors <?= uri_string() == 'kontak' ? 'text-emerald-600 font-bold' : 'text-gray-500 font-medium hover:text-emerald-600' ?>">Kontak</a>
                </nav>

                <div class="h-6 w-px bg-gray-200"></div>

                <a href="<?= base_url('psb') ?>" 
                   class="bg-emerald-600 text-white px-5 py-2 rounded-full shadow-md shadow-emerald-200 hover:bg-emerald-700 hover:shadow-lg transition-all transform hover:-translate-y-0.5 font-bold text-sm flex items-center gap-2 group">
                    <span>PSB</span>
                    <div class="bg-white/20 rounded-full p-0.5 group-hover:translate-x-1 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                </a>

            </div>

            <div class="lg:hidden flex items-center">
                <button type="button" onclick="toggleMobileMenu()" class="text-gray-500 hover:text-emerald-600 focus:outline-none p-2 rounded-md hover:bg-emerald-50 transition">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-gray-100 absolute w-full left-0 shadow-lg h-screen overflow-y-auto pb-20">
        <div class="px-4 pt-4 pb-6 space-y-2">
            <a href="<?= base_url('/') ?>" class="block px-4 py-3 rounded-lg text-base font-bold <?= uri_string() == '' ? 'text-emerald-700 bg-emerald-50' : 'text-gray-600 hover:bg-gray-50' ?>">Beranda</a>
            <a href="<?= base_url('profil') ?>" class="block px-4 py-3 rounded-lg text-base font-medium <?= uri_string() == 'profil' ? 'text-emerald-700 bg-emerald-50' : 'text-gray-600 hover:bg-gray-50' ?>">Profil</a>
            <a href="<?= base_url('program') ?>" class="block px-4 py-3 rounded-lg text-base font-medium <?= uri_string() == 'program' ? 'text-emerald-700 bg-emerald-50' : 'text-gray-600 hover:bg-gray-50' ?>">Program</a>
            
            <div>
                <button onclick="togglePublikasiMobile()" class="w-full flex justify-between items-center px-4 py-3 rounded-lg text-base font-medium text-gray-600 hover:bg-gray-50 focus:outline-none">
                    <span>Publikasi</span>
                    <svg id="icon-publikasi" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div id="submenu-publikasi" class="hidden pl-4 space-y-1 mt-1">
                    <a href="<?= base_url('berita') ?>" class="block px-4 py-2 rounded-lg text-sm text-gray-500 hover:text-emerald-600 hover:bg-emerald-50">Berita</a>
                    <a href="<?= base_url('prestasi') ?>" class="block px-4 py-2 rounded-lg text-sm text-gray-500 hover:text-emerald-600 hover:bg-emerald-50">Prestasi Santri</a>
                    <a href="<?= base_url('galeri') ?>" class="block px-4 py-2 rounded-lg text-sm text-gray-500 hover:text-emerald-600 hover:bg-emerald-50">Galeri Kegiatan</a>
                </div>
            </div>

            <a href="<?= base_url('kontak') ?>" class="block px-4 py-3 rounded-lg text-base font-medium <?= uri_string() == 'kontak' ? 'text-emerald-700 bg-emerald-50' : 'text-gray-600 hover:bg-gray-50' ?>">Kontak</a>
            
            <div class="pt-6 mt-4 border-t border-gray-100">
                <a href="<?= base_url('psb') ?>" class="block w-full text-center bg-emerald-600 text-white px-4 py-3.5 rounded-xl font-bold shadow-lg shadow-emerald-200 hover:bg-emerald-700 mb-3">
                    Penerimaan Santri Baru
                </a>
                <a href="<?= base_url('login') ?>" class="block w-full text-center bg-white border-2 border-emerald-600 text-emerald-700 px-4 py-3.5 rounded-xl font-bold hover:bg-emerald-50">
                    Login Calon Santri
                </a>
            </div>
        </div>
    </div>
</nav>

<script>
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    }

    function togglePublikasiMobile() {
        const submenu = document.getElementById('submenu-publikasi');
        const icon = document.getElementById('icon-publikasi');
        
        if (submenu.classList.contains('hidden')) {
            submenu.classList.remove('hidden');
            icon.classList.add('rotate-180');
        } else {
            submenu.classList.add('hidden');
            icon.classList.remove('rotate-180');
        }
    }
</script>