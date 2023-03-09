    <?php

require_once '../../Control/config.php';  // call config 

$user_roleid = $_POST['user_roleid'];
$user_role = $_POST['user_role'];

try {
    if (isset($_POST['Save'])) {
        $sql = 'INSERT INTO tbl_role(user_roleid,user_role) '
                . 'VALUES(:user_roleid,:user_role)';

        $stmt = $conn->prepare($sql);
        $stmt->execute(array('user_roleid' => $user_roleid,
            'user_roleid' => $user_roleid,
            'user_role' => $user_role));
            $conn = null;
        //$_SESSION['success'][] = 'Created Role Data :'.$user_roleid;	
        $_SESSION['success'][] =  'Created Role Data :' . $user_roleid;
            
       
    }
    if (isset($_POST['Delete'])) {
        $sql = 'DELETE FROM tbl_role '
                . 'WHERE user_roleid=:user_roleid';


        $stmt = $conn->prepare($sql);
        $stmt->execute(array('user_nic' => $user_roleid));

        $_SESSION['info'][] = 'Removed Role Data :' . $user_roleid;
    };
    }
catch (Exception $ex) 
{
    $_SESSION['error'][] = $ex->getMessage();
    echo $ex->getMessage();
}
?>


