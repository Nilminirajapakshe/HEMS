<?php
require_once '../../Control/config.php';  // call config 
extract($_POST);


try {
    if (isset($_POST['Save'])) {
        echo $sql = 'INSERT INTO tbl_itemname(Item_name) '
                . 'VALUES(:Item_name)';

        $stmt = $conn->prepare($sql);
        $stmt->execute(array('Item_name' => $Item_name));
           
         
        $conn = null;
        $_SESSION['success'][] = 'Created Item Name :'.$Item_name;	
        // this re direct samr view page
        header("Location: ".$_SERVER['HTTP_REFERER']);
        
    }if (isset($_POST['Update'])) {
        $sql = 'UPDATE tbl_itemname '
                . 'SET itemname_id=:itemname_id,Item_name=:Item_name WHERE itemname_id=:itemname_id';

        $stmt = $conn->prepare($sql);
        $stmt->execute(array('itemname_id' => $itemname_id,'Item_name' => $Item_name,));
        $_SESSION['success'][] =  'Updated Item Name :' . $Item_name;
        // this re direct samr view page
        header("Location: ".$_SERVER['HTTP_REFERER']);        
    }
    if (isset($_POST['Delete'])) {
        $sql = 'DELETE FROM tbl_itemname '
                . 'WHERE itemname_id=:itemname_id';

        $stmt = $conn->prepare($sql);
        $stmt->execute(array('itemname_id' => $itemname_id));

        $_SESSION['info'][] = 'Removed Item Name :' . $itemname_id;
        // this re direct samr view page
        header("Location: ".$_SERVER['HTTP_REFERER'].'itemname_View.php');        
    }
} catch (Exception $ex) 
{
    $_SESSION['error'][] = $ex->getMessage();
    // this re direct samr view page
    header("Location: ".$_SERVER['HTTP_REFERER']);
}


?>



