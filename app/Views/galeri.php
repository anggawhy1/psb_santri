<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<?= $this->include('components/navbar') ?>

<div class="bg-emerald-900 py-24 text-center text-white relative">
    <div class="relative z-10 max-w-4xl mx-auto px-4">
        <span class="text-emerald-300 font-bold tracking-widest uppercase text-sm mb-2 block">Publikasi</span>
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Galeri Kegiatan</h1>
        <p class="text-emerald-100 text-lg max-w-2xl mx-auto font-light">
            Lensa Pondok: Dokumentasi visual aktivitas harian santri.
        </p>
    </div>
</div>

<div class="bg-slate-50 min-h-screen py-20 relative">
    <div class="absolute top-0 left-0 w-full h-64 bg-emerald-900/5 rounded-b-[50px]"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <?php if(empty($galeri)): ?>
            <div class="text-center py-24 bg-white rounded-3xl border border-dashed border-slate-300 shadow-sm">
                <p class="text-slate-500 font-medium">Belum ada foto.</p>
            </div>
        <?php else: ?>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                <?php foreach($galeri as $item): ?>
                
                <div onclick="openModal('<?= base_url('uploads/konten/' . $item['path_gambar']) ?>', '<?= esc($item['judul']) ?>', '<?= date('d M Y', strtotime($item['created_at'])) ?>')" 
                     class="group bg-white rounded-3xl overflow-hidden shadow-sm border border-emerald-100 cursor-pointer hover:shadow-xl hover:shadow-emerald-100/50 transition-all duration-300 transform hover:-translate-y-1 h-full flex flex-col">
                    
                    <div class="h-64 w-full relative overflow-hidden">
                        <img src="<?= base_url('uploads/konten/' . $item['path_gambar']) ?>" 
                             class="w-full h-full object-cover transition duration-700 group-hover:scale-110" 
                             alt="<?= esc($item['judul']) ?>">
                        
                        <div class="absolute inset-0 bg-emerald-900/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <div class="bg-white/30 backdrop-blur-md p-3 rounded-full text-white transform scale-0 group-hover:scale-100 transition-transform duration-300">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                            </div>
                        </div>

                        <span class="absolute top-4 right-4 bg-emerald-600 text-white text-[10px] font-black px-3 py-1 rounded-full uppercase tracking-wider shadow-md z-10">Galeri</span>
                    </div>

                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <h3 class="font-bold text-slate-800 text-lg leading-snug group-hover:text-emerald-600 transition mb-2 line-clamp-2">
                            <?= esc($item['judul']) ?>
                        </h3>
                        <div class="text-slate-400 text-xs font-bold flex items-center gap-2 mt-auto">
                            <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <?= date('d M Y', strtotime($item['created_at'])) ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="flex justify-center mb-12">
                <div class="bg-white px-6 py-3 rounded-full shadow-sm border border-slate-100">
                    <?= $pager->links('galeri', 'tailwind_full') ?>
                </div>
            </div>

            <div id="imageModal" class="fixed inset-0 z-[9999] hidden" role="dialog" aria-modal="true">
                
                <div class="fixed inset-0 bg-slate-900/90 backdrop-blur-sm transition-opacity" onclick="closeModal()"></div>

                <div class="fixed inset-0 z-[10000] overflow-y-auto">
                    <div class="flex min-h-full items-center justify-center p-4">
                        
                        <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all w-full max-w-md border-4 border-white">
                            
                            <div class="bg-white px-5 py-4 border-b border-slate-100 flex justify-between items-start">
                                <div>
                                    <h3 class="text-base font-bold text-slate-800 leading-tight pr-4" id="modalTitle">Judul Foto</h3>
                                    <p class="text-xs text-slate-400 mt-1 font-medium" id="modalDate">Tanggal</p>
                                </div>
                                <button onclick="closeModal()" type="button" class="bg-slate-100 hover:bg-red-50 text-slate-400 hover:text-red-500 rounded-full p-2 transition focus:outline-none shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                </button>
                            </div>

                            <div id="imageContainer" class="relative w-full h-80 bg-slate-100 overflow-hidden flex items-center justify-center cursor-grab active:cursor-grabbing">
                                
                                <img id="modalImage" src="" alt="Detail Foto" draggable="false"
                                     class="w-full h-full object-contain transition-transform duration-75 ease-linear origin-center select-none will-change-transform">
                                
                                <div class="absolute bottom-4 right-4 flex items-center gap-2 bg-white/80 backdrop-blur-sm p-1.5 rounded-full shadow-lg border border-slate-200 pointer-events-auto z-10">
                                    <button onclick="zoomOut()" class="p-1.5 text-slate-600 hover:text-emerald-600 hover:bg-emerald-50 rounded-full transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>
                                    </button>
                                    
                                    <button onclick="resetZoomManual()" class="p-1.5 text-slate-600 hover:text-emerald-600 hover:bg-emerald-50 rounded-full transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                    </button>

                                    <button onclick="zoomIn()" class="p-1.5 text-slate-600 hover:text-emerald-600 hover:bg-emerald-50 rounded-full transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                    </button>
                                </div>
                            </div>

                             <div class="bg-slate-50 px-5 py-3 border-t border-slate-100 flex justify-end">
                                <a id="downloadLink" href="#" download class="text-xs font-bold text-emerald-600 hover:text-emerald-700 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                    Unduh Foto
                                </a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>
    </div>
