<?php
require_once '../../Control/config.php';  // call config file
$template = new template();   // create a template object
// check user logged ? and user role to load page
//if(isset($_SESSION['username'])&& ( $_SESSION['login_role']=='Admin'))
//{

//} else {
	//header('Location:'.BASE_URL.'index.php');
//}
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
                           <p style="text-align: left; font-size: 32px; font-weight: bold; color: black; ">
                         Equipment details

                    </p>
                        </div>
                        

                        <div class="card-body">
                            <?php
                            $Item_id=$_GET['Item_id'];
                            $sql = "SELECT * FROM tbl_item WHERE Item_id='$Item_id'";
                            $res = $conn->prepare($sql);
                            $res->execute();
                            $str = "<table id=example1 class='table table-bordered table-striped'>";
                            $str .= "<thead><tr><th>Item Id</th><th>Item Name</th><th>Item Type</th><th>Price(Rs.)</th><th>Supplier</th><th>perchase Date</th>"
                                    . "<th>Invoice No.</th><th>Warranty(Yrs)</th><th>Modle Number</th><th>Location</th><th>QR-Code</th><th>Item_status</th><th>Action</th></tr></thead><tbody>";
                            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                                $str .= "<td>" . $row['Item_id'] . "</td>";
                                $str .= "<td>" . $row['Item_name'] . "</td>";
                                $str .= "<td>" . $row['Item_type'] . "</td>";
                                $str .= "<td>" . $row['Item_price'] . "</td>";
                                $str .= "<td>" . $row['Supplier_Name'] . "</td>";
                                $str .= "<td>" . $row['Purchase_date'] . "</td>";
                                $str .= "<td>" . $row['Invoice_No'] . "</td>";
                                $str .= "<td>" . $row['Warranty'] . "</td>";
                                $str .= "<td>" . $row['Item_Modleno'] . "</td>";
                                $str .= "<td>" . $row['Location_Name'] . "</td>";
                                $str .= "<td><img width=60 height=40 src=../../../" . $row['Item_qrcode'] . "><a href=../../../" . $row['Item_qrcode'] . " target='_blank'>Download</a></td>";
                                $str .= "<td>" . $row['Item_status'] . "</td>";
                                $str .= "<td> <a href=AddItem.php?Item_id=".$row['Item_id'].">Edit</a></td>";
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

