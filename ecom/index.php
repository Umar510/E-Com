<?php
session_start();

if (empty($_SESSION['id']) && empty($_SESSION['Did'])) {
    header("Location: logout.php");
}
$showDrivers = mysqli_query($con, "SELECT * FROM `driver`");
$row = mysqli_fetch_assoc($showDrivers);
echo $row;

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="home.css">

    <title>DriverBooker</title>
</head>

<body>
    <?php include('navbar.php'); ?>

    <div class="card mb-3 card-color">
        <div class="card-img-top img-height">
            <h2 class="color">DriverBooker</h2>
            <div class="form-outline">

                <input type="search" id="form1" class="form-control header-search" placeholder="Search Driver"
                    aria-label="Search" />
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title">DriverBooker</h5>
            <p class="card-text">The place where you can get yourself a proffessional driver and no need to drive your
                car anymore.</p>
            <p class="card-text"><small class="text-muted font-italic">-CEO Umar Farooq</small></p>
        </div>
    </div>



    <div class="container">
        <h3>Our Best <b class="bold-red">Drivers</b></h3>
        <div class="card-deck">
            <?php
            if (mysqli_num_rows($showDrivers) > 0) {
                while ($row = $showDrivers->fetch_assoc()) {
                    $n = $row['name'];
                    $img = $row['image'];
                    $id = $row['DriverId'];
                    echo "
            <div class='card max-width-card'>
                <div class='img-container'>
                    <img src='./images/$row[image]' class='card-img-top circle' alt='driver'>
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
        <h3>The <b class="bold-red">Emerging</b> Ones</h3>
        <div class="card-deck">
            <?php
            $emergingDrivers = mysqli_query($con, "SELECT * FROM `driver`");
            if (mysqli_num_rows($emergingDrivers) > 0) {
                while ($row = $emergingDrivers->fetch_assoc()) {
                    $n = $row['name'];
                    $img = $row['image'];
                    $id = $row['DriverId'];
                    echo "
                    <div class='card max-width-card'>
                <div class='img-container'>
                    <img src='./images/$row[image]' class='card-img-top circle' alt='driver'>
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
        <a href="drivers.php">
            <button type="button" class=" btn btn-block seemore-btn-color"><i class="bi bi-caret-down"></i> See
                More</button>
        </a>
        <h3>About Our <b class="bold-red">Company</b></h3>
        <div class="card mb-3" style="max-width: 100%;">
            <div class="row no-gutters">
                <div class="col-md-5">
                    <!-- <img src="../images/CEO.png" class="card-img" alt="..."> -->
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3405.841045862357!2d74.23948441452735!3d31.390946160663614!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3919018a8ea548c1%3A0x4a52db69c2c814f!2sThe%20University%20of%20Lahore!5e0!3m2!1sen!2s!4v1669129316342!5m2!1sen!2s"
                        width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <h5 class="card-title heading">How it started<b class="bold-red">?</b></h5>
                        <p class="card-text">The company was started by two entrepreneurs who had a shared passion for
                            improving the way people drive. After talking with many people who were unhappy with their
                            current driving habits, they decided to create a solution that would help people make better
                            decisions while driving. In order to do this, they created a mobile app that would provide
                            real-time feedback on driving behavior.</p>
                        <h5 class="card-title heading"><i class="bi bi-geo-alt-fill bold-red"></i>Location</h5>
                        <p class="card-text">Computer Science Department
                            The University of Lahore 1-km Raiwind Road Lahore, Pakistan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>


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
