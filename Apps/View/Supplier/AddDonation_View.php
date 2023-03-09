<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

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
                            <p style="text-align:left; font-size: 32px; font-weight: bold; color: black; ">
                        Donator's Details

                    </p>
                        </div>

                        <div class="card-body">
                            <?php
                            $sql = "Select * from tbl_donation";
                            $res = $conn->prepare($sql);
                            $res->execute();
                            $str = "<table id=example1 class='table table-bordered table-striped'>";
                            $str .= "<thead><tr><th>Donor ID</th><th>Donation type</th><th>Donor's Name</th><th>Donor's Mobile</th><th>Donor's Address</th><th>Donor's Country</th></tr></thead><tbody>";
                            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                                $str .= "<td>" . $row['donation_Id'] . "</td>";
                                $str .= "<td>" . $row['donation_type'] . "</td>";
                                $str .= "<td>" . $row['donation_name'] . "</td>";
                                $str .= "<td>" . $row['donation_mobile'] . "</td>";
                                $str .= "<td>" . $row['donation_address'] . "</td>";
                                $str .= "<td>" . $row['donation_country'] . "</td>";
                                //$str .= "<td> <a href=AddDonation.php?Donor ID=" . $row['donation_Id'] . ">Edit</a></td>";
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

