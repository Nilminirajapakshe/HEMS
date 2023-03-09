<?php

        
require_once '../../Control/config.php';  // call config file
$template = new template();   // create a template object


// check user logged ? and user role to load page
if(isset($_SESSION['username'])&& ( $_SESSION['login_role']=='Admin'))
{

} else {
	header('Location:'.BASE_URL.'index.php');
}
        

//Load other values from DB
if (isset($_GET['Nic'])) {
// Get the value from URL and assign to varibale
    $NIC = $_GET['Nic'];
    $sql = 'SELECT user_email,user_name,user_address,user_designation,user_mobile,user_nic,user_dob,Location_Name,user_role FROM tbl_user WHERE user_nic = :user_nic';
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(':user_nic' => $NIC));

    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
        $user_email = $row[0];
        $user_name = $row[1];
        $user_address = $row[2];
        $user_designation = $row[3];
        $user_mobile = $row[4];
        $user_nic = $row[5];
        $user_dob = $row[6];
        $user_location = $row[7];
        $user_role = $row[8];
    }
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
                    <p style="text-align:center; font-size: 32px; font-weight: bold; color: blue; ">
                        Hospital Equipment Management System

                    </p>
                    <p style="text-align:center; font-size: 30px; font-weight: bold; color: blue; ">
                        Health Department,Western Province.

                    </p>
                    <div class="container-fluid">
                        <!-- SELECT2 EXAMPLE -->
                        <div class="card card-default">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <?php $template->showMessage() ?>
                                <p style="text-align:left; font-size: 32px; font-weight: bold; color: black; ">
                        User Registration

                    </p>
                                
                                <form action="../../Module/UserMgt/_UserReg.php" method="post">
                                    <div class="row">

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>NIC</label>
                                                <input type="text" class="form-control" id="user_nic" name="user_nic" placeholder="Enter NIC" autofocus="" required="" value=<?php if(isset($_GET['Nic'])) echo $NIC; ?>>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Enter email"  required="" value=<?php if(isset($_GET['Nic'])) echo $user_email; ?>>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Enter Name"  required="" value=<?php if(isset($_GET['Nic'])) echo $user_name; ?>>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="user_address" name="user_address" placeholder="Enter Address" required="" value=<?php if(isset($_GET['Nic'])) echo $user_address; ?>>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Designation</label>
                                                <div class="form-group">
                                                    <?php
                                                    $ops = '';
                                                    $stmt = $conn->query("select user_designation from tbl_designation");
                                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                        $ops .= "<option value='" . $row['user_designation'] . "'>" . $row['user_designation'] . "</option>";
                                                    }
                                                    ?>                                                    
                                                    <select name="user_designation" class="form-control">
                                                        <?php echo $ops; ?>
                                                    </select>	
                                                    <a href="designation.php">New</a>                                                     
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Mobile Number</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="user_mobile" name="user_mobile" placeholder="Enter Mobile Number"  required="" required="" value=<?php if(isset($_GET['Nic'])) echo $user_mobile; ?>>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Date of Birth</label>
                                                <div class="form-group">
                                                    <input type="Date" class="form-control" id="user_dob" name="user_dob" placeholder="Enter Date of Birth" required="" required="" value=<?php if(isset($_GET['Nic'])) echo $user_dob; ?>>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Name of Office</label>
                                                <div class="form-group">
                                                    <?php
                                                    $ops = '';
                                                    $stmt = $conn->query("select Location_Name from tbl_location");
                                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                        $ops .= "<option value='" . $row['Location_Name'] . "'>" . $row['Location_Name'] . "</option>";
                                                    }
                                                    ?>                                                    
                                                    <select name="Location_Name" class="form-control">
                                                        <?php echo $ops; ?>
                                                    </select>	
                                                    <a href="../Location/AddLocation.php">New</a> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>User Role</label>
                                                <div class="form-group">
                                                    <?php
                                                    $ops = '';
                                                    $stmt = $conn->query("select user_role from tbl_role");
                                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                        $ops .= "<option value='" . $row['user_role'] . "'>" . $row['user_role'] . "</option>";
                                                    }
                                                    ?>                                                    
                                                    <select name="user_role" class="form-control">
                                                        <?php echo $ops; ?>
                                                    </select>	
                                                    <a href="userRole.php">New</a>  
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body">

                                            <div class="table table-striped files" id="previews">
                                                <div id="template" class="row mt-2">
                                                    <div class="col-auto d-flex align-items-center">
                                                        <div class="btn-group">
                                                            <input type="submit" class="btn btn-primary start" name="Save" value="Save">
                                                            <input type="submit" class="btn btn-warning cancel" name="Update" value="Update">
                                                            <input type="submit" onclick="Deleteuser(this.form,event)" class="btn btn-danger delete" name="Delete" value="Delete">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>              



                                    </div>
                                </form>
                                <!-- /.row -->
                            </div>
                        </div>
                        <!-- /.card -->


                        <!-- /.row -->
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
        <script>
        function Deleteuser(form,e){
            var r=confirm("Are you sure you want to delete?");
            
            if(r){
                form.submit();
            }else{
                e.preventDefault();
            }
           
        } 
        </script>

    </body>
</html>
