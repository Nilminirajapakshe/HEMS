<?php



/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

require_once '../../Control/config.php';  // call config 

$userdesignation_Level = $_POST['userdesignation_Level'];
$user_designation = $_POST['user_designation'];


try {
    if (isset($_POST['Save'])) {
        $sql = 'INSERT INTO tbl_designation(userdesignation_Level,user_designation) '
                . 'VALUES(:userdesignation_Level,:user_designation)';

        $stmt = $conn->prepare($sql);
        $stmt->execute(array('userdesignation_Level' => $userdesignation_Level,
            'user_designation' => $user_designation));
                        
        $conn = null;
        $_SESSION['success'][] = 'Created Designation :'.$user_designation;		
       
    }
    if (isset($_POST['Delete'])) {
        $sql = 'DELETE FROM tbl_designation '
                . 'WHERE userdesignation_ID=:userdesignation_ID';

        $stmt = $conn->prepare($sql);
        $stmt->execute(array('userdesignation_ID' => $userdesignation_ID));

        $_SESSION['info'][] = 'Removed Desination :' . $userdesignation_ID;
    }
} catch (Exception $ex) {
    $_SESSION['error'][] = $ex->getMessage();
    echo $ex->getMessage();
}
// this re direct samr view page
header("Location: ".$_SERVER['HTTP_REFERER']);	
?>

