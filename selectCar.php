<?php
    include "dbconnection.php";
    session_start();
    $location = $_SESSION['location'];

    $query = "select * from vehicles where availability = 1 and locationID = '$location'";

    $result = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Book Car</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Book Car</a>
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
    <div class="container my-5">
        <?php
            while($row = $result->fetch_assoc()) {
                $typeID = $row['typeID'];
                $vehicleID = $row['vehicleID'];
                $numberPlate = $row['numberPlate'];
                $hourlyRate = $row['hourlyRate'];
                $perDayRate = $row['perDayRate'];
                $lateCharges = $row['lateChareges'];
                $query1 = "select * from vehicleType where typeID='$typeID'";
                $result1 = mysqli_query($connection, $query1);
                while($row1 = $result1->fetch_assoc()) {        
                    $model = $row1['model'].' '.$row1['make'].'-'.$row1['year'];
                    $mileage = $row1['mileage'];
                    $seats = $row1['seats'].' '."seater";    
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <h4><?php echo $model ?></h4>
                        </div>
                        <div class="card-body">
                            <p>Mileage: <?php echo $mileage ?></p>
                            <p><?php echo $seats ?></p>
                            <p>Hourly Rate: <?php echo $hourlyRate ?></p>
                            <p>Per Day Rate: <?php echo $perDayRate ?></p>
                            <p>Late Charges: <?php echo $lateCharges ?></p>
                            <div class="btn-group">
                                <a href="carbooking.php?id=<?php echo $vehicleID?>" class="btn btn-primary" name="book">Book</a>
                            </div>
                        </div>
                    </div>    
                        
                    <br>    
                <?php
                }
            }
            ?>
        
    </div>
    <script src="https://kit.fontawesome.com/aa7b94d676.js" crossorigin="anonymous"></script>
</body>
</html>