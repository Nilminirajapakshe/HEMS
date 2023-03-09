<?php
require_once '../../Control/config.php';  // call config 
extract($_POST);


try {
    if (isset($_POST['Save'])) {
        echo $sql = 'INSERT INTO tbl_item_type(Item_type) '
                . 'VALUES(:Item_type)';

        $stmt = $conn->prepare($sql);
        $stmt->execute(array('Item_type' => $Item_type));
           
         
        $conn = null;
        $_SESSION['success'][] = 'Created Item type :'.$Item_type;	
        // this re direct samr view page
        header("Location: ".$_SERVER['HTTP_REFERER']);
        
    }if (isset($_POST['Update'])) {
        $sql = 'UPDATE tbl_item_type '
                . 'SET type_id=:type_id,Item_type=:Item_type WHERE type_id=:type_id';

        $stmt = $conn->prepare($sql);
        $stmt->execute(array('type_id' => $type_id,'Item_type' => $Item_type,));
        $_SESSION['success'][] =  'Updated Item :' . $Item_type;
        // this re direct samr view page
        header("Location: ".$_SERVER['HTTP_REFERER']);        
    }
    if (isset($_POST['Delete'])) {
        $sql = 'DELETE FROM tbl_item_type '
                . 'WHERE type_id=:type_id';

        $stmt = $conn->prepare($sql);
        $stmt->execute(array('type_id' => $type_id));

        $_SESSION['info'][] = 'Removed Item type :' . $type_id;
        // this re direct samr view page
        header("Location: ".$_SERVER['HTTP_REFERER'].'itemtype_View.php');        
    }
} catch (Exception $ex) 
{
    $_SESSION['error'][] = $ex->getMessage();
    // this re direct samr view page
    header("Location: ".$_SERVER['HTTP_REFERER']);
}


?>


