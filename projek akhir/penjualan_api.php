<?php
require_once 'database.php';
require_once 'Penjualan.php';
$db = new MySQLDatabase();
$penjualan = new Penjualan($db);
$id=0;
$no_faktur=0;
// Check the HTTP request method
$method = $_SERVER['REQUEST_METHOD'];
// Handle the different HTTP methods
switch ($method) {
    case 'GET':
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        if(isset($_GET['no_faktur'])){
            $no_faktur = $_GET['no_faktur'];
        }
        if($id>0){    
            $result = $penjualan->get_by_id($id);
        }elseif($no_faktur>0){
            $result = $penjualan->get_by_no_faktur($no_faktur);
        } else {
            $result = $penjualan->get_all();
        }        
       
        $val = array();
        while ($row = $result->fetch_assoc()) {
            $val[] = $row;
        }
        
        header('Content-Type: application/json');
        echo json_encode($val);
        break;
    
    case 'POST':
        // Add a new penjualan
        $penjualan->no_faktur = $_POST['no_faktur'];
        $penjualan->nama_barang = $_POST['nama_barang'];
        $penjualan->sku = $_POST['sku'];
        $penjualan->harga_barang = $_POST['harga_barang'];
       
        $penjualan->insert();
        $a = $db->affected_rows();
        if($a>0){
            $data['status']='success';
            $data['message']='Data Penjualan created successfully.';
        } else {
            $data['status']='failed';
            $data['message']='Data Penjualan not created.';
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
        if(isset($_GET['no_faktur'])){
            $no_faktur = $_GET['no_faktur'];
        }
        parse_str(file_get_contents("php://input"), $_PUT);
        $penjualan->no_faktur = $_PUT['no_faktur'];
        $penjualan->nama_barang = $_PUT['nama_barang'];
        $penjualan->sku = $_PUT['sku'];
        $penjualan->harga_barang = $_PUT['harga_barang'];
        if($id>0){    
            $penjualan->update($id);
        }elseif($no_faktur<>""){
            $penjualan->update_by_no_faktur($no_faktur);
        } else {
            
        } 
        
        $a = $db->affected_rows();
        if($a>0){
            $data['status']='success';
            $data['message']='Data Penjualan updated successfully.';
        } else {
            $data['status']='failed';
            $data['message']='Data Penjualan update failed.';
        }        
        header('Content-Type: application/json');
        echo json_encode($data);
        break;
    case 'DELETE':
        // Delete a user
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        if(isset($_GET['no_faktur'])){
            $no_faktur = $_GET['no_faktur'];
        }
        if($id>0){    
            $penjualan->delete($id);
        }elseif($no_faktur>0){
            $penjualan->delete_by_no_faktur($no_faktur);
        } else {
            
        } 
        
        $a = $db->affected_rows();
        if($a>0){
            $data['status']='success';
            $data['message']='Data Penjualan deleted successfully.';
        } else {
            $data['status']='failed';
            $data['message']='Data Penjualan delete failed.';
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