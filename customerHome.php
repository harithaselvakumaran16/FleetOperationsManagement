<?php
include "dbconnection.php";
session_start();


$id = $_SESSION['id'];
$query = "select status from approvalStatus where id='$id'";
$result = mysqli_query($connection, $query);

while($row = $result->fetch_assoc()) {
    $status = $row['status'];
    if($status == "Not Approved") {
      ?>
      <script>
        window.location.href = "waitPage.php";
      </script>
      <?php      
    }
    else {
      ?>
      <script>
        window.location.href = "locationselection.php";
      </script>
      <?php
    }
}

?>