<?php
require_once '../../Control/config.php';  // call config 
extract($_POST);


try {
    if (isset($_POST['Save'])) {
        echo $sql = 'INSERT INTO tbl_itemstatus(Item_status) '
                . 'VALUES(:Item_status)';

        $stmt = $conn->prepare($sql);
        $stmt->execute(array('Item_status' => $Item_status));
           
         
        $conn = null;
        $_SESSION['success'][] = 'Created Item status :'.$Item_status;	
        // this re direct samr view page
        header("Location: ".$_SERVER['HTTP_REFERER']);
        
    }if (isset($_POST['Update'])) {
        $sql = 'UPDATE tbl_itemstatus '
                . 'SET ItemStatus_Id=:ItemStatus_Id,Item_status=:Item_status WHERE ItemStatus_Id=:ItemStatus_Id';

        $stmt = $conn->prepare($sql);
        $stmt->execute(array('ItemStatus_Id' => $ItemStatus_Id,'Item_status' => $Item_status,));
        $_SESSION['success'][] =  'Updated Item status :' . $Item_status;
        // this re direct samr view page
        header("Location: ".$_SERVER['HTTP_REFERER']);        
    }
    if (isset($_POST['Delete'])) {
        $sql = 'DELETE FROM tbl_itemstatus '
                . 'WHERE ItemStatus_Id=:ItemStatus_Id';

        $stmt = $conn->prepare($sql);
        $stmt->execute(array('ItemStatus_Id' => $ItemStatus_Id));

        $_SESSION['info'][] = 'Removed Item status :' . $ItemStatus_Id;
        // this re direct samr view page
        header("Location: ".$_SERVER['HTTP_REFERER'].'itemstatus_View.php');        
    }
} catch (Exception $ex) 
{
    $_SESSION['error'][] = $ex->getMessage();
    // this re direct samr view page
    header("Location: ".$_SERVER['HTTP_REFERER']);
}


?>



