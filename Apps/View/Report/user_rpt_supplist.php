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

                    <h2>Supplier list with purchased item and price</h2>
                    <form action="" method="get">
                        <div class="row">

                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Item Name</label>
                                    <input type="text" class="form-control" id="Item_Name" name="Item_Name" placeholder="Item_Name" >
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
                            <h2 class="card-title">Item Details</h2>
                        </div>


                        <div class="card-body">
                            <?php
                            if (isset($_GET['Item_Name']) == 0) {
                                $Item_Name = isset($_GET['Item_Name']);
                                $sql = "SELECT n.Item_name,n.Item_id,s.Supplier_Email, n.Item_price,n.Supplier_Name from tbl_item n,tbl_supplier s WHERE s.Supplier_Name=n.Supplier_Name;";
                            } else {
                                $Item_Name = $_GET['Item_Name'];
                                $sql = "SELECT n.Item_name,n.Item_id, s.Supplier_Name, s.Supplier_Email, n.Item_price from tbl_item n,tbl_supplier s WHERE s.Supplier_Name=n.Supplier_Name and n.Item_name='".$_GET['Item_Name']."'";                                
                            }
                            $sql;
                            $res = $conn->prepare($sql);
                            $res->execute();
                            $str = "<table id=example1 class='table table-bordered table-striped'>";
                            $str .= "<thead><tr><th>Item Name</th><th>Item Id</th><th>Supplier Name</th><th>Supplier E-mail</th><th>Item price(RS.)</th></tr></thead><tbody>";
                            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                                $str .= "<td>" . $row['Item_name'] . "</td>";
                                $str .= "<td>" . $row['Item_id'] . "</td>";
                                $str .= "<td>" . $row['Supplier_Name'] . "</td>";
                                $str .= "<td>" . $row['Supplier_Email'] . "</td>";
                                $str .= "<td>" . $row['Item_price'] . "</td>";
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
