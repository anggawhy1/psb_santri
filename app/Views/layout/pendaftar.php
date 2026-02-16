<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Panel Santri' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        
        /* Transisi Halus */
        .layout-transition { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        
        /* Sembunyikan scrollbar sidebar */
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

    <div id="sidebar-overlay" onclick="toggleSidebarMobile()" class="fixed inset-0 bg-black/50 z-30 hidden lg:hidden glass-effect transition-opacity"></div>

    <?= $this->include('components/sidebar-pendaftar') ?>

    <div id="main-content" class="layout-transition min-h-screen flex flex-col lg:ml-64">
        
        <?= $this->include('components/navbar-pendaftar') ?>

        <main class="flex-1 p-4 md:p-6 overflow-x-hidden">
            <?= $this->renderSection('content') ?>
        </main>

        <footer class="bg-white border-t p-4 text-center text-xs text-gray-400">
            &copy; <?= date('Y') ?> Panel Santri PSB.
        </footer>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');
        const overlay = document.getElementById('sidebar-overlay');
        const sidebarTexts = document.querySelectorAll('.sidebar-text');
        const logoText = document.getElementById('logo-text');
        
        // --- LOGIKA DESKTOP (COLLAPSE/EXPAND) ---
        function toggleSidebarDesktop() {
            if (window.innerWidth < 1024) return;

            const isCollapsed = sidebar.classList.contains('w-20');

            if (isCollapsed) {
                // EXPAND
                sidebar.classList.remove('w-20');
                sidebar.classList.add('w-64');
                
                mainContent.classList.remove('lg:ml-20');
                mainContent.classList.add('lg:ml-64');

                setTimeout(() => {
                    if(logoText) logoText.classList.remove('hidden');
                    sidebarTexts.forEach(el => el.classList.remove('hidden'));
                }, 100); 
                
            } else {
                // COLLAPSE
                sidebar.classList.remove('w-64');
                sidebar.classList.add('w-20');

                mainContent.classList.remove('lg:ml-64');
                mainContent.classList.add('lg:ml-20');

                if(logoText) logoText.classList.add('hidden');
                sidebarTexts.forEach(el => el.classList.add('hidden'));
            }
        }

        // --- LOGIKA MOBILE (SHOW/HIDE) ---
        function toggleSidebarMobile() {
            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }
        }

        // --- DROPDOWN PROFIL ---
        function toggleProfileMenu() {
            const menu = document.getElementById('profile-menu');
            menu.classList.toggle('hidden');
        }

        // Close dropdown profil kalau klik di luar
        window.addEventListener('click', function(e) {
            const btn = document.getElementById('profile-btn');
            const menu = document.getElementById('profile-menu');
            if (btn && menu && !btn.contains(e.target) && !menu.contains(e.target)) {
                menu.classList.add('hidden');
            }
        });
    </script>
</body>
</html>