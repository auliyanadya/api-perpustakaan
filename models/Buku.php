<?php
class Buku {
    private $conn;
    private $table_name = "buku";

    public $id;
    public $judul;
    public $penulis;
    public $tahun_terbit;
    public $stok;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . "
                  (judul, penulis, tahun_terbit, stok)
                  VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            $this->judul,
            $this->penulis,
            $this->tahun_terbit,
            $this->stok
        ]);
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . "
                  SET judul=?, penulis=?, tahun_terbit=?, stok=?
                  WHERE id=?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            $this->judul,
            $this->penulis,
            $this->tahun_terbit,
            $this->stok,
            $this->id
        ]);
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id=?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$this->id]);
    }
}
?>