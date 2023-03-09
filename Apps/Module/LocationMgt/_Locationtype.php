<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

require_once '../../Control/config.php';  // call config 

$type_id = $_POST['type_id'];
$type_Hospital = $_POST['type_Hospital'];
$type_MOH = $_POST['type_MOH'];
$type_MICU = $_POST['type_MICU'];
$type_RDHS = $_POST['type_RDHS'];


try {
    if (isset($_POST['Save'])) {
        $sql = 'INSERT INTO tbl_location type(type_id,type_Hospital,type_MOH,type_MICU,type_RDHS) '
                . 'VALUES(:type_id,:type_Hospital,:type_MOH,:type_MICU,:type_RDHS)';

        $stmt = $conn->prepare($sql);
        $stmt->execute(array('type_id' => $type_id,
            'Location_Name' => $Location_Name,
            'Location_Type' => $Location_Type,
            'Location_District' => $Location_District));
            
        $conn = null;
        //$_SESSION['info'][] = 'Created Location :'.$type_id;	
        echo 'Created Location :' . $type_id;
    }
    if (isset($_POST['Delete'])) {
        $sql = 'DELETE FROM tbl_location type '
                . 'WHERE type_id=:type_id';

        $stmt = $conn->prepare($sql);
        $stmt->execute(array('type_id' => $type_id));

        $_SESSION['info'][] = 'Removed Location :' . $type_id;
    }
} catch (Exception $ex) {
    $_SESSION['error'][] = $ex->getMessage();
    echo $ex->getMessage();
}
?>
