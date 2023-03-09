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
                                <p style="text-align:left; font-size: 32px; font-weight: bold; color: black; ">
                        Enter Repair Details of Equipment

                    </p>

                                
                                <form action="../../Module/ItemMgt/_repairData.php" method="post">
                                    <div class="row">

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>repair_id</label>
                                                <input type="INT" class="form-control" id="repair_id" name="repair_id" placeholder="repair id" readonly="" >
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Item_id</label>
                                                <?php
                                                    $ops = '';
                                                    $stmt = $conn->query("SELECT Item_id FROM tbl_item WHERE Item_status='No working'");
                                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                        $ops .= "<option value='" . $row['Item_id'] . "'>" . $row['Item_id'] . '</option>';
                                                    }
                                                    ?>                                                    
                                                    <select name="Item_id" class="form-control">
                                                        <?php echo $ops; ?>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Item Name</label>
                                                <div class="form-group">
                                                   <?php
                                                    $ops = '';
                                                    $stmt = $conn->query("select Item_name from tbl_item");
                                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                        $ops .= "<option value='" . $row['Item_name'] . "'>" . $row['Item_name'] . "</option>";
                                                    }
                                                    ?>                                                    
                                                    <select name="Item_name" class="form-control">
                                                        <?php echo $ops; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Item Modle</label>
                                                <div class="form-group">
                                                   <?php
                                                    $ops = '';
                                                    $stmt = $conn->query("select Item_Modleno from tbl_item");
                                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                        $ops .= "<option value='" . $row['Item_Modleno'] . "'>" . $row['Item_Modleno'] . "</option>";
                                                    }
                                                    ?>                                                    
                                                    <select name="Item_Modleno" class="form-control">
                                                        <?php echo $ops; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Item type</label>
                                                <?php
                                                    $ops = '';
                                                    $stmt = $conn->query("select Item_type from tbl_item_type");
                                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                        $ops .= "<option value='" . $row['Item_type'] . "'>" . $row['Item_type'] . "</option>";
                                                    }
                                                    ?>                                                    
                                                    <select name="Item_type" class="form-control">
                                                        <?php echo $ops; ?>
                                                    </select>
                                                
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Repair Date</label>
                                                <div class="form-group">
                                                    <input type="DATE" class="form-control" id="repair_date" name="repair_date" placeholder="Enter Repair Date">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Repair By</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="repair_org" name="repair_org" placeholder="Enter Repaired organization">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Repair Cost</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="repair_Cost" name="repair_Cost" placeholder="Enter Repaired Cost">
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

        