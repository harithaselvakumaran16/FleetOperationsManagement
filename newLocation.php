<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add Location Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Add New Location</a>
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
                <label for="locationName">Location Name</label>
                <input type="text" class="form-control" id="locationName" name="locationName" required>
            </div>
            <div class="form-group">
                <label for="streetAddress">Street Address</label>
                <input type="text" class="form-control" id="streetAddress" name="streetAddress" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" name="city" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="zipCode">Zipcode</label>
                    <input type="text" class="form-control" id="zipCode" name="zipCode" required>
                </div>
            </div>
            <div class="form-group">
                <label for="streetAddress">State</label>
                <input type="text" class="form-control" id="state" name="state" required>
            </div>
            <button type="submit" name="submitLocation" class="btn btn-primary">Add Location</button>
        </form>
    </div>
</body>
</html>
