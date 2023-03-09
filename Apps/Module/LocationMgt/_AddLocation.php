<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

require_once '../../Control/config.php';  // call config 

$Location_Name = $_POST['Location_Name'];
$Location_Type = $_POST['Location_Type'];
$Location_District = $_POST['Location_District'];


try {
    if (isset($_POST['Save'])) {
        $sql = 'INSERT INTO tbl_location(Location_Name,Location_Type,Location_District) '
                . 'VALUES(:Location_Name,:Location_Type,:Location_District)';

        $stmt = $conn->prepare($sql);
        $stmt->execute(array('Location_Name' => $Location_Name,
            'Location_Type' => $Location_Type,
            'Location_District' => $Location_District));
            
        $conn = null;	
        $_SESSION['success'][] = 'Created Item :' . $Location_Name;
    }
    if (isset($_POST['Delete'])) {
        $sql = 'DELETE FROM tbl_location '
                . 'WHERE Location_id=:Location_id';

        $stmt = $conn->prepare($sql);
        $stmt->execute(array('Location_id' => $Location_id));

        $_SESSION['success'][] = 'Removed Item :' . $Location_Name;
    }
} catch (Exception $ex) {
    $_SESSION['error'][] = $ex->getMessage();
}

// this re direct samr view page
header("Location: ".$_SERVER['HTTP_REFERER']);
?>

