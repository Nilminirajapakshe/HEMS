<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

require_once '../../Control/config.php';  // call config 

#$donation_Id = $_POST['donation_Id'];
$donation_type = $_POST['donation_type'];
$donation_name = $_POST['donation_name'];
$donation_mobile = $_POST['donation_mobile'];
$donation_address = $_POST['donation_address'];
$donation_country = $_POST['donation_country'];


try {
    if (isset($_POST['Save'])) {
        $sql = 'INSERT INTO tbl_donation(donation_type,donation_name,donation_mobile,donation_address,donation_country) '
                . 'VALUES(:donation_type,:donation_name,:donation_mobile,:donation_address,:donation_country)';

        $stmt = $conn->prepare($sql);
        $stmt->execute(array('donation_type' => $donation_type,
            'donation_name' => $donation_name,
            'donation_mobile' => $donation_mobile,
            'donation_address' => $donation_address,
            'donation_country' => $donation_country));
                    
        $conn = null;
        $_SESSION['success'][] = 'Created Donator :'.$donation_name;	
    }
    if (isset($_POST['Delete'])) {
        $sql = 'DELETE FROM tbl_donation '
                . 'WHERE donation_Id=:donation_Id';

        $stmt = $conn->prepare($sql);
        $stmt->execute(array('donation_Id' => $donation_Id));

        $_SESSION['success'][] = 'Removed Donator :' . $donation_Id;
    }
} catch (Exception $ex) {
    $_SESSION['error'][] = $ex->getMessage();
}

// this re direct samr view page
header("Location: ".$_SERVER['HTTP_REFERER']);	
?>

