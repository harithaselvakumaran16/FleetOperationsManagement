<?php
include "dbconnection.php";

$query = "select * from supervisor";

$result = mysqli_query($connection, $query);

$query1= "select * from location";

$result1 = mysqli_query($connection, $query1);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Allocate Supervisor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Allocate Supervisor</a>
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
                        <label for="exampleFormControlSelect1">Select Supervisor:</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="selectSupervisor">
                            <?php
                                while ($row = $result->fetch_assoc()) {
                                    $supervisorID =  $row['supervisorID'];
                                    $name = $row['firstName'].' '.$row['lastName'];
                                    $locationID = $row['assignedlocationID'];
                                   ?>
                                   <option value="<?php echo $supervisorID?>"><?php echo $name  ?> </option>
                                   <?php
                                }

                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Location:</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="selectLocation">
                            <?php
                                    
                                   while ($row1 = $result1->fetch_assoc()) {
                                    $locationName =  $row1['locationName'];
                                    $streetName = $row1['streetName'];
                                    $locationID = $row1['locationID'];
                                   ?>
                                   <option value="<?php echo $locationID?>"><?php echo $locationName.'-'.$streetName  ?> </option>
                                   <?php
                                }

                            ?>
                        </select>
                    </div>
                    <button type="submit" name="allocateSupervisor" class="btn btn-primary">Allocate</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/aa7b94d676.js" crossorigin="anonymous"></script>
</body>