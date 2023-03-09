<?php

class template {

    public function getHead() {
        echo '
     <head>
        <link href="' . BASE_URL . 'lib/plugins/fontawesome-free/css/all.css" rel="stylesheet" type="text/css"/>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>' . SITE_TITLE . '</title>
        <link href="' . BASE_URL . 'lib/plugins/fontawesome-free/css/all.css" rel="stylesheet" type="text/css"/>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="' . BASE_URL . 'lib/plugins/fontawesome-free/css/all.min.css">
        <!-- daterange picker -->
        <link rel="stylesheet" href="' . BASE_URL . 'lib/plugins/daterangepicker/daterangepicker.css">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="' . BASE_URL . 'lib/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Bootstrap Color Picker -->
        <link rel="stylesheet" href="' . BASE_URL . 'lib/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="' . BASE_URL . 'lib/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- Select2 -->
        <link rel="stylesheet" href="' . BASE_URL . 'lib/plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="' . BASE_URL . 'lib/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
        <!-- Bootstrap4 Duallistbox -->
        <link rel="stylesheet" href="' . BASE_URL . 'lib/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
        <!-- BS Stepper -->
        <link rel="stylesheet" href="' . BASE_URL . 'lib/plugins/bs-stepper/css/bs-stepper.min.css">
        <!-- dropzonejs -->
        <link rel="stylesheet" href="' . BASE_URL . 'lib/plugins/dropzone/min/dropzone.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="' . BASE_URL . 'lib/dist/css/adminlte.min.css">
    </head>';
    }

    public function getNavbar() {
        echo '
             <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    
                </ul>

            </nav>   
    ';
    }

    public function getSidebar() {
        echo '
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="' . BASE_URL . 'lib/dist/img/avatar3.png" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">' . $_SESSION['username'] . '-' . $_SESSION['login_role'] . '</a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           ';
        if( $_SESSION['login_role']=='Admin'){
          echo '<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="' . BASE_URL . 'Apps/View/UserMgt/UserReg.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Registration </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="' . BASE_URL . 'Apps/View/UserMgt/UserReg_View.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User View</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="' . BASE_URL . 'Apps/View/UserMgt/designation.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add User Designation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="' . BASE_URL . 'Apps/View/UserMgt/designation_view.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Designation View</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="' . BASE_URL . 'Apps/View/UserMgt/userRole.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add user Role</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="' . BASE_URL . 'Apps/View/UserMgt/UserRole_view.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Role View</p>
                </a>
              </li>
            </ul>
          </li>
          ';
        }

          echo '<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Item Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="' . BASE_URL . 'Apps/View/AddItem/AddItem.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Item</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="' . BASE_URL . 'Apps/View/AddItem/AddItem_View.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Item List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="' . BASE_URL . 'Apps/View/AddItem/CondemData.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Condemed Item</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="' . BASE_URL . 'Apps/View/AddItem/CondemData_View.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Condemed Item List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="' . BASE_URL . 'Apps/View/AddItem/repairData.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add repaired Item</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="' . BASE_URL . 'Apps/View/AddItem/repairData_View.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Repaired Item List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="' . BASE_URL . 'Apps/View/AddItem/itemtype.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Item type</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="' . BASE_URL . 'Apps/View/AddItem/itemtype_View.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Item type List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="' . BASE_URL . 'Apps/View/AddItem/itemname.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Item Name</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="' . BASE_URL . 'Apps/View/AddItem/itemname_View.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Item Name List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="' . BASE_URL . 'Apps/View/AddItem/itemstatus.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Item status</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="' . BASE_URL . 'Apps/View/AddItem/ScannQrcode.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Scann QR-Code</p>
                </a>
              </li>
          </ul>
          </li>
        

                 
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Location Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="' . BASE_URL . 'Apps/View/Location/AddLocation.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Location Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="' . BASE_URL . 'Apps/View/Location/AddLocation_View.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Location Data</p>
                </a>
              </li>
              
            </ul>
          </li>
                

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Supplier Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="' . BASE_URL . 'Apps/View/Supplier/AddDonation.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Donor Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="' . BASE_URL . 'Apps/View/Supplier/AddDonation_View.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Donor List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="' . BASE_URL . 'Apps/View/Supplier/AddSupplier.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Supplier Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="' . BASE_URL . 'Apps/View/Supplier/AddSupplier_View.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Supplier List</p>
                </a>
              </li>
            </ul>
          </li>
          


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Report Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="' . BASE_URL . 'Apps/View/Report/User_rpt.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Number of Equipment in each Hospital</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="' . BASE_URL . 'Apps/View/Report/User_rpt_ttprice.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Items,year & total price</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="' . BASE_URL . 'Apps/View/Report/User_rpt_District.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Search equipment details with District </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="' . BASE_URL . 'Apps/View/Report/itme_supplier_rpt.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Item List with Supplier Data</p>
                </a>
              </li>
            </ul>
          </li>
          

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bell"></i>
              <p>
                Home and Logout
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="' . BASE_URL . 'Apps/View/UserMgt/User_Home.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Home page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="' . BASE_URL . 'HEMS/index.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
              
              
            </ul>
          </li>



                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>
    ';
    }

