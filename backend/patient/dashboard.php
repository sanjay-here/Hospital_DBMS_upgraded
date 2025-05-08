<?php
session_start();
include('assets/inc/config.php'); // Database connection

// Redirect if not logged in
if (!isset($_SESSION['pat_id'])) {
    header("Location: index.php");
    exit();
}

$pat_id = $_SESSION['pat_id'];

// Fetch patient personal details (only once)
$stmt = $mysqli->prepare("SELECT pat_fname, pat_lname, pat_dob, pat_age, pat_number, pat_addr, pat_phone FROM his_patients WHERE pat_id = ? LIMIT 1");
$stmt->bind_param("s", $pat_id);
$stmt->execute();
$result = $stmt->get_result();
$patient = $result->fetch_assoc();

// Fetch patient's medical history (multiple records)
$history_stmt = $mysqli->prepare("SELECT pat_type, pat_date_joined, pat_ailment, pat_discharge_status, pat_bill FROM his_patients WHERE pat_id = ? ORDER BY pat_date_joined DESC");
$history_stmt->bind_param("s", $pat_id);
$history_stmt->execute();
$history_result = $history_stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Patient Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="authentication-bg authentication-bg-pattern">
    <div class="container mt-5">
    <h2 class="text-center" style="color: white;">Welcome, <?php echo htmlspecialchars($patient['pat_fname'] . ' ' . $patient['pat_lname']); ?></h2>

        <!-- Personal Details -->
        <div class="card mt-4">
            <div class="card-body">
                <h4 class="card-title">Personal Details</h4>
                <table class="table">
                    <tr><th>Full Name:</th><td><?php echo htmlspecialchars($patient['pat_fname'] . ' ' . $patient['pat_lname']); ?></td></tr>
                    <tr><th>Patient ID:</th><td><?php echo htmlspecialchars($pat_id); ?></td></tr>
                    <tr><th>Date of Birth:</th><td><?php echo htmlspecialchars($patient['pat_dob']); ?></td></tr>
                    <tr><th>Age:</th><td><?php echo htmlspecialchars($patient['pat_age']); ?></td></tr>
                    <tr><th>Phone:</th><td><?php echo htmlspecialchars($patient['pat_phone']); ?></td></tr>
                    <tr><th>Address:</th><td><?php echo htmlspecialchars($patient['pat_addr']); ?></td></tr>
                </table>
            </div>
        </div>

        <!-- Medical History -->
        <div class="card mt-4">
            <div class="card-body">
                <h4 class="card-title">Medical History</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Date Joined</th>
                            <th>Ailment</th>
                            <th>Discharge Status</th>
                            <th>Bill Amount (₹)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($record = $history_result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($record['pat_type']); ?></td>
                            <td><?php echo htmlspecialchars($record['pat_date_joined']); ?></td>
                            <td><?php echo htmlspecialchars($record['pat_ailment']); ?></td>
                            <td><?php echo htmlspecialchars($record['pat_discharge_status']); ?></td>
                            <td><?php echo htmlspecialchars($record['pat_bill']); ?> ₹</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>

    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>
</body>

</html>