<?php
include_once "../controllers/BukuController.php";
$controller = new BukuController();

$id = $_GET['id'];
$data = $controller->model->getById($id);
$row = $data->fetch_assoc();
$categories = $controller->model->getCategories();

if(isset($_POST['update'])) {
    $controller->model->update($id, $_POST['judul'], $_POST['pengarang'], $_POST['penerbit'], $_POST['tahun'], $_POST['kategori']);
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Buku - Perpustakaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-5">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-lg overflow-hidden">
        <div class="bg-amber-600 px-6 py-4 border-b-4 border-blue-900">
            <h2 class="text-xl font-bold text-white">Edit Data Buku</h2>
        </div>
        
        <form method="POST" class="p-6 space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Judul Buku</label>
                <input type="text" name="judul" value="<?= $row['judul']; ?>" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500">
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Pengarang</label>
                    <input type="text" name="pengarang" value="<?= $row['pengarang']; ?>" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Penerbit</label>
                    <input type="text" name="penerbit" value="<?= $row['penerbit']; ?>" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tahun Terbit</label>
                    <input type="number" name="tahun" value="<?= $row['tahun_terbit']; ?>" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                    <select name="kategori" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500">
                        <?php while($cat = $categories->fetch_assoc()) { 
                            $selected = ($cat['id'] == $row['kategori_id']) ? "selected" : "";
                        ?>
                            <option value="<?= $cat['id'] ?>" <?= $selected ?>><?= $cat['nama_kategori'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="pt-4 flex justify-end gap-3">
                <a href="../index.php" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 transition">Batal</a>
                <button type="submit" name="update" class="bg-amber-600 text-white px-4 py-2 rounded-md hover:bg-amber-700 transition">Update Data</button>
            </div>
        </form>
    </div>
</body>
</html>