</div>

<script>
    let state = {
        scale: 1,
        pX: 0,
        pY: 0,
        isDragging: false,
        startX: 0,
        startY: 0
    };

    const config = {
        minScale: 1,
        maxScale: 5,
        step: 0.5
    };

    const elements = {
        modal: document.getElementById('imageModal'),
        img: document.getElementById('modalImage'),
        container: document.getElementById('imageContainer'),
        title: document.getElementById('modalTitle'),
        date: document.getElementById('modalDate'),
        download: document.getElementById('downloadLink')
    };

    function openModal(src, title, date) {
        state.scale = 1;
        state.pX = 0;
        state.pY = 0;
        updateTransform();

        elements.img.src = src;
        elements.title.innerText = title;
        elements.date.innerText = date;
        elements.download.href = src;
        
        elements.modal.classList.remove('hidden');
        setTimeout(() => {
            elements.modal.querySelector('.transform').classList.add('scale-100');
            elements.modal.querySelector('.transform').classList.remove('scale-95');
        }, 10);
        document.body.style.overflow = 'hidden'; 
    }

    function closeModal() {
        elements.modal.classList.add('hidden');
        document.body.style.overflow = 'auto'; 
    }

    function updateTransform() {
        state.scale = Math.min(Math.max(state.scale, config.minScale), config.maxScale);

        const containerRect = elements.container.getBoundingClientRect();
        const imgWidth = elements.img.offsetWidth * state.scale;
        const imgHeight = elements.img.offsetHeight * state.scale;

        const rangeX = Math.max(0, (imgWidth - containerRect.width) / 2);
        const rangeY = Math.max(0, (imgHeight - containerRect.height) / 2);

        state.pX = Math.min(Math.max(state.pX, -rangeX), rangeX);
        state.pY = Math.min(Math.max(state.pY, -rangeY), rangeY);

        elements.img.style.transform = `translate(${state.pX}px, ${state.pY}px) scale(${state.scale})`;
        
        if (state.scale > 1) {
            elements.container.style.cursor = state.isDragging ? 'grabbing' : 'grab';
        } else {
            elements.container.style.cursor = 'default';
        }
    }

    function zoomIn() {
        state.scale += config.step;
        updateTransform();
    }

    function zoomOut() {
        state.scale -= config.step;
        updateTransform();
    }

    function resetZoomManual() {
        state.scale = 1;
        state.pX = 0;
        state.pY = 0;
        updateTransform();
    }

    elements.container.addEventListener('wheel', (e) => {
        e.preventDefault();
        const delta = Math.sign(e.deltaY) * -0.2;
        state.scale += delta;
        updateTransform();
    });

    elements.container.addEventListener('mousedown', (e) => {
        if (state.scale <= 1) return;
        e.preventDefault();
        state.isDragging = true;
        state.startX = e.clientX - state.pX;
        state.startY = e.clientY - state.pY;
        elements.container.style.cursor = 'grabbing';
    });

    window.addEventListener('mousemove', (e) => {
        if (!state.isDragging) return;
        e.preventDefault();
        state.pX = e.clientX - state.startX;
        state.pY = e.clientY - state.startY;
        updateTransform();
    });

    window.addEventListener('mouseup', () => {
        state.isDragging = false;
        if(state.scale > 1) elements.container.style.cursor = 'grab';
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === "Escape") closeModal();
    });
</script>

<?= $this->include('components/footer') ?>
<?= $this->endSection() ?>