<?php
    include "dbconnection.php";
    session_start();
    $vehicleID = $_GET['id'];
    $customerID = $_SESSION['id'];
    $query = "select * from vehicles where vehicleID='$vehicleID'";
    $result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Confirm Booking</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Confirm Booking</a>
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
        $typeID = $row['typeID'];
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
    <div class="container my-5">
        <div class="card">
            <div class="card-header">
                <h2><?php echo $model; ?></h2>
            </div>
            <div class="card-body">
                <p>Number Plate: <?php echo $numberPlate; ?></p>
                <p>Mileage: <?php echo $mileage ?></p>
                <p><?php echo $seats ?></p>
                <form action="customerFunctions.php" method="post" id="bookingForm">
                    <label for="Date">Date:</label>
                    <input type="date" id="dateOfBooking" class="form-control" name="dateOfBooking">
                    <br>
                    <label for="hours">Number of Hours:</label>
                    <input type="number" class="form-control" id="hours" name="hours">
                    <br>
                    <label for="days">Number of Days:</label>
                    <input type="number" class="form-control" id="days" name="days">
                    <br>
                </form>

                <div id="result" name="cost"></div>
                <br>
                <br>    
                <div class="row mt-3">
                    <div class="col-md-6">
                    <button type="submit" class="btn btn-primary btn-block" onclick="calculateCost()">Calculate Cost</button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" form="bookingForm" name="bookCar" class="btn btn-secondary btn-block">Book</button>
                    </div>
                </div>
            </div> 
        </div>
    </div>   
    <?php
        }
    }
    ?>    
    <script>
        function calculateCost() {
            const hours = parseInt(document.getElementById("hours").value);
            const days = parseInt(document.getElementById("days").value);
            <?php
                $query2 = "select * from memberships where customerID='$customerID'";
                $result2 = mysqli_query($connection, $query2);
                if(mysqli_num_rows($result2) == 0) {
                    $membershipCost = 0;
                } 
                else {
                    while($row2 = $result2->fetch_assoc()) {
                
                        $membershipID = $row2['membershipID'];
                        $query3 = "select * from membershipPackage where membershipID='$membershipID'";
                        $result3 = mysqli_query($connection, $query3);
                        while($row3 = $result3->fetch_assoc()) {
                           $membershipCost = $row3['discount'];     
                        }
                    }
                }
            ?>
            const cost = (hours * <?php echo $hourlyRate?>) + (days * <?php echo $perDayRate?>) - (<?php echo $membershipCost?>);
            document.getElementById("result").innerHTML = `Cost: $${cost}`;
            
            <?php $_SESSION['vehicleID'] = $vehicleID;
                  $_SESSION['hourlyRate'] = $hourlyRate;
                  $_SESSION['perDayRate'] = $perDayRate;  
            ?> 
        }
    </script>
</body>
</html>

