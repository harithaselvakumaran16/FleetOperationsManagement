<?php 
include "dbconnection.php";
session_start();
?>

<?php

if(isset($_POST['submitButtonLogin'])) {
    $id = $_POST['username'];
    $password = $_POST['password'];
    
    
    $query = "select * from loginInformation where id = '$id'";    
  

    
    $result = mysqli_query($connection, $query);


    if(mysqli_num_rows($result) == 0) {   
    ?> 
    <script>    
    alert("Account does not exist");
    window.location.href = "login.php";
    </script> 
    <?php    
      
    }
    
    while ($row = $result->fetch_assoc()) {
        $username = $row['id'];
        $pass = $row['password'];
        if($password != $pass) {
            ?> 
            <script>    
            alert("Incorrect Password");
            window.location.href = "login.php";
            </script> 
            <?php   
        }
        $userType = $row['userType'];
        $_SESSION['id'] = $id;
        $_SESSION['userType'] = $userType;
        if($userType == 'admin') {
        ?>
        <script>
         window.location.href = "adminHome.php";   
        </script>
        <?php
        }
        else {
            ?>
            <script>
             window.location.href = "customerHome.php";   
            </script>
            <?php 
        }
    } 


}

if(isset($_POST['register'])) {

    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $mobilenum = $_POST['mobilenum'];
    $streetname = $_POST['streetname'];
    $apartmentnum = $_POST['apartmentnum'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipcode = $_POST['zipcode'];
    $password = $_POST['password'];
    $licensenumber = $_POST['licensenumber'];
    $damageprotection = $_POST['damageprotection'];
    $drivingcredits = $_POST['drivingcredits'];

    $query = "insert into customer(firstName, lastName, email, mobileNumber, password, streetName, apartmentNo, city, state, zipcode, drivingLicenseNumber, damageProtection, drivingCredits)";
    $query .= " values('$firstname', '$lastname', '$email', '$mobilenum', '$password', '$streetname', '$apartmentnum', '$city', '$state', '$zipcode', '$licensenumber', '$damageprotection', '$drivingcredits')";

    $result = mysqli_query($connection, $query);
    
    $_SESSION['id'] = $email;
    $_SESSION['userType'] = "customer";   
    ?>
    <script>
      window.location.href = "customerHome.php";
    </script>
    <?php

}


?>