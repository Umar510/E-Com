<?php
require 'config.php';
if (empty($_SESSION['Did'])) {
    header("Location: logout.php");
}
$Did = $_SESSION['Did'];
$bookingQuery = mysqli_query($con, "SELECT `hours`, `total-amount`, `DriverId`, `userId` 
FROM `booking` WHERE `DriverId`=$Did");

$fetchForUserId = mysqli_fetch_assoc($bookingQuery);
$UserId = $fetchForUserId['userId'];

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="Booking.css">
    <title>DriverBooker - CurrentBookings</title>
  </head>
  <body>
    <?php include('navbar.php'); ?>


    <div class="container">
        <table border="1">
            <tr>
                <th>Client Id</th>
                <th>Client Name</th>
                <th>Hours</th>
                <th>Amount</th>
            </tr>
            <?php
             $userNames = array();
            if (mysqli_num_rows($bookingQuery) > 0 ){
                while ($row = $bookingQuery->fetch_assoc()){
                    
                    $uId = $row['userId'];
                    $hours = $row['hours'];
                    $amount = $row['total-amount'];
                    // Fetch and store user name for each row
                    $userQuery = mysqli_query($con, "SELECT `id`,`name` FROM `user` WHERE `id`='$uId'");
                    $fetchforUserName = mysqli_fetch_assoc($userQuery);
                    $userName = $fetchforUserName['name'];
                    echo "
                    <tr>
                    <td>$uId</td>
                    <td>$userName</td>
                    <td>$hours</td>
                    <td>$$amount</td>
                    </tr>
                    ";
                }
            }
            else {
              echo"
              <tr>
                    <td>NaN</td>
                    <td>NaN</td>
                    <td>NaN</td>
                    <td>NaN</td>
                    </tr>
              ";
            }
            ?>
        </table>
    </div>



    <?php include('footer.php');?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
