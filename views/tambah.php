<?php
include_once "../controllers/BukuController.php";
$controller = new BukuController();
$categories = $controller->model->getCategories();

if(isset($_POST['simpan'])) {
    $controller->model->create($_POST['judul'], $_POST['pengarang'], $_POST['penerbit'], $_POST['tahun'], $_POST['kategori']);
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Katalog Baru</title>
    <!-- Script Tailwind & FontAwesome wajib ada agar tampilan tidak hancur -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: #0f172a;
            background-image: radial-gradient(circle at top right, #1e293b, #0f172a);
        }
        .glass-card {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body class="text-slate-200 font-sans min-h-screen flex items-center justify-center p-6">
    <div class="max-w-2xl w-full">
        <!-- Tombol Kembali -->
        <a href="../index.php" class="inline-flex items-center gap-2 text-slate-400 hover:text-white mb-6 transition-colors group">
            <i class="fas fa-arrow-left group-hover:-translate-x-1 transition-transform"></i> Kembali ke Dashboard
        </a>

        <div class="glass-card rounded-[2rem] p-8 md:p-10 shadow-2xl">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-white tracking-tight">Katalog Baru</h2>
                <p class="text-slate-400 mt-2">Lengkapi data untuk menambahkan koleksi buku baru.</p>
            </div>

            <form method="POST" class="space-y-6">
                <!-- Judul -->
                <div class="space-y-2">
                    <label class="text-sm font-medium text-slate-300 ml-1">Judul Buku</label>
                    <input type="text" name="judul" required placeholder="Masukkan judul lengkap..." 
                        class="w-full bg-slate-900/50 border border-slate-700 rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all text-white placeholder:text-slate-600">
                </div>

                <!-- Pengarang & Penerbit -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-slate-300 ml-1">Pengarang</label>
                        <input type="text" name="pengarang" required placeholder="Nama penulis..." class="w-full bg-slate-900/50 border border-slate-700 rounded-2xl px-5 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 text-white">
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-slate-300 ml-1">Penerbit</label>
                        <input type="text" name="penerbit" required placeholder="Nama penerbit..." class="w-full bg-slate-900/50 border border-slate-700 rounded-2xl px-5 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 text-white">
                    </div>
                </div>

                <!-- Tahun Terbit & Kategori -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-slate-300 ml-1">Tahun Terbit</label>
                        <input type="number" name="tahun" required placeholder="Contoh: 2024" class="w-full bg-slate-900/50 border border-slate-700 rounded-2xl px-5 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 text-white">
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-slate-300 ml-1">Kategori</label>
                        <div class="relative">
                            <select name="kategori" class="w-full bg-slate-900/50 border border-slate-700 rounded-2xl px-5 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 text-white appearance-none cursor-pointer">
                                <?php if($categories && $categories->num_rows > 0): ?>
                                    <?php while($cat = $categories->fetch_assoc()) : ?>
                                        <option value="<?= $cat['id'] ?>" class="bg-slate-900"><?= $cat['nama_kategori'] ?></option>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <option value="" class="bg-slate-900">Kategori belum tersedia</option>
                                <?php endif; ?>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-400">
                                <i class="fas fa-chevron-down text-xs"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" name="simpan" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-4 rounded-2xl shadow-lg shadow-blue-500/30 transition-all active:scale-[0.98] mt-4">
                    Simpan Koleksi
                </button>
            </form>
        </div>
    </div>
</body>
</html>