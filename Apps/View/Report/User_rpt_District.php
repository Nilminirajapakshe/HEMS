<?php
require_once '../../Control/config.php';  // call config file
$template = new template();   // create a template object

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
                    <h1> Equipment details with supplier details with District Name</h1>
                    <form action="" method="get">
                        <div class="row">

                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>District</label>
                                    <input type="text" class="form-control" id="Location_District" name="Location_District" placeholder="District" >
                                </div>
                            </div>
                            <div class="table table-striped files" id="previews">
                                <div id="template" class="row mt-2">
                                    <div class="col-auto d-flex align-items-center">
                                        <input type="submit" class="btn btn-primary start" name="Find" value="Find">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>


                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title"></h1>
                        </div>
                        

                        <div class="card-body">
                            <?php
                            if (isset($_GET['Location_District']) == 0) {
                                $Item_Name = isset($_GET['Location_District']);
                            $sql = "SELECT s.Supplier_Name,s.Supplier_Email,S.supplier_Mobile,s.Supplier_Address,i.Item_name,i.Item_id,l.Location_Name,l.Location_District
FROM tbl_supplier s
INNER JOIN tbl_item i
ON i.Supplier_Name=s.Supplier_Name
INNER JOIN tbl_location l
ON i.Location_Name= l.Location_Name
ORDER BY i.Item_name
 ";
                            } else {
                                $Location_District = $_GET['Location_District'];
                                 $sql = "SELECT s.Supplier_Name,s.Supplier_Email,S.supplier_Mobile,s.Supplier_Address,i.Item_name,i.Item_id,l.Location_Name,l.Location_District
FROM tbl_supplier s
INNER JOIN tbl_item i
ON i.Supplier_Name=s.Supplier_Name
INNER JOIN tbl_location l
ON i.Location_Name= l.Location_Name
where Location_District='" . $Location_District . "'
ORDER BY i.Item_name
 ";
                            }
                            $res = $conn->prepare($sql);
                            $res->execute();
                            $str = "<table id=example1 class='table table-bordered table-striped'>";
                            $str .= "<thead><tr><th>supplier Name</th><th>Supplier Email</th><th>Supplier Mobile</th><th>Supplier Address</th><th>Item Name</th><th>Item Id</th><th>Location Name</th><th>District</th></tr></thead><tbody>";
                            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                                $str .= "<td>" . $row['Supplier_Name'] . "</td>";
                                $str .= "<td>" . $row['Supplier_Email'] . "</td>";
                                $str .= "<td>" . $row['supplier_Mobile'] . "</td>";
                                $str .= "<td>" . $row['Supplier_Address'] . "</td>";
                                $str .= "<td>" . $row['Item_name'] . "</td>";
                                $str .= "<td>" . $row['Item_id'] . "</td>";
                                $str .= "<td>" . $row['Location_Name'] . "</td>";
                                $str .= "<td>" . $row['Location_District'] . "</td>";
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

