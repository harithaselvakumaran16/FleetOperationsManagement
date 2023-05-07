<?php 
include "dbconnection.php";
session_start();
?>

<?php

if(isset($_POST['submitLocation'])) {
    $locationName = $_POST['locationName'];
    $streetAddress = $_POST['streetAddress'];
    $city = $_POST['city'];
    $zipCode = $_POST['zipCode'];
    $state = $_POST['state'];
    
    
    $query = "select * from location where streetName = '$streetAddress'";    

    
    $result = mysqli_query($connection, $query);


    if(mysqli_num_rows($result) == 0) {   
        $query1 = "insert into location(locationName, streetName, city, state, zipcode)";
        $query1 .= "values('$locationName','$streetAddress','$city', '$state', '$zipCode') ";
        $result1 = mysqli_query($connection, $query1);
        if(!$result1){
            die('Query Failed'.mysqli_error());
        }
        ?>
        <script>
            window.location.href = "adminHome.php";
        </script>
        <?php   
    }
    else {
        ?> 
    <script>    
    alert("Location already exists");
    window.location.href = "newLocation.php";
    </script> 
    <?php   
    }
    

}

if(isset($_POST['removeLocation'])) {
    $locationID = $_POST['selectLocation'];
    
    $query2 = "select * from vehicles where locationID = '$locationID'";        

    $query3 = "select * from supervisor where assignedLocationID = '$locationID'";
    
    $result2 = mysqli_query($connection, $query2);
    $result3 = mysqli_query($connection, $query3);

    

    if(mysqli_num_rows($result2) != 0 || mysqli_num_rows($result3) != 0) {
       ?>
       <script>
            alert("Remove the cars and supervisors from the location"); 
            window.location.href = "removeLocation.php";
       </script> 
       
       <?php
    }
    else {
            $query1 = "delete from location where locationID = '$locationID'";    


            $result1 = mysqli_query($connection, $query1);

            ?>
            <script>
                    window.location.href = "adminHome.php";
            </script> 
    
    <?php
    }

}
if(isset($_POST['addNewCar'])) {

    $locationID = $_POST['selectLocation'];
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $mileage = $_POST['mileage'];
    $seats = $_POST['seats'];
    $numberPlate = $_POST['numberPlate'];
    $hourlyRate = $_POST['hourlyRate'];
    $perDayRate = $_POST['perDayRate'];
    $lateCharges = $_POST['lateCharges'];
    
    $query4 = "select typeID from vehicleType where make = '$make' and model ='$model' and year='$year'";
    
    $result4 = mysqli_query($connection, $query4);

    if(mysqli_num_rows($result4) > 0) {
        while ($row = $result4->fetch_assoc()) {
            $typeID = $row['typeID'];
        }    
        $query5 = "insert into vehicles(numberPlate, hourlyRate, perDayRate, lateChareges, availability, typeID, locationID)";
        $query5 .= " values('$numberPlate', '$hourlyRate', '$perDayRate', '$lateCharges', 1, '$typeID', '$locationID')";

        $result5 = mysqli_query($connection, $query5);
    }
    else {
        $query6 = "insert into vehicleType(model, make, year, mileage, seats)";
        $query6 .= " values('$model', '$make', $year, '$mileage', $seats)";
        
        $result6 = mysqli_query($connection, $query6);

        $query7 = "select typeID from vehicleType where make = '$make' and model ='$model' and year='$year'";
    
        $result7 = mysqli_query($connection, $query7);

        if(mysqli_num_rows($result7) > 0) {
            while ($row = $result7->fetch_assoc()) {
                $typeID = $row['typeID'];
        
            }    
    
            $query8 = "insert into vehicles(numberPlate, hourlyRate, perDayRate, lateChareges, availability, typeID, locationID)";
            $query8 .= " values('$numberPlate', '$hourlyRate', '$perDayRate', '$lateCharges', 1, '$typeID', '$locationID')";

            $result8 = mysqli_query($connection, $query8);
        }

    }

    ?>
    <script>
        window.location.href = "adminHome.php";
    </script>
    <?php



}

if(isset($_POST['removeCar'])) {
    $vehicleNumberPlate = $_POST['numberPlate'];

    $query = "select * from vehicles where numberPlate='$vehicleNumberPlate'";

    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) == 0) {
        ?>
        <script>
            alert("Invalid Vehicle Details");
            window.location.href = "removeCar.php";
        </script>
        <?php
    }
    else {
        $query1 = "delete from vehicles where numberPlate='$vehicleNumberPlate'";
        $result1 = mysqli_query($connection, $query1);    
        ?>
        <script>
            window.location.href = "adminHome.php";
        </script>
        <?php
    }
}


