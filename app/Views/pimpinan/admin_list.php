<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="max-w-6xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <div>
                <h2 class="text-xl font-bold text-gray-800">Kelola Akun Admin</h2>
                <p class="text-sm text-gray-500">Daftar admin operasional yang memiliki akses sistem.</p>
            </div>
            <a href="<?= base_url('pimpinan/admin/tambah') ?>" class="flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2.5 px-5 rounded-lg transition shadow-md text-sm active:scale-95">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Admin
            </a>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-lg mb-6 flex items-center gap-2 text-sm shadow-sm animate-fadeIn">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b font-black tracking-wider">
                    <tr>
                        <th class="px-6 py-4 w-12 text-center">No</th>
                        <th class="px-6 py-4">Nama Lengkap</th>
                        <th class="px-6 py-4 text-center">Username</th>
                        <th class="px-6 py-4 text-center w-48">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($admins)): ?>
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-gray-400 italic">Belum ada data admin.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($admins as $index => $admin): ?>
                            <tr class="bg-white border-b hover:bg-gray-50 transition group">
                                <td class="px-6 py-4 text-center text-gray-400 font-bold"><?= $index + 1 ?></td>
                                <td class="px-6 py-4">
                                    <div class="font-bold text-gray-900"><?= esc($admin['nama_lengkap']) ?></div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span class="font-mono text-xs text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-md border border-emerald-100">
                                        @<?= esc($admin['username']) ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button
                                            onclick='openModalEdit(<?= json_encode($admin) ?>)'
                                            class="h-9 w-9 flex items-center justify-center bg-blue-50 text-blue-600 rounded-xl border border-blue-100 hover:bg-blue-600 hover:text-white transition shadow-sm" title="Edit Admin">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </button>
                                        <button
                                            onclick="openModalHapus(<?= $admin['id_user'] ?>)"
                                            class="h-9 w-9 flex items-center justify-center bg-red-50 text-red-600 rounded-xl border border-red-100 hover:bg-red-600 hover:text-white transition shadow-sm" title="Hapus Admin">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="modalHapus" class="fixed inset-0 z-[120] hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex min-h-screen items-center justify-center p-4 text-center sm:p-0">
            <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity" onclick="closeModalHapus()"></div>

            <div class="relative transform overflow-hidden rounded-[32px] bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-md border border-gray-100 animate-popIn">
                <div class="bg-white px-8 pb-6 pt-10 text-center">
                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-3xl bg-red-50 text-red-600 mb-6 shadow-sm">
                        <svg class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-black text-gray-900 uppercase tracking-tighter">Hapus Akses Admin?</h3>
                    <div class="mt-3">
                        <p class="text-sm text-gray-500 leading-relaxed font-medium">Tindakan ini tidak dapat dibatalkan. Akun admin ini akan segera kehilangan akses ke sistem operasional.</p>
                    </div>
                </div>
                <div class="bg-gray-50/50 px-8 py-6 flex flex-col gap-3">
                    <a id="btnKonfirmasiHapus" href="#" class="w-full bg-red-600 text-white py-4 rounded-2xl text-sm font-black uppercase tracking-widest hover:bg-red-700 transition-all shadow-xl shadow-red-200 text-center">
                        Ya, Hapus Permanen
                    </a>
                    <button type="button" onclick="closeModalHapus()" class="w-full bg-white text-gray-500 py-3 rounded-2xl text-xs font-bold hover:text-gray-800 transition-colors border border-transparent hover:border-gray-200">
                        Batalkan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modalEdit" class="fixed inset-0 z-[110] hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex min-h-screen items-center justify-center p-4 text-center sm:p-0">
        <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-md transition-opacity" onclick="closeModalEdit()"></div>

        <div class="relative transform overflow-hidden rounded-[32px] bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-md border border-gray-100 animate-popIn">
            <form action="<?= base_url('pimpinan/updateAdmin') ?>" method="POST">
                <input type="hidden" name="id_user" id="edit_id_user">
                <div class="bg-white px-8 pb-6 pt-10">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="h-14 w-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center shadow-sm">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-black text-gray-900 uppercase tracking-tighter">Edit Akun Admin</h3>
                            <p class="text-xs text-gray-400 font-bold uppercase tracking-widest">Perbarui informasi akses</p>
                        </div>
                    </div>

                    <div class="space-y-5">
                        <div>
                            <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" id="edit_nama" required class="w-full border-gray-200 rounded-xl mt-2 focus:ring-blue-500 h-12 px-4 font-bold text-gray-700 shadow-sm">
                        </div>
                        <div>
                            <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Username</label>
                            <input type="text" name="username" id="edit_username" required class="w-full border-gray-200 rounded-xl mt-2 focus:ring-blue-500 h-12 px-4 font-bold text-gray-700 shadow-sm">
                        </div>
                        <div class="bg-yellow-50 p-4 rounded-2xl border border-yellow-100">
                            <label class="text-[10px] font-black text-yellow-600 uppercase tracking-widest ml-1">Ganti Password (Opsional)</label>
                            <input type="password" name="password" class="w-full border-yellow-200 rounded-xl mt-2 focus:ring-yellow-500 h-12 px-4 text-sm shadow-sm" placeholder="Isi hanya jika ingin ganti">
                        </div>
                    </div>
                </div>
                <div class="bg-blue-50/50 px-8 py-6 flex flex-col gap-3 border-t border-blue-100">
                    <button type="submit" class="w-full bg-blue-600 text-white py-4 rounded-2xl text-sm font-black uppercase tracking-widest hover:bg-blue-700 transition-all shadow-xl shadow-blue-200 active:scale-95">
                        Simpan Perubahan
                    </button>

                    <button type="button" onclick="closeModalEdit()" class="w-full bg-white text-gray-500 py-3 rounded-2xl text-xs font-bold hover:text-blue-600 transition-colors border border-transparent hover:border-blue-100">
                        Batalkan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // FUNGSI MODAL EDIT
    function openModalEdit(admin) {
        document.getElementById('edit_id_user').value = admin.id_user;
        document.getElementById('edit_nama').value = admin.nama_lengkap;
        document.getElementById('edit_username').value = admin.username;

        document.getElementById('modalEdit').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeModalEdit() {
        document.getElementById('modalEdit').classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    // FUNGSI MODAL HAPUS
    function openModalHapus(id) {
        const modal = document.getElementById('modalHapus');
        const btnHapus = document.getElementById('btnKonfirmasiHapus');

        // Gabungkan base_url dengan ID yang dikirim dari tombol
        btnHapus.href = "<?= base_url('pimpinan/hapusAdmin') ?>/" + id;

        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeModalHapus() {
        document.getElementById('modalHapus').classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
</script>

<style>
    @keyframes popIn {
        from {
            opacity: 0;
            transform: scale(0.95) translateY(10px);
        }

        to {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }

    .animate-popIn {
        animation: popIn 0.3s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
    }

    .animate-fadeIn {
        animation: fadeIn 0.4s ease-out forwards;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }
</style>

<?= $this->endSection() ?>