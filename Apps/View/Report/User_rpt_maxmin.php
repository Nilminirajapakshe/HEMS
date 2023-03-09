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

                    <h2>Find Maximum and Minimum price of Item</h2>
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
                            <h1 class="card-title">Item Details with its minimum and maximum price</h1>
                        </div>


                        <div class="card-body">
                            <?php
                            if(isset($_GET['Item_Name'])==0)
                            {
                            $Item_Name = isset($_GET['Item_Name']);
                            $sql = "SELECT Location_Name,Item_Name, MAX(Item_price) A, MIN(Item_price) B, AVG(Item_price), Count(Item_price), SUM(Item_price) from tbl_item GROUP BY Location_Name, Item_Name ORDER BY Location_Name, Item_Name";                                
                            }
                            else {
                              $Item_Name = $_GET['Item_Name'];
                            $sql = "SELECT Location_Name,Item_Name, MAX(Item_price) A, MIN(Item_price) B, AVG(Item_price), Count(Item_price), SUM(Item_price) from tbl_item where Item_Name='".$Item_Name. "' GROUP BY Location_Name, Item_Name ORDER BY Location_Name, Item_Name";                              
                            }


                            $res = $conn->prepare($sql);
                            $res->execute();
                            $str = "<table id=example1 class='table table-bordered table-striped'>";
                            $str .= "<thead><tr><th>Location</th><th>Item Name</th><th>Max Price(Rs.)</th><th>Min price(rs.)</th></tr></thead><tbody>";
                            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                                $str .= "<td>" . $row['Location_Name'] . "</td>";
                                $str .= "<td>" . $row['Item_Name'] . "</td>";
                                $str .= "<td>" . $row['A'] . "</td>";
                                $str .= "<td>" . $row['B'] . "</td>";                                
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

