<?php
    include "dbconnection.php";

    $query = "select id from approvalStatus where status = 'Not Approved'";

    $result = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Licenses to be Approved</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Approve License</a>
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
        <?php
            while($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $query1 = "select * from customer where email='$id'";
                $result1 = mysqli_query($connection, $query1);
                while($row1 = $result1->fetch_assoc()) {        
                    $name = $row1['firstName'].' '.$row1['lastName'];
                    $address = $row1['streetName'].' '.$row1['apartmentNo'].' '.$row1['city'].' '.$row1['state'].' '.$row1['zipcode'];
                    $license = $row1['drivingLicenseNumber'];    
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <h4><?php echo $name ?></h4>
                        </div>
                        <div class="card-body">
                            <p>Address: <?php echo $address ?></p>
                            <p>License Number: <?php echo $license ?></p>
                            <div class="btn-group">
                                <a href="acceptLicense.php?id=<?php echo $id?>" class="btn btn-primary" name="accept">Accept</a>
                                <a href="ignoreLicense.php?id=<?php echo $id?>" class="btn btn-secondary" name="ignore">Ignore</a>
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
