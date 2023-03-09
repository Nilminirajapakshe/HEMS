<?php
require_once '../../Control/config.php';  // call config file
$template = new template();   // create a template object
// check user logged ? and user role to load page
if (isset($_SESSION['username']) && ( $_SESSION['login_role'] == 'Admin')) {
    
} else {
    header('Location:' . BASE_URL . 'index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
    <!-- <header> call head function --->   
<?php $template->getHead(); ?>
    <!-- END #header -->    
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <!-- Navbar -->
<?php $template->getNavbar(); ?>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
<?php $template->getSidebar(); ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->


                <!-- Main content -->
                <section class="content">
                    <p style="text-align: center; font-size: 32px; font-weight: bold; color: blue; ">
                        Hospital Equipment Management System
                    </p>
                    <p style="text-align:center; font-size: 30px; font-weight: bold; color: blue; ">
                        Health Department,Western Province.

                    </p>

                    <div class="card">
                        <div class="card-header">
                            <p style="text-align:left; font-size: 32px; font-weight: bold; color: black; ">
                        User Details

                    </p>
                        </div>


                        <div class="card-body">
<?php
$sql = "Select * from tbl_user";
$res = $conn->prepare($sql);
$res->execute();
$str = "<table id=example1 class='table table-bordered table-striped'>";
$str .= "<thead><tr><th>NIC</th><th>E Mail</th><th>Name</th><th>Address</th><th>Designation</th><th>Mobile</th>"
        . "<th>DOB</th><th>Location</th><th>Role</th><th>Action</th></tr></thead><tbody>";
while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
    $str .= "<td>" . $row['user_nic'] . "</td>";
    $str .= "<td>" . $row['user_email'] . "</td>";
    $str .= "<td>" . $row['user_name'] . "</td>";
    $str .= "<td>" . $row['user_address'] . "</td>";
    $str .= "<td>" . $row['user_designation'] . "</td>";
    $str .= "<td>" . $row['user_mobile'] . "</td>";
    $str .= "<td>" . $row['user_dob'] . "</td>";
    $str .= "<td>" . $row['Location_Name'] . "</td>";
    $str .= "<td>" . $row['user_role'] . "</td>";
    $str .= "<td> <a href=UserReg.php?Nic=" . $row['user_nic'] . ">Edit</a></td>";
    $str .= "</tr>";
}
echo $str;
echo "</tbody></table>";
?> 

                        </div> 
                    </div>
                    <!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
<?php $template->getFooter(); ?>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
<?php $template->getJquery(); ?>  
        <?php $template->getDataTable(); ?>

    </body>
</html>
