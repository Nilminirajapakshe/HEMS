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
                    <h1> Item List with warranty and supplier details</h1>
                    

                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title"></h1>
                        </div>


                        <div class="card-body">

                            <?php
                            
                            $sql = "SELECT n.Item_id,n.Item_name,n.Purchase_date,n.Warranty,n.Location_Name,n.Supplier_Name,s.Supplier_Email,s.Supplier_Mobile FROM tbl_item n 
INNER JOIN tbl_supplier s
ON n.Supplier_Name=s.Supplier_Name
";
                            
                            $res = $conn->prepare($sql);
                            $res->execute();
                            $str = "<table id=example1 class='table table-bordered table-striped'>";
                            $str .= "<thead><tr><th>Item ID</th><th>Item Name</th><th>Purchase Date</th><th>Warranty</th><th>Location</th><th>Supplier Name</th><th>Supplier email</th><th>Supplier Mobile</th></tr></thead><tbody>";
                            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                                $str .= "<td>" . $row['Item_id'] . "</td>";
                                $str .= "<td>" . $row['Item_name'] . "</td>";
                                $str .= "<td>" . $row['Purchase_date'] . "</td>";
                                $str .= "<td>" . $row['Warranty'] . "</td>";
                                $str .= "<td>" . $row['Location_Name'] . "</td>";
                                $str .= "<td>" . $row['Supplier_Name'] . "</td>";
                                $str .= "<td>" . $row['Supplier_Email'] . "</td>";
                                $str .= "<td>" . $row['Supplier_Mobile'] . "</td>";
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


