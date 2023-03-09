<?php
require_once '../../Control/config.php';  // call config file
$template = new template();   // create a template object
// check user logged ? and user role to load page
if (isset($_SESSION['username']) && ( $_SESSION['login_role'] == 'Admin')) {
    
} else {
    header('Location:' . BASE_URL . 'index.php');
}



$sql = 'SELECT Item_status ,COUNT(Item_status) Item_statusC FROM tbl_item GROUP BY Item_status';

$stmt = $conn->prepare($sql);
$stmt->execute(array());

while ($row = $stmt->fetch(PDO::FETCH_NUM)) {

    $data1[] = array('Item_status' => $row[0], 'Item_statusC' => $row[1]);
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
                            <h3 class="card-title">Item Status Details</h3>
                        </div>


                        <div class="card-body">

                            <div id="chartdiv" style="width:1000px; height:400px;"></div>

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
// SERIAL CHART  
                chart = new AmCharts.AmSerialChart();
                chart.pathToImages = "../amcharts/images/";
                chart.dataProvider = chartData;
                chart.categoryField = "Item_status";
                chart.startDuration = 1;

                chart.handDrawn = true;
                chart.handDrawnScatter = 3;

// AXES
// category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.gridPosition = "start";

// value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.axisAlpha = 0;
                chart.addValueAxis(valueAxis);

// GRAPHS
// column graph
                var graph1 = new AmCharts.AmGraph();
                graph1.type = "column";
                graph1.title = "Item_status";
                graph1.lineColor = "#a668dd";
                graph1.valueField = "Item_statusC";
                graph1.lineAlpha = 1;
                graph1.fillAlphas = 1;
                graph1.dashLengthField = "dashLengthColumn";
                graph1.alphaField = "alpha";
                graph1.balloonText = "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>";
                chart.addGraph(graph1);

// line
                var graph2 = new AmCharts.AmGraph();
                graph2.type = "line";
                graph2.title = "Item_status";
                graph2.lineColor = "#fcd202";
                graph2.valueField = "Item_statusC";
                graph2.lineThickness = 3;
                graph2.bullet = "round";
                graph2.bulletBorderThickness = 3;
                graph2.bulletBorderColor = "#fcd202";
                graph2.bulletBorderAlpha = 1;
                graph2.bulletColor = "#ffffff";
                graph2.dashLengthField = "dashLengthLine";
                graph2.balloonText = "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>";
                chart.addGraph(graph2);

// LEGEND                
                var legend = new AmCharts.AmLegend();
                legend.useGraphSettings = true;
                chart.addLegend(legend);

// WRITE
                chart.write("chartdiv");
            });
        </script>  


    </body>
</html>
