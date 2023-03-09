<?php
require_once '../../Control/config.php';  // call config file
$template = new template();   // create a template object
// check user logged ? and user role to load page
if (isset($_SESSION['username']) && ( $_SESSION['login_role'] == 'Admin')) {
    
} else {
    header('Location:' . BASE_URL . 'index.php');
}



$sql = 'SELECT COUNT(user_role) user_roleC,user_role FROM tbl_user GROUP BY user_role';

$stmt = $conn->prepare($sql);
$stmt->execute(array());

while ($row = $stmt->fetch(PDO::FETCH_NUM)) {

    $data1[] = array('user_roleC' => $row[0], 'user_role' => $row[1]);
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


                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">User Details</h3>
                        </div>


                        <div class="card-body">

                            <div id="chartMarksdiv" style="width:600px; height:400px;"></div>

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
        <?php $template->getChart(); ?>

        <script type="text/javascript">
            var chart;
            var chartData = <?php echo json_encode($data1); ?>;

            AmCharts.ready(function () {
                // PIE CHART
                chart = new AmCharts.AmPieChart();

                // title of the chart
                chart.addTitle("User role count", 16);

                chart.dataProvider = chartData;
                chart.titleField = "user_role";
                chart.valueField = "user_roleC";
                chart.sequencedAnimation = true;
                chart.startEffect = "elastic";
                chart.innerRadius = "30%";
                chart.startDuration = 2;
                chart.labelRadius = 15;
                chart.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>";
                // the following two lines makes the chart 3D
                chart.depth3D = 10;
                chart.angle = 15;

                // WRITE                                 
                chart.write("chartMarksdiv");
            });
        </script>


    </body>
</html>
