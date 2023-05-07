 <?php
//    require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Car Rental Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">User Registration</h4>
                </div>
                <div class="card-body">
                    <form action="functions.php" method="post" id="registration-form">
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" id="firstname" name="firstname" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" id="lastname" name="lastname" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email ID</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="mobilenum">Phone number</label>
                            <input type="number" id="mobilenum" name="mobilenum" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="streetname">Street Name</label>
                            <input type="text" id="streetname" name="streetname" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="apartmentnum">Apartment No.</label>
                            <input type="text" id="apartmentnum" name="apartmentnum" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" id="city" name="city" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" id="state" name="state" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="zipcode">Zipcode</label>
                            <input type="number" id="zipcode" name="zipcode" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="licensenumber">Driving License Number</label>
                            <input type="text" id="licensenumber" name="licensenumber" class="form-control" required>
                        </div>
                        <label for="damageprotection">Damage Protection: </label>
                        <select name="damageprotection" id="damageprotection">
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                        <div class="form-group">
                            <label for="drivingcredits">Driving Credits</label>
                            <input type="number" id="drivingcredits" name="drivingcredits" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block" name="register">Register</button>
                        </div>
                        <style>
                            h6{text-align: center;}
                        </style>
                        <div class='form-group'>
                            <h6>Already a user? Click here to <a href='login.php'>Login</a></h6></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>

