<?php
require_once 'database.php';
require_once 'Jenisbarang.php';
$db = new MySQLDatabase();
$jenisbarang = new Jenisbarang($db);
$id=0;
$kode=0;
// Check the HTTP request method
$method = $_SERVER['REQUEST_METHOD'];
// Handle the different HTTP methods
switch ($method) {
    case 'GET':
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        if(isset($_GET['kode'])){
            $kode = $_GET['kode'];
        }
        if($id>0){    
            $result = $jenisbarang->get_by_id($id);
        }elseif($kode>0){
            $result = $jenisbarang->get_by_kode($kode);
        } else {
            $result = $jenisbarang->get_all();
        }        
       
        $val = array();
        while ($row = $result->fetch_assoc()) {
            $val[] = $row;
        }
        
        header('Content-Type: application/json');
        echo json_encode($val);
        break;
    
    case 'POST':
        // Add a new jenisbarang
        $jenisbarang->kode = $_POST['kode'];
        $jenisbarang->macam_barang = $_POST['macam_barang'];
       
        $jenisbarang->insert();
        $a = $db->affected_rows();
        if($a>0){
            $data['status']='success';
            $data['message']='Data Jenisbarang created successfully.';
        } else {
            $data['status']='failed';
            $data['message']='Data Jenisbarang not created.';
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
        if(isset($_GET['kode'])){
            $kode = $_GET['kode'];
        }
        parse_str(file_get_contents("php://input"), $_PUT);
        $jenisbarang->kode = $_PUT['kode'];
        $jenisbarang->macam_barang = $_PUT['macam_barang'];
        if($id>0){    
            $jenisbarang->update($id);
        }elseif($kode<>""){
            $jenisbarang->update_by_kode($kode);
        } else {
            
        } 
        
        $a = $db->affected_rows();
        if($a>0){
            $data['status']='success';
            $data['message']='Data Jenisbarang updated successfully.';
        } else {
            $data['status']='failed';
            $data['message']='Data Jenisbarang update failed.';
        }        
        header('Content-Type: application/json');
        echo json_encode($data);
        break;
    case 'DELETE':
        // Delete a user
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        if(isset($_GET['kode'])){
            $kode = $_GET['kode'];
        }
        if($id>0){    
            $jenisbarang->delete($id);
        }elseif($kode>0){
            $jenisbarang->delete_by_kode($kode);
        } else {
            
        } 
        
        $a = $db->affected_rows();
        if($a>0){
            $data['status']='success';
            $data['message']='Data Jenisbarang deleted successfully.';
        } else {
            $data['status']='failed';
            $data['message']='Data Jenisbarang delete failed.';
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