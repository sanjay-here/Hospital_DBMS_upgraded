<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $doc_id = $_SESSION['doc_id'];
?>

<!DOCTYPE html>
<html lang="en">
<?php include('assets/inc/head.php');?>

<body>
    <div id="wrapper">
        <?php include('assets/inc/nav.php');?>
        <?php include("assets/inc/sidebar.php");?>

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
                                            <div class="form-group mr-2" style="display:none">
                                                <select id="demo-foo-filter-status" class="custom-select custom-select-sm">
                                                    <option value="">Show all</option>
                                                    <option value="Discharged">Discharged</option>
                                                    <option value="OutPatients">OutPatients</option>
                                                    <option value="InPatients">InPatients</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input id="demo-foo-search" type="text" placeholder="Search" class="form-control form-control-sm" autocomplete="on">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="table-responsive">
                                    <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th data-toggle="true">Patient Name</th>
                                                <th data-hide="phone">Patient Number</th>
                                                <th data-hide="phone">Address</th>
                                                <th data-hide="phone">Phone</th>
                                                <th data-hide="phone">Age</th>
                                                <th data-hide="phone">Category</th>
                                                <th data-hide="phone">Discharge</th>
                                                <th data-hide="phone">Bill (₹)</th>
                                                <th data-hide="phone">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $ret="SELECT * FROM his_patients ORDER BY RAND()"; 
                                                $stmt= $mysqli->prepare($ret);
                                                $stmt->execute();
                                                $res=$stmt->get_result();
                                                $cnt=1;
                                                while($row=$res->fetch_object()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $cnt;?></td>
                                                <td><?php echo $row->pat_fname;?> <?php echo $row->pat_lname;?></td>
                                                <td><?php echo $row->pat_number;?></td>
                                                <td><?php echo $row->pat_addr;?></td>
                                                <td><?php echo $row->pat_phone;?></td>
                                                <td><?php echo $row->pat_age;?> Years</td>
                                                <td><?php echo $row->pat_type;?></td>
                                                <td><?php echo $row->pat_discharge_status;?></td>
                                                <td><?php echo number_format($row->pat_bill);?></td>
                                                <td>
                                                    <a href="his_doc_view_single_patient.php?pat_id=<?php echo $row->pat_id;?>&&pat_number=<?php echo $row->pat_number;?>&&pat_name=<?php echo $row->pat_fname;?>_<?php echo $row->pat_lname;?>" class="badge badge-success">
                                                        <i class="mdi mdi-eye"></i> View
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php $cnt++; } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr class="active">
                                                <td colspan="10">
                                                    <div class="text-right">
                                                        <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <?php include('assets/inc/footer.php');?>

        </div>

    </div>

    <div class="rightbar-overlay"></div>

    <!-- Scripts -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/libs/footable/footable.all.min.js"></script>
    <script src="assets/js/pages/foo-tables.init.js"></script>
    <script src="assets/js/app.min.js"></script>

</body>
</html>
