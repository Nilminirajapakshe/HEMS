<?php
require_once '../../Control/config.php';  // call config file
$template = new template();   // create a template object
// check user logged ? and user role to load page
if (isset($_SESSION['username']) && ( $_SESSION['login_role'] == 'Admin')) {
    
} else {
    header('Location:' . BASE_URL . 'index.php');
}


//Load other values from DB
if (isset($_GET['Item_id'])) {
// Get the value from URL and assign to varibale
    $Item_id = $_GET['Item_id'];
    $sql = 'SELECT Item_name,Item_type,Item_price,Supplier_Name,Purchase_date,Invoice_No,Warranty,Item_Modleno,Location_Name,Item_qrcode,Item_status FROM tbl_item WHERE Item_id = :Item_id';
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(':Item_id' => $Item_id));

    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
        $Item_name = $row[0];
        $Item_type = $row[1];
        $Item_price = $row[2];
        $Supplier_Name = $row[3];
        $Purchase_date = $row[4];
        $Invoice_No = $row[5];
        $Warranty = $row[6];
        $Item_Modleno = $row[7];
        $Location_Name = $row[8];
        $Item_qrcode = $row[9];
        $Item_status = $row[10];
    }
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
<?php $template->showMessage(); ?>
                                <p style="text-align: left; font-size: 32px; font-weight: bold; color: black; ">
                                    Add Equipment
                                </p>
                                <!-- /.submit data for _Additem.php file -->
                                <form id="additem" action="../../Module/ItemMgt/_AddItem.php" method="post" enctype="multipart/form-data">
                                    <div class="row">

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Item Id</label>
                                                <input type="text" class="form-control" id="Item_id" name="Item_id" placeholder="Item Id" readonly="" value=<?php if (isset($_GET['Item_id'])) echo $Item_id; ?>>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Item Name</label>
                                                <div class="form-group">
<?php
$ops = '';
$stmt = $conn->query("select Item_name from tbl_itemname");
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
                                                <label>Item price(Rs.)</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="Item_price" name="Item_price" placeholder="Enter Item Price" value=<?php if (isset($_GET['Item_id'])) echo $Item_price; ?>>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Supplier Name</label>
                                                <div class="form-group">
<?php
$ops = '';
$stmt = $conn->query("select Supplier_Name from tbl_supplier");
?>
                                                    <select name="Supplier_Name" class="form-control">
                                                    <?php
                                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                        ?>
                                                            <option value='<?php echo $row['Supplier_Name'] ?>' <?php if ($row['Supplier_Name'] == @$Supplier_Name) { ?>selected<?php } ?> ><?php echo $row['Supplier_Name'] ?></option>
                                                            <?php
                                                        }
                                                        ?>                                                    


                                                    </select>	
                                                    <a href="../Supplier/AddSupplier.php">New</a> 

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Purchase Date</label>
                                                <div class="form-group">
                                                    <input type="Date" class="form-control" id="Purchase_date" name="Purchase_date" placeholder="Enter Purchase Date" value=<?php if (isset($_GET['Item_id'])) echo $Purchase_date; ?>>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Invoice Number</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="Invoice_No" name="Invoice_No" placeholder="Enter Invoice Number" value=<?php if (isset($_GET['Item_id'])) echo $Invoice_No; ?>>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Warranty(Years)</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="Warranty" name="Warranty" placeholder="Enter Warranty Period" value=<?php if (isset($_GET['Item_id'])) echo $Warranty; ?>>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Item_Modleno</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="Item_Modleno" name="Item_Modleno" placeholder="Enter Item Model" value=<?php if (isset($_GET['Item_id'])) echo $Item_Modleno; ?>>
                                                </div>
                                            </div>
                                        </div>
                                                                                                                        
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Location Name</label>
                                                <div class="form-group">
<?php
$ops = '';
$stmt = $conn->query("select Location_Name from tbl_location");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $ops .= "<option value='" . $row['Location_Name'] . "'>" . $row['Location_Name'] . "</option>";
}
?>                                                    
                                                    <select name="Location_Name" class="form-control">
                                                        <option><?php if (isset($_GET['Item_id'])) echo $Location_Name; ?></option>
                                                    <?php echo $ops; ?>
                                                    </select>	
                                                    <a href="../Location/AddLocation.php">New</a> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>QR-Code</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="Item_qrcode" name="Item_qrcode"  value=<?php if (isset($_GET['Item_id'])) echo $Item_qrcode; ?>>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Item Status</label>
                                                <div class="form-group">
<?php
$ops = '';
$stmt = $conn->query("select Item_status from tbl_itemstatus");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $ops .= "<option value='" . $row['Item_status'] . "'>" . $row['Item_status'] . "</option>";
}
?>                                                    
                                                    <select name="Item_status" class="form-control">
                                                    <?php echo $ops; ?>
                                                    </select>	
                                                    <a href="../Additem/itemstatus.php">New</a>
                                                </div>
                                            </div>
                                        </div>    
                                        <div class="card-body">
                                            <div class="table table-striped files" id="previews">
                                                <div id="template" class="row mt-2">
                                                    <div class="col-auto d-flex align-items-center">
                                                        <div class="btn-group">
                                                            <input type="submit" class="btn btn-primary start" name="Save" value="Save">
                                                            <input type="submit" onclick="Deleteitem(this.form,event)" class="btn btn-danger delete" name="Delete" value="Delete">
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
        <script>
        function Deleteitem(form,e){
            var r=confirm("Are you sure you want to delete?");
            
            if(r){
                form.submit();
            }else{
                e.preventDefault();
            }
           
        } 
        </script>
    </body>
</html>





