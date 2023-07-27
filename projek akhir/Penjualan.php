<?php
//Simpanlah dengan nama file : Penjualan.php
require_once 'database.php';
class Penjualan 
{
    private $db;
    private $table = 'penjualan';
    public $no_faktur = "";
    public $nama_barang = "";
    public $sku = "";
    public $harga_barang = "";
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
    public function get_by_no_faktur(int $no_faktur)
    {
        $query = "SELECT * FROM $this->table WHERE no_faktur = $no_faktur";
        $result_set = $this->db->query($query);   
        return $result_set;
    }
    public function insert(): int
    {
        $query = "INSERT INTO $this->table (`no_faktur`,`nama_barang`,`sku`,`harga_barang`) VALUES ('$this->no_faktur','$this->nama_barang','$this->sku','$this->harga_barang')";
        $this->db->query($query);
        return $this->db->insert_id();
    }
    public function update(int $id): int
    {
        $query = "UPDATE $this->table SET no_faktur = '$this->no_faktur', nama_barang = '$this->nama_barang', sku = '$this->sku', harga_barang = '$this->harga_barang' 
        WHERE id_penjualan = $id";
        $this->db->query($query);
        return $this->db->affected_rows();
    }
    public function update_by_no_faktur($no_faktur): int
    {
        $query = "UPDATE $this->table SET no_faktur = '$this->no_faktur', nama_barang = '$this->nama_barang', sku = '$this->sku', harga_barang = '$this->harga_barang' 
        WHERE no_faktur = $no_faktur";
        $this->db->query($query);
        return $this->db->affected_rows();
    }
    public function delete(int $id): int
    {
        $query = "DELETE FROM $this->table WHERE id_penjualan = $id";
        $this->db->query($query);
        return $this->db->affected_rows();
    }
    public function delete_by_no_faktur($no_faktur): int
    {
        $query = "DELETE FROM $this->table WHERE no_faktur = $no_faktur";
        $this->db->query($query);
        return $this->db->affected_rows();
    }
}
?>