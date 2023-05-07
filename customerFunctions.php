<?php
include "dbconnection.php";

session_start();
if(isset($_POST['bookLocation'])) {
    $_SESSION['location'] = $_POST['blocation'];

    ?>
    <script>
        window.location.href = "selectCar.php";
    </script>
    <?php

}

if(isset($_POST['bookCar'])) {
    $hours = $_POST['hours']; 
    $days = $_POST['days'];
    $date = $_POST['dateOfBooking'];
    $hourlyRate = $_SESSION['hourlyRate'];
    $perDayRate = $_SESSION['perDayRate'];
    $vehicleID = $_SESSION['vehicleID'];
    $customerID = $_SESSION['id'];
    $query = "Call insert_booking('$customerID','$vehicleID','$date', '$days', '$hours', 'Booked')";
    $result = mysqli_query($connection, $query);
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
    $cost = ($hours * $hourlyRate) + ($days * $perDayRate) - $membershipCost;
    $query4 = "Select bookingID from booking where vehicleID = '$vehicleID'";
    $result4 = mysqli_query($connection, $query4);
    while($row4 = $result4->fetch_assoc()) {
        $bookingID = $row4['bookingID'];
    }
    $query4 = "Call update_booking_cost('$bookingID', '$cost')";
    $result4 = mysqli_query($connection, $query4);
    ?>
    <script>
        window.location.href = "customerHome.php";
    </script>
    
    <?php
}

if(isset($_POST['updateValues'])) {
    $mobileNumber = $_POST['mobileNumber'];
    $licenseNumber = $_POST['licenseNumber'];
    $id = $_SESSION['id'];    
    $query = "UPDATE customer
    SET drivingLicenseNumber = '$licenseNumber'
    WHERE email = '$id'";

    $result = mysqli_query($connection, $query);

    $query = "UPDATE customer
    SET mobileNumber = '$mobileNumber'
    WHERE email = '$id'";
    $result = mysqli_query($connection, $query);
    ?>
    <script>
        window.location.href="locationselection.php";
    </script>
    <?php
}

if(isset($_POST['addMembershipPackage'])) {
    $membershipID = $_POST['selectPackage'];

    $id = $_SESSION['id'];

    $query = "select * from memberships where customerID='$id'";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) > 0) {
         $query1 = "update memberships set membershipID='$membershipID' where customerID='$id'";
         $result1 = mysqli_query($connection, $query1);   
    }
    else {
        $query1 = "insert into memberships(membershipID, customerID) values('$membershipID', '$id')";
        $result1 = mysqli_query($connection, $query1);   
    }
    ?>
    <script>
        window.location.href = "locationselection.php";
    </script>
    <?php

}


?>