<?php
//Simpanlah dengan nama file : Jenisbarang.php
require_once 'database.php';
class Jenisbarang 
{
    private $db;
    private $table = 'jenisbarang';
    public $kode = "";
    public $macam_barang = "";
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
    public function get_by_kode(int $kode)
    {
        $query = "SELECT * FROM $this->table WHERE kode = $kode";
        $result_set = $this->db->query($query);   
        return $result_set;
    }
    public function insert(): int
    {
        $query = "INSERT INTO $this->table (`kode`,`macam_barang`) VALUES ('$this->kode','$this->macam_barang')";
        $this->db->query($query);
        return $this->db->insert_id();
    }
    public function update(int $id): int
    {
        $query = "UPDATE $this->table SET kode = '$this->kode', macam_barang = '$this->macam_barang' 
        WHERE id_jenis = $id";
        $this->db->query($query);
        return $this->db->affected_rows();
    }
    public function update_by_kode($kode): int
    {
        $query = "UPDATE $this->table SET kode = '$this->kode', macam_barang = '$this->macam_barang' 
        WHERE kode = $kode";
        $this->db->query($query);
        return $this->db->affected_rows();
    }
    public function delete(int $id): int
    {
        $query = "DELETE FROM $this->table WHERE id_jenis = $id";
        $this->db->query($query);
        return $this->db->affected_rows();
    }
    public function delete_by_kode($kode): int
    {
        $query = "DELETE FROM $this->table WHERE kode = $kode";
        $this->db->query($query);
        return $this->db->affected_rows();
    }
}
?>