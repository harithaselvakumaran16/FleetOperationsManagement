<?php
   include "dbconnection.php";
   session_start();
   $id = $_SESSION['id'];
   $query = "select * from customer where email='$id'";

   $result = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Account Information</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Account Information</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="locationselection.php">Back</a>
                </li>
            </ul>
        </div>
    </nav>
    <?php
        while($row = $result->fetch_assoc()) {
            $email = $row['email'];
            $mobileNumber = $row['mobileNumber'];
            $drivingLicenseNumber = $row['drivingLicenseNumber'];
    ?>
	<div class="container my-5">
		<form action="customerFunctions.php" method="post">
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" class="form-control" id="email" name="email" value="<?php echo $email?>" readonly="readonly">
			</div>
			<div class="form-group">
				<label for="licenseNumber">License Number:</label>
				<input type="text" class="form-control" id="licenseNumber" name="licenseNumber" value="<?php echo $drivingLicenseNumber?>">
			</div>
			<div class="form-group">
				<label for="mobileNumber">Mobile Number:</label>
				<input type="text" class="form-control" id="mobileNumber" name="mobileNumber" value="<?php echo $mobileNumber?>">
			</div>
			<button type="submit" name="updateValues"  class="btn btn-primary">Update</button>
		</form>
	</div>
    <?php
        }
    ?>       

</body>
</html>
