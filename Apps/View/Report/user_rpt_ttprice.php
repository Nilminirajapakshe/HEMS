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

                    <h2>Number of Items with purchase year and total price</h2>
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
                                $sql = "SELECT item_name,Purchase_date,YEAR(Purchase_date), COUNT(item_name), SUM(Item_price) FROM tbl_item GROUP BY YEAR(Purchase_date), item_name ORDER BY item_name";
                            } else {
                                $Item_Name = $_GET['Item_Name'];
                                $sql = "SELECT item_name,Purchase_date,YEAR(Purchase_date), COUNT(item_name), SUM(Item_price) FROM tbl_item where Item_Name='" . $Item_Name . "' GROUP BY YEAR(Purchase_date), item_name ORDER BY item_name";
                            }

 
                            $res = $conn->prepare($sql);
                            $res->execute();
                            $str = "<table id=example1 class='table table-bordered table-striped'>";
                            $str .= "<thead><tr><th>Item Name</th><th>Purchase Date</th><th>Purchase Year</th><th>Number of items</th><th>Total price(RS.)</th></tr></thead><tbody>";
                            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                                $str .= "<td>" . $row['item_name'] . "</td>";
                                $str .= "<td>" . $row['Purchase_date'] . "</td>";
                                $str .= "<td>" . $row['YEAR(Purchase_date)'] . "</td>";
                                $str .= "<td>" . $row['COUNT(item_name)'] . "</td>";
                                $str .= "<td>" . $row['SUM(Item_price)'] . "</td>";
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