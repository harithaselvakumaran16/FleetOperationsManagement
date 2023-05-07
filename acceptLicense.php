<?php
include "dbconnection.php";
$id = $_GET['id'];

$query = "update approvalStatus set status = 'Approved' where id = '$id'";

$result = mysqli_query($connection, $query);


?>

<script>
    window.location.href="approveLicense.php";
</script>