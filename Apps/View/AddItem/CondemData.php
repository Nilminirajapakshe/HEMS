<?php

require_once '../../Control/config.php';  // call config file
$template = new template();   // create a template object
// check user logged ? and user role to load page
if(isset($_SESSION['username'])&& ( $_SESSION['login_role']=='Admin'))
{

} else {
	header('Location:'.BASE_URL.'index.php');
}

//Load other values from DB
if (isset($_GET['Condem_code'])) {
// Get the value from URL and assign to varibale
    $Condem_code = $_GET['Condem_code'];
    $sql = 'SELECT Item_id,Item_name,Condem_Date,Condem_reasion,Condem_commity,Location_Name FROM tbl_condem_data WHERE Condem_code = :Condem_code';
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(':Condem_code' => $Condem_code));

    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
        $Item_id= $row[0];
        $Item_name = $row[1];
        $Condem_Date = $row[2];
        $Condem_reasion = $row[3];
        $Condem_commity = $row[4];
        $Location_Name = $row[5];
        
        
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
                        Add Condemned Equipment

                    </p>
                                
                                <form action="../../Module/ItemMgt/_CondemData.php" method="post">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Condemn code</label>
                                                <input type="text" class="form-control" id="Condem_code" name="Condem_code" placeholder="Condem_code" readonly="" value=<?php if(isset($_GET['Condem_code'])) echo $Condem_code; ?>>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Item Id</label>
                                                <div class="form-group">
                                                    <?php
                                                    $ops = '';
                                                    $stmt = $conn->query("select Item_id from tbl_item");
                                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                        $ops .= "<option value='" . $row['Item_id'] . "'>" . $row['Item_id'] . "</option>";
                                                    }
                                                    ?>                                                    
                                                    <select name="Item_id" class="form-control">
                                                        <?php echo $ops; ?>
                                                    </select>	
                                                </div>
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
                                                        <option><?php if(isset($_GET['Condem_code'])) echo $Item_name; ?></option>
                                                        <?php echo $ops; ?>
                                                    </select>	
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Condem Date</label>
                                                <input type="Date" class="form-control" id="Condem_Date" name="Condem_Date" placeholder="Enter Condem Date" value=<?php if(isset($_GET['Condem_code'])) echo $Condem_Date; ?>>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Condemn reasion</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="Condem_reasion" name="Condem_reasion" placeholder="Enter Condem reasion"value=<?php if(isset($_GET['Condem_code'])) echo "'".$Condem_reasion."'"; ?>>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Condemn_commity</label>
                                                <input type="text" class="form-control" id="Condem_commity" name="Condem_commity" placeholder="Enter Condem commity"value=<?php if(isset($_GET['Condem_code'])) echo $Condem_commity; ?>>
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
                                                        <option><?php if(isset($_GET['Condem_code'])) echo $Location_Name; ?></option>
                                                        <?php echo $ops; ?>
                                                    </select>	
                                                    <a href="../Location/AddLocation.php">New</a> 
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

        
