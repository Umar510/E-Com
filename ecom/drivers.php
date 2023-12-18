<?php
require 'config.php';

if (empty($_SESSION['id']) && empty($_SESSION['Did'])) {
    header("Location: logout.php");
}
$showDrivers = mysqli_query($con, "SELECT * FROM `driver`");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drivers - DriverBooker</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="drivers.css">
</head>

<body>
    <?php include('navbar.php'); ?>



    <div class="container">
        <h2>Our <b class="bold-red">Drivers</b></h2>
        <div class="card-deck">
            <?php
            if (mysqli_num_rows($showDrivers) > 0) {
                while ($row = $showDrivers->fetch_assoc()) {
                    $n = $row['name'];
                    $img = $row['image'];
                    $id = $row['DriverId'];
                    echo "
                    <div class='card max-width-drivers'>
                <div class='img-container'>
                    <img src='./images/$row[image]' class='card-img-top circle ' alt='driver'>
                </div>
                <div class='card-body'>
                    <h5 class='card-title'>$n</h5>
                    <p class='card-text'>An enthusiate driver whose mission is to take you to the destination
                        safely and within time.
                    </p>
                    <i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i
                        class='bi bi-star-fill'></i><i class='bi bi-star-half'></i>
                </div>
                <div class='hire-btn'>
                <a href='Product.php?Did= $id;' name='product'>
                    <button type='button' class='btn hire-btn-color w-100'>Hire</button>
                    </a>
                </div>
                <div class='card-footer'>
                    <small class='text-muted'>Joined 3 months ago</small>
                </div>
            </div>
                    ";
                }
            }
            ?>

        </div>
        <div class="dropdown-divider m-4"></div>
    </div>






    <?php include('footer.php');?>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>
