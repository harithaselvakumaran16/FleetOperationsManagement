
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Sign Out</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-map-marker-alt"></i> Manage Locations</h4>
                    </div>
                    <div class="card-body">
                        <a href="newLocation.php" class="btn btn-primary">Add</a>
                        <a href="removeLocation.php" class="btn btn-primary">Remove</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-car"></i> Manage Cars</h4>
                    </div>
                    <div class="card-body">
                        <a href="newCar.php" class="btn btn-primary">Add</a>
                        <a href="removeCar.php" class="btn btn-primary">Remove</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-wrench"></i> Maintenance</h4>
                    </div>
                    <div class="card-body">
                        <a href="assignMaintenance.php" class="btn btn-primary">Add</a>
                        <a href="removeMaintenance.php" class="btn btn-primary">Remove</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-user-edit"></i> Manage Supervisors</h4>
                    </div>
                    <div class="card-body">
                        <a href="updateSupervisor.php" class="btn btn-primary">Add Supervisor</a>
                        <a href="removeSupervisor.php" class="btn btn-primary">Remove Supervisor</a>
                        <a href="allocateSupervisor.php" class="btn btn-primary">Allocate Supervisor</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-user-check"></i> Approve Customer Accounts</h4>
                    </div>
                    <div class="card-body">
                        <a href="approveLicense.php" class="btn btn-primary">Approve Accounts</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-car"></i> Return Car</h4>
                    </div>
                    <div class="card-body">
                        <a href="returnCar.php" class="btn btn-primary">Return</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/aa7b94d676.js" crossorigin="anonymous"></script>
</body>
</html>