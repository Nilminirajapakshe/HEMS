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
if (isset($_GET['itemname_id'])) {
// Get the value from URL and assign to varibale
    $Condem_code = $_GET['itemname_id'];
    $sql = 'SELECT itemname_id,Item_name WHERE itemname_id = :itemname_id';
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(':itemname_id' => $itemname_id));

    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
        $itemname_id= $row[0];
        $Item_name = $row[1];
        
        
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
                        Enter Item Name

                    </p>
                                <form action="../../Module/ItemMgt/_itemname.php" method="post">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Item name Id</label>
                                                <input type="text" class="form-control" id="itemname_id" name="itemname_id" placeholder="itemname_id" readonly="" value=<?php if(isset($_GET['itemname_id'])) echo $itemname_id; ?>>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Item Name</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="Item_name" name="Item_name" placeholder="Enter Item Name" value=<?php if(isset($_GET['itemname_id'])) echo $Item_name; ?>>
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

