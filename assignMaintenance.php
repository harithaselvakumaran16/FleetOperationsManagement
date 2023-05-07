<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Assign Maintenance</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Assign Maintenance Provider</a>
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
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-wrench"></i> Maintenance</h4>
                    </div>
                    <div class="card-body">
                        <form action="adminFunctions.php" method="post"> 
                            <div class="form-group">
                                <label for="maintenance_provider_name">Maintenance Provider Name</label>
                                <input type="text" name="maintenanceProvider"class="form-control" id="maintenance_provider_name" placeholder="Enter maintenance provider name">
                            </div>
                            <div class="form-group">
                                <label for="date_of_maintenance">Date of Maintenance</label>
                                <input type="date" name="mdate" class="form-control" id="date_of_maintenance" placeholder="Enter date of maintenance">
                            </div>
                            <div class="form-group">
                                <label for="number_plate">Number Plate</label>
                                <input type="text" name="numberPlate" class="form-control" id="number_plate" placeholder="Enter number plate of car">
                            </div>
                            <button type="submit" name="assignMaintenance"class="btn btn-primary">Assign Maintenance</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/aa7b94d676.js" crossorigin="anonymous"></script>
</body>
</html>
