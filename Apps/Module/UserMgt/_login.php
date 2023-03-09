<?php

require_once '../../Control/config.php';  // call config 

$login_username = $_POST['login_username'];
$login_password = md5($_POST['login_password']);

//echo '<pre>';  print_r($_POST); echo '</pre>';   
//  echo '<pre>login mame post';  print_r($login_username); echo '</pre>';  


try {

    $sql = 'SELECT login_username, login_password, login_role FROM tbl_login WHERE login_username=:login_username and  login_password=:login_password';

    $stmt = $conn->prepare($sql);
    $stmt->execute(array(':login_username' => $login_username,
        ':login_password' => $login_password));

    $result = $stmt->fetchAll();

    if (count($result)) {
        $row = $result[0];

        $_SESSION['username'] = $row['login_username'];
        $_SESSION['login_role'] = $row['login_role'];

        echo "<script>alert('Welcome to HEMS !');</script>";
        echo "<script>document.location.href='../../../apps/view/UserMgt/User_Home.php'</script>";
    } else {
        echo "<script>alert('Please check your user name and password!');</script>";
        echo "<script>document.location.href='../../../index.php'</script>";
    }
} catch (Exception $ex) {
    //echo $ex->getMessage();
    echo "<script>alert('Login Error !');</script>";
    echo "<script>document.location.href='../../../index.php'</script>";
}
    