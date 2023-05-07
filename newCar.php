<?php
include "dbconnection.php";

$query = "select * from location";

$result = mysqli_query($connection, $query);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add New Car</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Add New Car</a>
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
        <form action="adminFunctions.php" method="post">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Select Location:</label>
                <select class="form-control" id="exampleFormControlSelect1" name="selectLocation">
                    <?php
                        while ($row = $result->fetch_assoc()) {
                            $locationName =  $row['locationName'];
                            $streetName = $row['streetName'];
                            $locationID = $row['locationID'];
                            ?>
                            <option value="<?php echo $locationID?>"><?php echo $locationName.'-'.$streetName  ?> </option>
                            <?php
                        }

                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="make">Make</label>
                <input type="text" class="form-control" id="make" name="make" placeholder="Enter Make">
            </div>
            <div class="form-group">
                <label for="model">Model</label>
                <input type="text" class="form-control" id="model" name="model" placeholder="Enter Model">
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input type="number" class="form-control" id="year" name="year" placeholder="Enter Year">
            </div>
            <div class="form-group">
                <label for="mileage">Mileage</label>
                <input type="text" class="form-control" id="mileage" name="mileage" placeholder="Enter Mileage">
            </div>
            <div class="form-group">
                <label for="seats">Seats</label>
                <input type="number" class="form-control" id="seats" name="seats" placeholder="Enter Seats">
            </div>
            <div class="form-group">
                <label for="numberPlate">Number Plate</label>
                <input type="text" class="form-control" id="numberPlate" name="numberPlate" placeholder="Enter Number Plate">
            </div>
            <div class="form-group">
                <label for="hourlyRate">Hourly Rate</label>
                <input type="number" class="form-control" id="hourlyRate" name="hourlyRate" placeholder="Enter Hourly Rate">
            </div>
            <div class="form-group">
                <label for="perDayRate">Per Day Rate</label>
                <input type="number" class="form-control" id="perDayRate" name="perDayRate" placeholder="Enter Per Day Rate">
            </div>
            <div class="form-group">
                <label for="lateCharges">Late Charges</label>
                <input type="number" class="form-control" id="lateCharges" name="lateCharges" placeholder="Enter Late Charges">
            </div>
            <button type="submit" name="addNewCar" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
