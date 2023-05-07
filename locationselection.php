<?php
include "dbconnection.php";

$query = "select * from location";

$result = mysqli_query($connection, $query);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Select the Location</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Location</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="accounts.php">Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="addMembership.php">Memberships</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="bookings.php">Bookings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Sign Out</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="customerFunctions.php" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Location:</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="blocation">
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
                    <button type="submit" name="bookLocation" class="btn btn-primary">Select</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/aa7b94d676.js" crossorigin="anonymous"></script>
</body>
</html>
