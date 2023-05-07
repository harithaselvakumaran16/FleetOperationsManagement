<?php
include "dbconnection.php";
session_start();
$id = $_SESSION['id'];

$query = "select * from booking where customerID='$id'";
$result = mysqli_query($connection, $query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Previous Car Rental Bookings</title>
    <!-- Add the Bootstrap stylesheet -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .table {
            font-size: 16px;
            margin-top: 20px;
            margin-bottom: 50px;
        }
        .table thead th {
            font-weight: bold;
            text-align: center;
            vertical-align: middle;
            border-top: none;
        }
        .table tbody td {
            text-align: center;
            vertical-align: middle;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Booking Information</a>
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
<div class="container mt-5">
    <h1 class="mb-4">Car Rental Bookings</h1>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Vehicle ID</th>
            <th scope="col">Date</th>
            <th scope="col">Number of Days</th>
            <th scope="col">Number of Hours</th>
            <th scope="col">Cost</th>
            <th scope="col">Booking Status</th>
        </tr>
        </thead>
        <tbody>
            <?php
                while($row = $result->fetch_assoc()) {
                    $vehicleID = $row['vehicleID'];
                    $date = $row['startDate'];
                    $noOfDays = $row['numberOfDays'];
                    $hours = $row['numberOfHours'];
                    $cost = $row['cost'];
                    $bookingStatus = $row['bookingStatus'];
            ?>
        <tr>
            <td><?php echo $vehicleID; ?></td>
            <td><?php echo $date; ?></td>
            <td><?php echo $noOfDays; ?></td>
            <td><?php echo $hours; ?></td>
            <td><?php echo $cost; ?></td>
            <td><?php echo $bookingStatus; ?></td>
        
        </tr>
        <?php
            }
        ?>
        <!-- Add more rows as needed -->
        </tbody>
    </table>
</div>

<!-- Add the Bootstrap JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