    public function getFooter() {
        echo '
            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b></b> 
                </div>
                <strong><a href="https://adminlte.io"></a>.</strong> 
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>    
        ';
    }

    public function getJquery() {
        echo ' 
     <script src="' . BASE_URL . 'lib/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="' . BASE_URL . 'lib/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Select2 -->
        <script src="' . BASE_URL . 'lib/plugins/select2/js/select2.full.min.js"></script>
        <!-- Bootstrap4 Duallistbox -->
        <script src="' . BASE_URL . 'lib/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
        <!-- InputMask -->
        <script src="' . BASE_URL . 'lib/plugins/moment/moment.min.js"></script>
        <script src="' . BASE_URL . 'lib/plugins/inputmask/jquery.inputmask.min.js"></script>
        <!-- date-range-picker -->
        <script src="' . BASE_URL . 'lib/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- bootstrap color picker -->
        <script src="' . BASE_URL . 'lib/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="' . BASE_URL . 'lib/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Bootstrap Switch -->
        <script src="' . BASE_URL . 'lib/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
        <!-- BS-Stepper -->
        <script src="' . BASE_URL . 'lib/plugins/bs-stepper/js/bs-stepper.min.js"></script>
        <!-- dropzonejs -->
        <script src="' . BASE_URL . 'lib/plugins/dropzone/min/dropzone.min.js"></script>
            <script src="' . BASE_URL . 'lib/qr_scanner/instascan.min.js"></script>
        <!-- AdminLTE App -->
        <script src="' . BASE_URL . 'lib/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="' . BASE_URL . 'lib/dist/js/demo.js"></script>
      
             ';
    }

    public function showMessage() {

        if (isset($_SESSION['success'])) {
            foreach ((array) $_SESSION['success'] as $success) {
                echo '<div class="alert alert-success" role="alert">
                        ' . $success . '
                      </div>';
                unset($_SESSION['success']);
            }
        }

        if (isset($_SESSION['error'])) {
            foreach ((array) $_SESSION['error'] as $error) {
                echo '<div class="alert alert-danger" role="alert">
                        ' . $error . '
                      </div>';
                unset($_SESSION['error']);
            }
        }
    }

    public function getDataTable() {
        echo ' 
     
<script src="' . BASE_URL . 'lib/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="' . BASE_URL . 'lib/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="' . BASE_URL . 'lib/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="' . BASE_URL . 'lib/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="' . BASE_URL . 'lib/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="' . BASE_URL . 'lib/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="' . BASE_URL . 'lib/plugins/jszip/jszip.min.js"></script>
<script src="' . BASE_URL . 'lib/plugins/pdfmake/pdfmake.min.js"></script>
<script src="' . BASE_URL . 'lib/plugins/pdfmake/pdfmake.js"></script>
<script src="' . BASE_URL . 'lib/plugins/pdfmake/vfs_fonts.js"></script>
<script src="' . BASE_URL . 'lib/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="' . BASE_URL . 'lib/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="' . BASE_URL . '/dist/js/adminlte.min.js?v=3.2.0"></script>

<script src="' . BASE_URL . '/dist/js/demo.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo("#example1_wrapper .col-md-6:eq(0)");
    $("#example2").DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>  
    
             ';
    }

    
        public function getChart() {
        echo '      
            <script src="' . BASE_URL . 'lib/amcharts/amcharts.js"></script>
            <script src="' . BASE_URL . 'lib/amcharts/pie.js"></script>
            <script src="' . BASE_URL . 'lib/amcharts/serial.js"></script>
            <script src="' . BASE_URL . 'lib/amcharts/xy.js"></script>
             ';
    }

}
