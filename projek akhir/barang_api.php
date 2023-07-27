<?php
require_once 'database.php';
require_once 'Barang.php';
$db = new MySQLDatabase();
$barang = new Barang($db);
$id=0;
$sku=0;
// Check the HTTP request method
$method = $_SERVER['REQUEST_METHOD'];
// Handle the different HTTP methods
switch ($method) {
    case 'GET':
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        if(isset($_GET['sku'])){
            $sku = $_GET['sku'];
        }
        if($id>0){    
            $result = $barang->get_by_id($id);
        }elseif($sku>0){
            $result = $barang->get_by_sku($sku);
        } else {
            $result = $barang->get_all();
        }        
       
        $val = array();
        while ($row = $result->fetch_assoc()) {
            $val[] = $row;
        }
        
        header('Content-Type: application/json');
        echo json_encode($val);
        break;
    
    case 'POST':
        // Add a new barang
        $barang->sku = $_POST['sku'];
        $barang->kode_jenis_barang = $_POST['kode_jenis_barang'];
        $barang->nama_barang = $_POST['nama_barang'];
        $barang->harga = $_POST['harga'];
        $barang->stok = $_POST['stok'];
       
        $barang->insert();
        $a = $db->affected_rows();
        if($a>0){
            $data['status']='success';
            $data['message']='Data Barang created successfully.';
        } else {
            $data['status']='failed';
            $data['message']='Data Barang not created.';
        }
        header('Content-Type: application/json');
        echo json_encode($data);
        break;
    case 'PUT':
        // Update an existing data
        $_PUT = [];
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        if(isset($_GET['sku'])){
            $sku = $_GET['sku'];
        }
        parse_str(file_get_contents("php://input"), $_PUT);
        $barang->sku = $_PUT['sku'];
        $barang->kode_jenis_barang = $_PUT['kode_jenis_barang'];
        $barang->nama_barang = $_PUT['nama_barang'];
        $barang->harga = $_PUT['harga'];
        $barang->stok = $_PUT['stok'];
        if($id>0){    
            $barang->update($id);
        }elseif($sku<>""){
            $barang->update_by_sku($sku);
        } else {
            
        } 
        
        $a = $db->affected_rows();
        if($a>0){
            $data['status']='success';
            $data['message']='Data Barang updated successfully.';
        } else {
            $data['status']='failed';
            $data['message']='Data Barang update failed.';
        }        
        header('Content-Type: application/json');
        echo json_encode($data);
        break;
    case 'DELETE':
        // Delete a user
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        if(isset($_GET['sku'])){
            $sku = $_GET['sku'];
        }
        if($id>0){    
            $barang->delete($id);
        }elseif($sku>0){
            $barang->delete_by_sku($sku);
        } else {
            
        } 
        
        $a = $db->affected_rows();
        if($a>0){
            $data['status']='success';
            $data['message']='Data Barang deleted successfully.';
        } else {
            $data['status']='failed';
            $data['message']='Data Barang delete failed.';
        }        
        header('Content-Type: application/json');
        echo json_encode($data);
        break;
    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
    }
$db->close()
?>