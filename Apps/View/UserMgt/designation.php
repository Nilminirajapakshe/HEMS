<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

require_once '../../Control/config.php';  // call config file
$template = new template();   // create a template object
// check user logged ? and user role to load page
if(isset($_SESSION['username'])&& ( $_SESSION['login_role']=='Admin'))
{

} else {
	header('Location:'.BASE_URL.'index.php');
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
                    <div class="container-fluid">
                        <!-- SELECT2 EXAMPLE -->
                        <div class="card card-default">
                            <!-- /.card-header -->
                            <div class="card-body">
 <?php $template->showMessage() ?>
                                <p style="text-align:left; font-size: 32px; font-weight: bold; color: black; ">
                        Enter User Designations

                    </p>
                                <form action="../../Module/UserMgt/_designation.php" method="post">
                                    <div class="row">

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Designation Id</label>
                                                <input type="text" class="form-control" id="userdesignation_ID" name="userdesignation_ID" placeholder="Enter Designation ID" readonly="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Designation Level</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="userdesignation_Level" name="userdesignation_Level" placeholder="Enter Designation Level">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Designation</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="user_designation" name="user_designation" placeholder="Enter Designation">
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
                                                            <input type="submit" class="btn btn-danger delete" name="Delete" value="Delete">
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

    </body>
</html>