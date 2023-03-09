<?php

require_once '../../Control/config.php';  // call config 
include "../../../lib/phpmail/mail.php";   //call php mail library

$user_nic = $_POST['user_nic'];
$user_email = $_POST['user_email'];
$user_name = $_POST['user_name'];
$user_address = $_POST['user_address'];
$user_designation = $_POST['user_designation'];
$user_mobile = $_POST['user_mobile'];
$user_dob = $_POST['user_dob'];
$Location_Name = $_POST['Location_Name'];
$user_role = $_POST['user_role'];


try {
    if (isset($_POST['Save'])) {
        $sql = 'INSERT INTO tbl_user(user_nic,user_email,user_name,user_address,user_designation,user_mobile,user_dob,Location_Name,user_role) '
                . 'VALUES(:user_nic,:user_email,:user_name,:user_address,:user_designation,:user_mobile,:user_dob,:Location_Name,:user_role)';

        $stmt = $conn->prepare($sql);
        $stmt->execute(array('user_nic' => $user_nic,
            'user_email' => $user_email,
            'user_name' => $user_name,
            'user_address' => $user_address,
            'user_designation' => $user_designation,
            'user_mobile' => $user_mobile,
            'user_dob' => $user_dob,
            'Location_Name' => $Location_Name,
            'user_role' => $user_role));
        
        
        // Create Login for user
          $sql2 = 'INSERT INTO tbl_login(login_username,login_password,login_role) '
                . 'VALUES(:login_username,:login_password,:login_role)';

        $stmt2 = $conn->prepare($sql2);
        $stmt2->execute(array('login_username' => $user_nic,
            'login_password' => md5($user_email),
            'login_role' => $user_role));      
        
                $conn = null;

        
        $_SESSION['success'][] =  'Created User :' . $user_nic;
    }

    if (isset($_POST['Update'])) {
        $sql = 'UPDATE tbl_user '
                . 'SET user_email=:user_email, user_name=:user_name, user_address=:user_address, user_designation=:user_designation, user_mobile=:user_mobile, user_dob=:user_dob, Location_Name=:Location_Name, user_role=:user_role WHERE user_nic=:user_nic';

        $stmt = $conn->prepare($sql);
        $stmt->execute(array('user_nic' => $user_nic,
            'user_email' => $user_email,
            'user_name' => $user_name,
            'user_address' => $user_address,
            'user_designation' => $user_designation,
            'user_mobile' => $user_mobile,
            'user_dob' => $user_dob,
            'Location_Name' => $Location_Name,
            'user_role' => $user_role));

        $_SESSION['success'][] =  'Updated User :' . $user_nic;
    }

    if (isset($_POST['Delete'])) {
        $sql = 'DELETE FROM tbl_user '
                . 'WHERE user_nic=:user_nic';

        $stmt = $conn->prepare($sql);
        $stmt->execute(array('user_nic' => $user_nic));
        
        
$Deleteby=$_SESSION['username'];      
$body="$user_id-$user_name<h5>is Deleted by</h5>$Deleteby";
$customer_email="nil2cha@gmail.com";
$customer="PDHS";
$subject="Notification of item delete";
send_email($customer_email,$customer,$subject,$body,"Hello");

        $_SESSION['success'][] =  'Removed User :' . $user_nic;
    }
} catch (Exception $ex) {
    $_SESSION['error'][] = $ex->getMessage();
    ##echo $ex->getMessage();
}

// this re direct samr view page
//header("Location: ".$_SERVER['HTTP_REFERER']);
$url= BASE_URL . "Apps/View/UserMgt/UserReg.php";
        header("Location:$url");
?>
