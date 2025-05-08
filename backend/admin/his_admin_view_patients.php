<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid = $_SESSION['ad_id'];
?>

<!DOCTYPE html>
<html lang="en">
<?php include('assets/inc/head.php'); ?>
<body>

    <div id="wrapper">
        <?php include('assets/inc/nav.php'); ?>
        <?php include('assets/inc/sidebar.php'); ?>

        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Patients</a></li>
                                        <li class="breadcrumb-item active">View Patients</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Patient Details</h4>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <div class="mb-2">
                                    <div class="row">
                                        <div class="col-12 text-sm-center form-inline">
                                            <div class="form-group">
                                                <input id="demo-foo-search" type="text" placeholder="Search" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="table-responsive">
                                    <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th data-toggle="true">Name</th>
                                                <th data-hide="phone">Number</th>
                                                <th data-hide="phone">Address</th>
                                                <th data-hide="phone">Phone</th>
                                                <th data-hide="phone">Age</th>
                                                <th data-hide="phone">Category</th>
                                                <th data-hide="phone">Bill</th> <!-- Added Bill Column -->
                                                <th data-hide="phone">Action</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            // Fetch patient records along with the bill information
                                            $ret = "SELECT * FROM his_patients ORDER BY RAND()"; 
                                            $stmt = $mysqli->prepare($ret);
                                            $stmt->execute();
                                            $res = $stmt->get_result();
                                            $cnt = 1;
                                            while($row = $res->fetch_object()) {
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $cnt; ?></td>
                                                <td><?php echo $row->pat_fname . " " . $row->pat_lname; ?></td>
                                                <td><?php echo $row->pat_number; ?></td>
                                                <td><?php echo $row->pat_addr; ?></td>
                                                <td><?php echo $row->pat_phone; ?></td>
                                                <td><?php echo $row->pat_age; ?> Years</td>
                                                <td><?php echo $row->pat_type; ?></td>
                                                <td><?php echo $row->pat_bill; ?></td> <!-- Display Bill -->
                                                <td><a href="his_admin_view_single_patient.php?pat_id=<?php echo $row->pat_id; ?>&&pat_number=<?php echo $row->pat_number;?>" class="badge badge-success"><i class="mdi mdi-eye"></i> View</a></td>
                                            </tr>
                                        </tbody>
                                        <?php $cnt++; } ?>
                                        <tfoot>
                                            <tr class="active">
                                                <td colspan="8">
                                                    <div class="text-right">
                                                        <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div> <!-- end .table-responsive-->
                            </div> <!-- end card-box -->
                        </div> <!-- end col -->
                    </div>
                </div> <!-- container -->
            </div> <!-- content -->

            <?php include('assets/inc/footer.php'); ?>

        </div> <!-- wrapper -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/libs/footable/footable.all.min.js"></script>
        <script src="assets/js/pages/foo-tables.init.js"></script>
        <script src="assets/js/app.min.js"></script>
    </body>
</html>
