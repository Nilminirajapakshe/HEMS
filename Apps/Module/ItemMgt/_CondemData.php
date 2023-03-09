<?php

require_once '../../Control/config.php';  // call config 

$Condem_code = $_POST['Condem_code'];
$Item_id = $_POST['Item_id'];
$Item_name = $_POST['Item_name'];
$Condem_Date = $_POST['Condem_Date'];
$Condem_reasion = $_POST['Condem_reasion'];
$Condem_commity = $_POST['Condem_commity'];
$Location_Name = $_POST['Location_Name'];

try {
    if (isset($_POST['Save'])) {
        $sql = 'INSERT INTO tbl_condem_data(Item_id,Item_name,Condem_Date,Condem_reasion,Condem_commity,Location_Name ) '
                . 'VALUES(:Item_id,:Item_name,:Condem_Date,:Condem_reasion,:Condem_commity,:Location_Name)';

        $stmt = $conn->prepare($sql);
        $stmt->execute(array('Item_id' => $Item_id,
            'Item_name' => $Item_name,
            'Condem_Date' => $Condem_Date,
            'Condem_reasion' => $Condem_reasion,
            'Condem_commity' => $Condem_commity,
            'Location_Name' => $Location_Name));
         
        $conn = null;
        $_SESSION['success'][] = 'Created Item :'.$Item_name;	
        // this re direct samr view page
        header("Location: ".$_SERVER['HTTP_REFERER']);
        
    }if (isset($_POST['Update'])) {
        $sql = 'UPDATE tbl_condem_data '
                . 'SET Item_id=:Item_id,Item_name=:Item_name, Condem_Date=:Condem_Date, Condem_reasion=:Condem_reasion, Condem_commity=:Condem_commity, Location_Name=:Location_Name WHERE Condem_code=:Condem_code';

        $stmt = $conn->prepare($sql);
        $stmt->execute(array('Condem_code' => $Condem_code,'Item_id' => $Item_id,'Item_name' => $Item_name,
            'Condem_Date' => $Condem_Date,
            'Condem_reasion' => $Condem_reasion,
            'Condem_commity' => $Condem_commity,
            'Location_Name' => $Location_Name,
            ));
        $_SESSION['success'][] =  'Updated Item :' . $Item_name;
        // this re direct samr view page
        header("Location: ".$_SERVER['HTTP_REFERER']);        
    }
    if (isset($_POST['Delete'])) {
        $sql = 'DELETE FROM tbl_condem_data '
                . 'WHERE Condem_code=:Condem_code';

        $stmt = $conn->prepare($sql);
        $stmt->execute(array('Condem_code' => $Condem_code));

        $_SESSION['info'][] = 'Removed Condem Data :' . $Condem_code;
        // this re direct samr view page
        header("Location: ".$_SERVER['HTTP_REFERER'].'CondemData_View.php');        
    }
} catch (Exception $ex) 
{
    $_SESSION['error'][] = $ex->getMessage();
    // this re direct samr view page
    header("Location: ".$_SERVER['HTTP_REFERER']);
}


?>


