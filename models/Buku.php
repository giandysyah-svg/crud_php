<?php
class Buku {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT buku.*, kategori.nama_kategori 
                  FROM buku 
                  LEFT JOIN kategori ON buku.kategori_id = kategori.id";
        return $this->conn->query($query);
    }

    public function getCategories() {
        return $this->conn->query("SELECT * FROM kategori");
    }

    public function getById($id) {
        return $this->conn->query("SELECT * FROM buku WHERE id=$id");
    }

    public function create($judul, $pengarang, $penerbit, $tahun_terbit, $kategori_id) {
        return $this->conn->query("INSERT INTO buku (judul, pengarang, penerbit, tahun_terbit, kategori_id) 
                                   VALUES('$judul', '$pengarang', '$penerbit', '$tahun_terbit', '$kategori_id')");
    }

    public function update($id, $judul, $pengarang, $penerbit, $tahun_terbit, $kategori_id) {
        return $this->conn->query("UPDATE buku SET 
                                   judul='$judul', pengarang='$pengarang', penerbit='$penerbit', 
                                   tahun_terbit='$tahun_terbit', kategori_id='$kategori_id' 
                                   WHERE id=$id");
    }

    public function delete($id) {
        return $this->conn->query("DELETE FROM buku WHERE id=$id");
    }
}
?>
