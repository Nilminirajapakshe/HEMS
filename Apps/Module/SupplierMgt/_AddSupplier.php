<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

require_once '../../Control/config.php';  // call config 

#$Supplier_Id = $_POST['Supplier_Id'];
$Supplier_Name = $_POST['Supplier_Name'];
$Supplier_Email = $_POST['Supplier_Email'];
$Supplier_Mobile = $_POST['Supplier_Mobile'];
$Supplier_Address = $_POST['Supplier_Address'];



try {
    if (isset($_POST['Save'])) {
        $sql = 'INSERT INTO tbl_supplier(Supplier_Name,Supplier_Email,Supplier_Mobile,Supplier_Address) '
                . 'VALUES(:Supplier_Name,:Supplier_Email,:Supplier_Mobile,:Supplier_Address)';

        $stmt = $conn->prepare($sql);
        $stmt->execute(array('Supplier_Name' => $Supplier_Name,
            'Supplier_Email' => $Supplier_Email,
            'Supplier_Mobile' => $Supplier_Mobile,
            'Supplier_Address' => $Supplier_Address));
            
        $conn = null;
        $_SESSION['success'][] = 'Created Suplier :'.$Supplier_Name;		
       
    }
    if (isset($_POST['Update'])) {
        $sql = 'UPDATE tbl_supplier '
                . 'SET Supplier_Name=:Supplier_Name, Supplier_Email=:Supplier_Email, Supplier_Mobile=:Supplier_Mobile, Supplier_Address=:Supplier_Address WHERE Supplier_Name=:Supplier_Name';

        $stmt = $conn->prepare($sql);
        $stmt->execute(array('Supplier_Name' => $Supplier_Name,
            'Supplier_Email' => $Supplier_Email,
            'Supplier_Mobile' => $Supplier_Mobile,
            'Supplier_Address' => $Supplier_Address));

        $_SESSION['success'][] =  'Updated Supplier :' . $Supplier_Name;
    }
    if (isset($_POST['Delete'])) {
        $sql = 'DELETE FROM tbl_supplier '
                . 'WHERE Supplier_Name=:Supplier_Name';

        $stmt = $conn->prepare($sql);
        $stmt->execute(array('Supplier_Name' => $Supplier_Name));

        $_SESSION['info'][] = 'Removed Supplier :' . $Supplier_Name;
    }
} catch (Exception $ex) {
    $_SESSION['error'][] = $ex->getMessage();
    echo $ex->getMessage();
}
// this re direct samr view page
header("Location: ".$_SERVER['HTTP_REFERER']);	
?>

