<?php
//Simpanlah dengan nama file : Barang.php
require_once 'database.php';
class Barang 
{
    private $db;
    private $table = 'barang';
    public $sku = "";
    public $kode_jenis_barang = "";
    public $nama_barang = "";
    public $harga = "";
    public $stok = "";
    public function __construct(MySQLDatabase $db)
    {
        $this->db = $db;
    }
    public function get_all() 
    {
        $query = "SELECT * FROM $this->table";
        $result_set = $this->db->query($query);
        return $result_set;
    }
    public function get_by_id(int $id)
    {
        $query = "SELECT * FROM $this->table WHERE id = $id";
        $result_set = $this->db->query($query);   
        return $result_set;
    }
    public function get_by_sku(int $sku)
    {
        $query = "SELECT * FROM $this->table WHERE sku = $sku";
        $result_set = $this->db->query($query);   
        return $result_set;
    }
    public function insert(): int
    {
        $query = "INSERT INTO $this->table (`sku`,`kode_jenis_barang`,`nama_barang`,`harga`,`stok`) VALUES ('$this->sku','$this->kode_jenis_barang','$this->nama_barang','$this->harga','$this->stok')";
        $this->db->query($query);
        return $this->db->insert_id();
    }
    public function update(int $id): int
    {
        $query = "UPDATE $this->table SET sku = '$this->sku', kode_jenis_barang = '$this->kode_jenis_barang', nama_barang = '$this->nama_barang', harga = '$this->harga', stok = '$this->stok' 
        WHERE id_barang = $id";
        $this->db->query($query);
        return $this->db->affected_rows();
    }
    public function update_by_sku($sku): int
    {
        $query = "UPDATE $this->table SET sku = '$this->sku', kode_jenis_barang = '$this->kode_jenis_barang', nama_barang = '$this->nama_barang', harga = '$this->harga', stok = '$this->stok' 
        WHERE sku = $sku";
        $this->db->query($query);
        return $this->db->affected_rows();
    }
    public function delete(int $id): int
    {
        $query = "DELETE FROM $this->table WHERE id_barang = $id";
        $this->db->query($query);
        return $this->db->affected_rows();
    }
    public function delete_by_sku($sku): int
    {
        $query = "DELETE FROM $this->table WHERE sku = $sku";
        $this->db->query($query);
        return $this->db->affected_rows();
    }
}
?>