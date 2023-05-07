<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Return Vehicle</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">Return Vehicle</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="adminHome.php">Back</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="container my-5">
		<div class="card">
			<div class="card-header">
				<h2>Return Vehicle</h2>
			</div>
			<div class="card-body">
				<form action="adminFunctions.php" method="post">
					<div class="form-group">
						<label for="numberPlate">Number Plate:</label>
						<input type="text" class="form-control" id="numberPlate" name="numberPlate">
					</div>
					<div class="form-group">
						<label for="dateOfReturn">Date of Return:</label>
						<input type="date" class="form-control" id="dateOfReturn" name="dateOfReturn">
					</div>
					<button type="submit" name="returnCar" class="btn btn-primary btn-block">Return Vehicle</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
