<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add New Supervisor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Add New Supervisor</a>
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
                <label for="firstName">First Name:</label>
                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter First Name">
            </div>
            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter Last Name">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
            </div>
            <button type="submit" name="addSupervisor" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://kit.fontawesome.com/aa7b94d676.js" crossorigin="anonymous"></script>
</body>
</html>
