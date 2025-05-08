<?php
session_start();
include('assets/inc/config.php'); // Include database config file

if (isset($_POST['patient_login'])) {
    $pat_id = $_POST['pat_id'];
    $pat_phone = $_POST['pat_phone'];

    // Prepare SQL query to fetch patient details
    $stmt = $mysqli->prepare("SELECT pat_id, pat_phone, pat_fname FROM his_patients WHERE pat_id = ? AND pat_phone = ?");
    $stmt->bind_param("ss", $pat_id, $pat_phone);
    $stmt->execute();
    $stmt->bind_result($db_pat_id, $db_pat_phone, $pat_name);
    $rs = $stmt->fetch();

    if ($rs) {
        $_SESSION['pat_id'] = $db_pat_id;
        $_SESSION['pat_name'] = $pat_name;
        header("Location: dashboard.php"); // Redirect to patient dashboard
        exit();
    } else {
        $err = "Invalid Patient ID or Phone Number.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Patient Login - Hospital Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    <!-- Load SweetAlert -->
    <script src="assets/js/swal.js"></script>

    <?php if (isset($err)) { ?>
    <script>
        setTimeout(function() {
            swal("Failed", "<?php echo $err; ?>", "error");
        }, 100);
    </script>
    <?php } ?>
</head>

<body class="authentication-bg authentication-bg-pattern">
    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-pattern">
                        <div class="card-body p-4">
                            <div class="text-center w-75 m-auto">
                                <a href="index.php">
                                    <img src="assets/images/logo-dark.png" alt="" height="22">
                                </a>
                                <p class="text-muted mb-4 mt-3">Enter your Patient ID and Phone Number to log in.</p>
                            </div>

                            <form method="post">
                                <div class="form-group mb-3">
                                    <label for="pat_id">Patient ID</label>
                                    <input class="form-control" name="pat_id" type="text" id="pat_id" required placeholder="Enter your Patient ID">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="pat_phone">Phone Number</label>
                                    <input class="form-control" name="pat_phone" type="text" id="pat_phone" required placeholder="Enter your Phone Number">
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-primary btn-block" name="patient_login" type="submit">Login</button>
                                </div>
                            </form>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- end container -->
    </div> <!-- end page -->

    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>
</body>

</html>
