<?php

require_once '../../Control/config.php';  // call config 

$repair_id = $_POST['repair_id'];
$Item_id = $_POST['Item_id'];
$Item_name = $_POST['Item_name'];
$Item_Modleno = $_POST['Item_Modleno'];
$repair_date = $_POST['repair_date'];
$repair_org = $_POST['repair_org'];
$repair_Cost = $_POST['repair_Cost'];


try {
    if (isset($_POST['Save'])) {
        $sql = 'INSERT INTO tbl_repair(Item_id,Item_name,Item_Modleno,repair_date,repair_org,repair_Cost) '
                . 'VALUES(:Item_id,:Item_name,:Item_Modleno,:repair_date,:repair_org,:repair_Cost)';

        $stmt = $conn->prepare($sql);
        $stmt->execute(array('Item_id' => $Item_id,
            'Item_name' => $Item_name,
            'Item_Modleno' => $Item_Modleno,
            'repair_date' => $repair_date,
            'repair_org' => $repair_org,
            'repair_Cost' => $repair_Cost));
        $conn = null;
        $_SESSION['info'][] = 'Repaired Item :'.$repair_id;	
        #echo 'Created Item :' . $repair_id;
        
    }
    if (isset($_POST['Delete'])) {
        $sql = 'DELETE FROM tbl_repair '
                . 'WHERE repair_id=:repair_id';

        $stmt = $conn->prepare($sql);
        $stmt->execute(array('repair_id' => $repair_id));

        $_SESSION['success'][] = 'Removed Item :' . $repair_id;
       $url= BASE_URL . "Apps/View/AddItem/repairData_View.php";
        header("Location:$url");
    }
} catch (Exception $ex) {
    $_SESSION['error'][] = $ex->getMessage();
    
}
// this re direct samr view page
header("Location: ".$_SERVER['HTTP_REFERER']);
?>


