<?php
require_once '../../Control/config.php';  // call config file
$template = new template();   // create a template object
//Load other values from DB
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

                    <div class="row">

                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <?php
                                    $sql = "select COUNT(Purchase_date) Purchase_date from tbl_item WHERE year(Purchase_date)=YEAR(NOW())";
                                    $res = $conn->prepare($sql);
                                    $res->execute();
                                    while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                                        ?>                                         
                                        <h3><?php echo $row['Purchase_date']; ?></h3>
                                    <?php } ?>
                                    <p><a href="../AddItem/AddItem_View.php"><h5>New purchase on 2022</h5></a></p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <?php
                                    $sql = "select COUNT(Supplier_Name) Supplier_Name from tbl_supplier ";
                                    $res = $conn->prepare($sql);
                                    $res->execute();
                                    while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                                        ?> 
                                        <h3><?php echo $row['Supplier_Name']; ?></h3>
                                    <?php } ?>
                                    <p><a href="../AddItem/AddItem_View.php"><h5>Number of Suppliers on 2022</h5> </a></p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <?php
                                    $sql = "select COUNT(Condem_Date) Condem_Date from tbl_condem_data WHERE year(Condem_Date)=YEAR(NOW())";
                                    $res = $conn->prepare($sql);
                                    $res->execute();
                                    while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                                        ?>                                         
                                        <h3><?php echo $row['Condem_Date']; ?></h3>
                                    <?php } ?>
                                    <p><a href="../AddItem/AddItem_View.php"><h5>Condemned items on 2022</h5></a></p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">

                            <!-- small card -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <?php
                                    $sql = "select COUNT(repair_date) repair_date from tbl_repair WHERE year(repair_date)=YEAR(NOW())";
                                    $res = $conn->prepare($sql);
                                    $res->execute();
                                    while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                                        ?>                                         
                                        <h3><?php echo $row['repair_date']; ?></h3>
                                    <?php } ?>
                                    <p><a href="../AddItem/repairData_View.php"><h5>Repaired items on 2022</h5></a></p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-chart-pie"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row --> 


                    <div class="row">
                        <div class="col-md-6">
                            <!-- Box Comment -->
                            <div class="card card-widget">
                                <div class="widget-user-header bg-primary">
                                    <div class="card-header">
                                        <div class="user-block">
                                            <span class="username"><h3>Newly Joined Employees</h3></span>
                                        </div>
                                        <!-- /.user-block -->
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" title="Mark as read">
                                                <i class="far fa-circle"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                        <!-- /.card-tools -->
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer card-comments">

                                        <?php
                                        $sql = "Select * from tbl_user ORDER BY user_id DESC LIMIT 5";
                                        $res = $conn->prepare($sql);
                                        $res->execute();
                                        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                                            ?>                                        
                                            <div class="card-comment">
                                                <!-- User image -->
                                                <div class="comment-text">
                                                    <span class="username">
                                                        <?php echo $row['user_name']; ?>
                                                        <span class="text-muted float-right"><?php echo $row['user_designation'] ?></span>
                                                    </span><!-- /.username -->
                                                    <?php echo $row['Location_Name']; ?>
                                                </div>
                                                <!-- /.comment-text -->
                                            </div>
                                            <?php
                                        }
                                        ?>                                         

                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-md-6">
                            <!-- Widget: user widget style 2 -->
                            <div class="card card-widget widget-user-2 shadow-sm">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-primary">
                                    <div class="widget-user-image">
                                    </div>
                                    <!-- /.widget-user-image -->
                                    <h5 class="widget-user-username">Location |Item Details</h5>
                                </div>
                                <div class="card-footer p-0">
                                    <ul class="nav flex-column">
                                        <?php
                                        $sql = "select Location_Name,Item_name,COUNT(Location_Name) Location_NameC from tbl_item GROUP BY Location_Name,Item_name LIMIT 10";
                                        $res = $conn->prepare($sql);
                                        $res->execute();
                                        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                                            ?>                                            
                                            <li class="nav-item">
                                                <?php echo $row['Location_Name'] . " | " . $row['Item_name']; ?> <span class="float-right badge bg-primary"><?php echo $row['Location_NameC']; ?></span>
                                            </li>
                                            <?php
                                        }
                                        ?>                                             
                                    </ul>
                                </div>
                            </div>
                            <!-- /.widget-user -->
                        </div>                        
                    </div>




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
