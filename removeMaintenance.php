<?php
include "dbconnection.php";

$query = "select * from maintenance";

$result = mysqli_query($connection, $query);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Remove Maintenance</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Cancel Maintenance</a>
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
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="adminFunctions.php" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Provider:</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="mID">
                            <?php
                                while ($row = $result->fetch_assoc()) {
                                    $provider =  $row['maintenanceProvider'];
                                    $vehicleID = $row['vehicleID'];
                                    $id = $row['maintenanceID'];
                                    $query1 = "select numberPlate from vehicles where vehicleID='$vehicleID'";
                                    $result1 = mysqli_query($connection, $query1);
                                    while ($row1 = $result1->fetch_assoc()) {
                                       $numberPlate = $row1['numberPlate'];         
                                    }
                                   ?>
                                   <option value="<?php echo $id?>"><?php echo $provider.'-'.$numberPlate  ?> </option>
                                   <?php
                                }

                            ?>
                        </select>
                    </div>
                    <button type="submit" name="removeMaintenance" class="btn btn-primary">Remove Maintenance</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/aa7b94d676.js" crossorigin="anonymous"></script>
</body>
</html>
