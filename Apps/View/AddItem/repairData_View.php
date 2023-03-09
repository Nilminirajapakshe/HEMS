
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


                    <div class="card">
                        <div class="card-header">
                             <p style="text-align:left; font-size: 32px; font-weight: bold; color: black; ">
                        View Repair Details of Equipment

                    </p>

                        </div>
                       

                        <div class="card-body">
                            <?php
                            $sql = "Select * from tbl_repair";
                            $res = $conn->prepare($sql);
                            $res->execute();
                            $str = "<table id=example1 class='table table-bordered table-striped'>";
                            $str .= "<thead><tr><th>Repair ID</th><th>Item ID</th><th>Item Name</th><th>Item Modle</th><th>Repair Date</th><th>Organization</th>"
                                    . "<th>Repair Cost</th></tr></thead><tbody>";
                            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                                $str .= "<td>" . $row['repair_id'] . "</td>";
                                $str .= "<td>" . $row['Item_id'] . "</td>";
                                $str .= "<td>" . $row['Item_Name'] . "</td>";
                                $str .= "<td>" . $row['Item_Modleno'] . "</td>";
                                $str .= "<td>" . $row['repair_date'] . "</td>";
                                $str .= "<td>" . $row['repair_org'] . "</td>";
                                $str .= "<td>" . $row['repair_Cost'] . "</td>";
                                
                                //$str .= "<td> <a href=repairData.php?Nic=" . $row['repair_id'] . ">Edit</a></td>";
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


