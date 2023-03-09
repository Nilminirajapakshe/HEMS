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
                    <<p style="text-align: center; font-size: 32px; font-weight: bold; color: blue; ">
                        Hospital Equipment Management System
                    </p>
                    <p style="text-align:center; font-size: 30px; font-weight: bold; color: blue; ">
                        Health Department,Western Province.

                    </p>
                    
                    <div class="card">
                        <div class="card-header">
                            <p style="text-align: left; font-size: 32px; font-weight: bold; color: black; ">
                        Scan QR-Code and view Equipment details

                    </p>
                           
                        </div>
                        
                        <div class="card-body"> 
                            <fieldset class="scheduler-border">
                                    <legend class="scheduler-border">Make sure the QR-code is inside the box</legend>
                                    <video id="scan_job" height="200" width="285"></video>

                                </fieldset>
                        </div>
                        </div>
                </section>
                        
            </div>
            
            
            
            
            
            
            
             <?php $template->getFooter(); ?>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <?php $template->getJquery(); ?>  
        <?php $template->getDataTable(); ?>
<script language="javascript">
    window.onload = function (e) {
        scan();
    }
</script>
<script type="text/javascript">
    function scan() {
        let scanner = new Instascan.Scanner({video: document.getElementById('scan_job')});
        scanner.addListener('scan', function (content) {
            window.location.href="http://localhost/HEMS/Apps/View/AddItem/SearchItem_View.php?Item_id="+content;
            
        });
        Instascan.Camera.getCameras().then(function (cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                console.error('No cameras found.');
            }
        }).catch(function (e) {
            console.error(e);
        });
    }
</script>
    </body>
</html>