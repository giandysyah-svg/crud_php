<?php
include_once "controllers/BukuController.php"; //[cite: 5]
$controller = new BukuController(); //[cite: 5]
$data = $controller->model->getAll(); //[cite: 5]
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Lib - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script> <!--[cite: 5] -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> <!--[cite: 5] -->
    <style>
        /* Mengganti background radial dengan gambar asli perpustakaan ditambah overlay gelap */
        body {
            background-color: #0f172a; /* Warna dasar */
            background-image: linear-gradient(rgba(15, 23, 42, 0.85), rgba(15, 23, 42, 0.95)), url('https://images.unsplash.com/photo-1521587760476-6c12a4b040da?q=80&w=2070&auto=format&fit=crop');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }
        .glass-card {
            background: rgba(30, 41, 59, 0.65); /* Sedikit lebih transparan agar background terlihat */
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }
        .neo-button {
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.4);
        }
        .neo-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.6);
        }
    </style>
</head>
<body class="text-slate-200 font-sans min-h-screen pb-10">

    <!-- Navigation dengan Logo Baru -->
    <nav class="border-b border-slate-800/50 bg-slate-900/60 sticky top-0 z-50 backdrop-blur-xl">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center gap-4">
                <!-- Tambahan Logo Gambar (Kamu bisa ganti URL 'src' dengan logo lokalmu misal: 'assets/logo.png') -->
                <img src="logo garuda.png" alt="Logo Garuda" class="h-10 w-auto opacity-90 drop-shadow-lg">
                
                <div class="h-8 w-px bg-slate-700 hidden sm:block"></div> <!-- Garis pemisah -->
                
                <div>
                    <span class="text-xl font-bold tracking-tighter text-white block leading-tight">PERPUSTAKAAN <span class="text-blue-500">GIAN</span></span>
                    <span class="text-[10px] text-slate-400 font-medium tracking-widest uppercase">Perpustakaan Nasional</span>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <span class="text-sm text-slate-400 hidden md:block italic">Admin Perpustakaan Pusat</span>
                <div class="w-10 h-10 rounded-full bg-slate-700 border border-slate-600 flex items-center justify-center overflow-hidden">
                    <img src="https://ui-avatars.com/api/?name=Admin+Pusat&background=0D8ABC&color=fff" alt="Admin Profile">
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-6 mt-10">
        <!-- Stats Header -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="glass-card p-6 rounded-3xl relative overflow-hidden group">
                <!-- Elemen dekoratif background pada card -->
                <div class="absolute -right-6 -top-6 text-slate-800 opacity-30 group-hover:opacity-40 transition-opacity">
                    <i class="fas fa-layer-group text-8xl"></i>
                </div>
                
                <div class="relative z-10">
                    <p class="text-slate-400 text-sm font-medium tracking-wider uppercase">Total Koleksi</p>
                    <h3 class="text-4xl font-bold text-white mt-2"><?= $data->num_rows ?> <span class="text-base font-normal text-slate-500">Buku Terdaftar</span></h3> <!--[cite: 5] -->
                </div>
            </div>
            <div class="md:col-span-2 flex justify-end items-center">
                <a href="views/tambah.php" class="neo-button bg-blue-600 hover:bg-blue-500 text-white px-8 py-4 rounded-2xl font-bold flex items-center gap-3"> <!--[cite: 5] -->
                    <i class="fas fa-plus-circle"></i> Tambah Katalog Baru <!--[cite: 5] -->
                </a>
            </div>
        </div>

        <!-- Main Table -->
        <div class="glass-card rounded-3xl overflow-hidden shadow-2xl">
            <div class="p-6 border-b border-slate-700/50 flex flex-col md:flex-row justify-between gap-4 bg-slate-800/30">
                <h2 class="text-xl font-semibold text-white flex items-center gap-3">
                    <div class="p-2 bg-blue-500/20 rounded-lg">
                        <i class="fas fa-list text-blue-400"></i>
                    </div>
                    Inventaris Buku <!--[cite: 5] -->
                </h2>
                <div class="relative">
                    <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-500"></i> <!--[cite: 5] -->
                    <input type="text" placeholder="Cari berdasarkan judul atau penulis..." class="bg-slate-900/60 border border-slate-700 rounded-xl py-2 pl-12 pr-4 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm w-full md:w-80 transition-all text-white placeholder-slate-500 backdrop-blur-sm">
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-slate-400 text-xs uppercase tracking-widest bg-slate-900/40">
                            <th class="py-5 px-6 text-left font-semibold">Detail Buku</th> <!--[cite: 5] -->
                            <th class="py-5 px-6 text-left font-semibold">Penerbit & Tahun</th> <!--[cite: 5] -->
                            <th class="py-5 px-6 text-left font-semibold">Kategori</th> <!--[cite: 5] -->
                            <th class="py-5 px-6 text-center font-semibold">Tindakan</th> <!--[cite: 5] -->
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-700/50">
                        <?php while($row = $data->fetch_assoc()) : ?> <!--[cite: 5] -->
                        <tr class="hover:bg-slate-800/40 transition-all group">
                            <td class="py-5 px-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-16 bg-slate-800 rounded-lg flex items-center justify-center border border-slate-700 group-hover:border-blue-500/50 group-hover:shadow-[0_0_15px_rgba(59,130,246,0.2)] transition-all">
                                        <i class="fas fa-book text-slate-500 group-hover:text-blue-400 text-xl"></i>
                                    </div>
                                    <div>
                                        <div class="text-white font-semibold mb-1 text-lg group-hover:text-blue-300 transition-colors"><?= $row['judul']; ?></div> <!--[cite: 5] -->
                                        <div class="text-slate-400 text-sm flex items-center gap-2"> <!--[cite: 5] -->
                                            <i class="fas fa-pen-nib text-[10px] text-amber-500/70"></i> <?= $row['pengarang']; ?> <!--[cite: 5] -->
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-5 px-6">
                                <div class="text-slate-300 text-sm font-medium"><?= $row['penerbit']; ?></div> <!--[cite: 5] -->
                                <div class="text-slate-500 text-xs font-mono mt-1 flex items-center gap-1"> <!--[cite: 5] -->
                                    <i class="far fa-calendar-alt text-[10px]"></i> <?= $row['tahun_terbit']; ?> <!--[cite: 5] -->
                                </div>
                            </td>
                            <td class="py-5 px-6">
                                <span class="bg-blue-500/10 text-blue-400 border border-blue-500/30 px-3 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-wider backdrop-blur-sm"> <!--[cite: 5] -->
                                    <?= $row['nama_kategori']; ?> <!--[cite: 5] -->
                                </span>
                            </td>
                            <td class="py-5 px-6">
                                <div class="flex justify-center gap-3"> <!--[cite: 5] -->
                                    <a href="views/edit.php?id=<?= $row['id']; ?>" class="w-10 h-10 rounded-xl bg-slate-800 border border-slate-700 text-amber-500 flex items-center justify-center hover:bg-amber-500 hover:text-white hover:border-amber-500 transition-all shadow-sm group-hover:opacity-100" title="Edit Data"> <!--[cite: 5] -->
                                        <i class="fas fa-edit"></i> <!--[cite: 5] -->
                                    </a>
                                    <a href="index.php?hapus=<?= $row['id']; ?>" onclick="return confirm('Hapus buku ini dari arsip?')" class="w-10 h-10 rounded-xl bg-slate-800 border border-slate-700 text-red-500 flex items-center justify-center hover:bg-red-500 hover:text-white hover:border-red-500 transition-all shadow-sm" title="Hapus Data"> <!--[cite: 5] -->
                                        <i class="fas fa-trash-alt"></i> <!--[cite: 5] -->
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile; ?> <!--[cite: 5] -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>