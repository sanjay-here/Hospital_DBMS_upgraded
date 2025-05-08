<?php
	session_start();
	include('assets/inc/config.php');
	if(isset($_POST['add_patient'])) {
		$pat_fname = $_POST['pat_fname'];
		$pat_lname = $_POST['pat_lname'];
		$pat_number = $_POST['pat_number'];
		$pat_phone = $_POST['pat_phone'];
		$pat_type = $_POST['pat_type'];
		$pat_addr = $_POST['pat_addr'];
		$pat_age = $_POST['pat_age'];
		$pat_dob = $_POST['pat_dob'];
		$pat_ailment = $_POST['pat_ailment'];
		$pat_discharge_status = $_POST['pat_discharge_status'];
		$pat_bill = $_POST['pat_bill'];

		// SQL to insert values
		$query = "INSERT INTO his_patients (pat_fname, pat_ailment, pat_lname, pat_age, pat_dob, pat_number, pat_phone, pat_type, pat_addr, pat_discharge_status, pat_bill) 
		          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$stmt = $mysqli->prepare($query);
		$rc = $stmt->bind_param('sssssssssss', $pat_fname, $pat_ailment, $pat_lname, $pat_age, $pat_dob, $pat_number, $pat_phone, $pat_type, $pat_addr, $pat_discharge_status, $pat_bill);
		$stmt->execute();

		if($stmt) {
			$success = "Patient Details Added";
		} else {
			$err = "Please Try Again Or Try Later";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">

<?php include('assets/inc/head.php');?>

<body>
	<div id="wrapper">
		<?php include("assets/inc/nav.php");?>
		<?php include("assets/inc/sidebar.php");?>

		<div class="content-page">
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<div class="page-title-box">
								<div class="page-title-right">
									<ol class="breadcrumb m-0">
										<li class="breadcrumb-item"><a href="his_doc_dashboard.php">Dashboard</a></li>
										<li class="breadcrumb-item"><a href="javascript: void(0);">Patients</a></li>
										<li class="breadcrumb-item active">Add Patient</li>
									</ol>
								</div>
								<h4 class="page-title">Add Patient Details</h4>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<h4 class="header-title">Fill all fields</h4>
									<form method="post">
										<div class="form-row">
											<div class="form-group col-md-6">
												<label class="col-form-label">First Name</label>
												<input type="text" required name="pat_fname" class="form-control" placeholder="Patient's First Name">
											</div>
											<div class="form-group col-md-6">
												<label class="col-form-label">Last Name</label>
												<input type="text" required name="pat_lname" class="form-control" placeholder="Patient's Last Name">
											</div>
										</div>

										<div class="form-row">
											<div class="form-group col-md-6">
												<label class="col-form-label">Date Of Birth</label>
												<input type="text" required name="pat_dob" class="form-control" placeholder="DD/MM/YYYY">
											</div>
											<div class="form-group col-md-6">
												<label class="col-form-label">Age</label>
												<input type="text" required name="pat_age" class="form-control" placeholder="Patient's Age">
											</div>
										</div>

										<div class="form-group">
											<label class="col-form-label">Address</label>
											<input type="text" required name="pat_addr" class="form-control" placeholder="Patient's Address">
										</div>

										<div class="form-row">
											<div class="form-group col-md-4">
												<label class="col-form-label">Mobile Number</label>
												<input type="text" required name="pat_phone" class="form-control">
											</div>
											<div class="form-group col-md-4">
												<label class="col-form-label">Patient Ailment</label>
												<input type="text" required name="pat_ailment" class="form-control">
											</div>
											<div class="form-group col-md-4">
												<label class="col-form-label">Patient Type</label>
												<select required name="pat_type" class="form-control">
													<option selected disabled>Choose</option>
													<option>InPatient</option>
													<option>OutPatient</option>
												</select>
											</div>
										</div>

										<div class="form-row">
											<div class="form-group col-md-4">
												<label class="col-form-label">Discharge Status</label>
												<select required name="pat_discharge_status" class="form-control">
													<option selected disabled>Choose</option>
													<option>Admitted</option>
													<option>Discharged</option>
												</select>
											</div>
											<div class="form-group col-md-4">
												<label class="col-form-label">Total Bill Amount</label>
												<input type="text" required name="pat_bill" class="form-control" placeholder="Enter Bill Amount">
											</div>
											<div class="form-group col-md-4" style="display:none">
												<?php 
													$length = 5;    
													$patient_number = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
												?>
												<label class="col-form-label">Patient Number</label>
												<input type="text" name="pat_number" value="<?php echo $patient_number;?>" class="form-control">
											</div>
										</div>

										<button type="submit" name="add_patient" class="ladda-button btn btn-primary" data-style="expand-right">Add Patient</button>
									</form>
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
	<script src="assets/js/app.min.js"></script>
	<script src="assets/libs/ladda/spin.js"></script>
	<script src="assets/libs/ladda/ladda.js"></script>
	<script src="assets/js/pages/loading-btn.init.js"></script>

</body>
</html>