if(isset($_POST['assignMaintenance'])) {
    $maintenanceProvider = $_POST['maintenanceProvider'];
    $date = $_POST['mdate'];
    $numberPlate = $_POST['numberPlate'];

    $query = "select * from vehicles where numberPlate='$numberPlate'";

    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) == 0) {
        ?>
        <script>
            alert("Invalid Vehicle Details");
            window.location.href = "assignMaintenance.php";
        </script>
        <?php
    }
    else {
        while ($row = $result->fetch_assoc()) {
            $vehicleID = $row['vehicleID'];
            echo $vehicleID;
            echo $date;
            echo $maintenanceProvider;
        }    
        $query1 = "insert into maintenance(maintenanceProvider, maintenanceDate, vehicleID)";
        $query1 .= " values('$maintenanceProvider', '$date', '$vehicleID')";
        $result1 = mysqli_query($connection, $query1);    
        if(!$result1){
            die('Query Failed'.mysqli_error());
        }
        ?>
        <script>
            window.location.href = "adminHome.php";
        </script>
        <?php
    }

}

if(isset($_POST['removeMaintenance'])) {
    $id = $_POST['mID'];
    $query = "delete from maintenance where maintenanceID='$id'";

    $result = mysqli_query($connection, $query);

    ?>
    <script>
        window.location.href = "adminHome.php";
    </script>
    <?php
}

if(isset($_POST['addSupervisor'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];

    $query = "insert into supervisor(firstName, lastName, email, assignedLocationID)";
    $query .= " values('$firstName', '$lastName', '$email', NULL)";

    $result = mysqli_query($connection, $query);

    ?>
    <script>
        window.location.href = "adminHome.php";
    </script>
    <?php
}

if(isset($_POST['removeSupervisor'])) {
    $supervisorID = $_POST['selectSupervisor'];

    $query = "select * from supervisor where supervisorID='$supervisorID'";
    
    $result = mysqli_query($connection, $query);

    while ($row = $result->fetch_assoc()) {
        $assignedLocation = $row['assignedLocationID'];
        if($assignedLocation != NULL) {
            ?>
            <script>
                alert("Supervisor is allocated to a location");
                window.location.href="removeSupervisor.php";
            </script>
            <?php
        }
        else {
            $query1 = "delete from supervisor where supervisorID='$supervisorID'";
    
            $result1 = mysqli_query($connection, $query1);    

            ?>
            <script>
                window.location.href="adminHome.php";
            </script>
            <?php

        }
    }

}


if(isset($_POST['returnCar'])) {
    $numberPlate = $_POST['numberPlate'];
    $dateOfReturn = $_POST['dateOfReturn']; 
    $query = "select * from vehicles where numberPlate = '$numberPlate' and availability = 0";
    $result = mysqli_query($connection, $query);

    while ($row = $result->fetch_assoc()){
      $vehicleID = $row['vehicleID'];
      $lateCharges = $row['lateChareges'];      
    }
    $query = "Update vehicles set availability = 1 where vehicleID='$vehicleID' and availability = 0";
    $result = mysqli_query($connection, $query);

    $query = "select * from booking where vehicleID = '$vehicleID'";
    $result = mysqli_query($connection, $query);
    while ($row = $result->fetch_assoc()){
        $startDate = $row['startDate'];
        $noOfDays = $row['noOfDays'];     
        $bookingID = $row['bookingID'];
        $cost = $row['cost'];
        $newDate = explode(" ", $startDate);
        $d1 = new DateTime($dateOfReturn);
        $d2 = new DateTime($newDate[0]);
        $interval = $d1->diff($d2);
        $totalDays =  $interval->d;
        if($totalDays > $noOfDays) {
            $newCost = $cost + $lateCharges;
            $query1 = "Call update_booking_cost('$bookingID', '$newCost')";
            $result1 = mysqli_query($connection, $query1);
        }

    }
    $query2 = "Update booking set bookingStatus = 'Returned' where bookingID='$bookingID'";
    $result2 = mysqli_query($connection, $query2);
    
     ?>
     <script>
        window.location.href = "adminHome.php";
     </script>
     <?php   
}

if(isset($_POST['allocateSupervisor'])) {
    $supervisorID = $_POST['selectSupervisor'];
    $locationID = $_POST['selectLocation'];
    
    $query = "select * from supervisor where supervisorID='$supervisorID'";

    $result = mysqli_query($connection, $query);

    while($row = $result->fetch_assoc()) {
        $assignedLocationID = $row['assignedLocationID'];
    }

    if(!is_null($assignedLocationID)) {
        ?>
        <script>
            alert("The location or supervisor is already assigned");
            window.location.href = "allocateSupervisor.php";
        </script>
        <?php
    }
    else {
        $query = "update supervisor set assignedLocationID = '$locationID' where supervisorID = '$supervisorID'";
        $result = mysqli_query($connection, $query);
        ?>
        <script>
            window.location.href = "adminHome.php";
        </script>
        <?php
    }

}


?>