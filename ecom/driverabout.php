<?php
require 'config.php';

// echo $_SESSION['id'];
if (empty($_SESSION['Did'])) {
    header("Location: logout.php");
}

$Id = $_SESSION['Did'];
$sql = mysqli_query($con, "SELECT `email`, `name`, `cnic`, `phone`, `password`, `driverAbout`, `rate` FROM `driver` WHERE DriverId = '$Id'");
$row = mysqli_fetch_assoc($sql);

$name = $row['name'];
$email = $row['email'];
$number = $row['phone'];
$cnic = $row['cnic'];
$password = $row['password'];
$driverAbout = $row['driverAbout'];
$rate = $row['rate'];

if (isset($_POST['submit'])) {
    $nameUpdate = $_POST['name'];
    $cnicUpdate = $_POST['cnic'];
    $numberUpdate = $_POST['number'];
    $emailUpdate = $_POST['email'];
    $driverabout = $_POST['driverAbout'];
    $Rate = $_POST['rate'];

    $queryUpdate = mysqli_query($con, "UPDATE `driver` 
    SET `email`='$emailUpdate',`name`='$nameUpdate',`cnic`='$cnicUpdate', `phone`='$numberUpdate',
    `driverAbout`='$driverabout', `rate`='$Rate' WHERE `DriverId` = '$Id'");
    if ($queryUpdate == true) {
        echo "<script>alert('Information Updated')</script>";
    }
}

if (isset($_POST['image-submit'])) {
    $image = $_POST['image'];
    $queryImage = mysqli_query($con, "UPDATE `driver` SET `image`='$image' WHERE DriverId = $Id");
    echo "<script>alert('Image Uploaded')</script>";
}

if (isset($_REQUEST['quit-drive'])) {
    echo "<script>
    let text = confirm('Your account will be deleted!');
    if (confirm(text) == true){
        console.log('Done deleting');
    }else {
        break;
    }
    </script>";
    $queryDelete = mysqli_query($con, "DELETE FROM `driver` WHERE DriverId = $Id");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account - DriverBooker</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="driverabout.css">
</head>

<body>

    <?php include('navbar.php'); ?>

    <div class="container main">
        <div class="inner-container">
            <h3 class="card-title heading">Your <b class="bold-red">Picture</b></h3>
            <form action="driverabout.php" method="post">
                <input type="file" name="image" id="image" accept="image/*" />
                <button type="submit" name="image-submit" class="btn btn-outline-danger button-change">
                    Upload Image
                </button>
            </form>
            <h3 class="card-title heading">Your <b class="bold-red">Information</b></h3>
            <p><b>Name:</b>
                <?php echo $name ?>
            </p>
            <p><b>CNIC:</b>
                <?php echo $cnic ?>
            </p>
            <p><b>Email:</b>
                <?php echo $email ?>
            </p>
            <p><b>Phone No:</b>
                <?php echo $number ?>
            </p>
            <p><b>Hourly Rate:</b>
                <?php echo $rate ?>
            </p>
            <p><b>About Your skill:</b>
                <?php echo $driverAbout; ?>
            </p>
            <button type="button" onclick="showEditDetails()" class="btn btn-outline-danger button-change">Change/Edit
                Info</button>
        </div>


        <form action="driverabout.php" method="post">
            <div id="edit-info" class="hide">
                <p>Name<br /><input type="text" name="name" id="name" placeholder="Name"></p>
                <p>CNIC<br /><input type="text" name="cnic" id="cnic" placeholder="CNIC"></p>
                <p>Phone No.<br /><input type="text" name="number" id="number" placeholder="03000000000"></p>
                <p>Email<br /><input type="text" name="email" id="email" placeholder="Email"></p>
                <p>Your Rate<br /><input type="text" name="rate" id="rate" placeholder="$2"></p>
                <p>About Your Skill<br /><input type="text" name="driverAbout" id="driverAbout"
                        placeholder="Driver About"></p>
                <button type="submit" name="submit" class="btn btn-outline-danger button-change">
                    Submit Changes
                </button>
            </div>
        </form>
    </div>
    <div class="container">
        <a href="CurrentBookings.php">
            <button type="button" class="btn btn11">Your Current Clients</button>
        </a>
    </div>
    <div class="container middle">
        <div class="row">
            <div class="rating col-md-6">
                <h3 class="card-title heading">Your <b class="bold-red">Drive</b> rating</h3>
                <h3><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                        class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
                </h3>
            </div>
            <div class="success-rate col-md-6">
                <h3 class="card-title heading">Your <b class="bold-red">Success</b> Rate</h3>

                <div class="progress">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="50"
                        aria-valuemin="0" aria-valuemax="100">Click to Views Ratio</div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100">Orders to Clicks Ratio</div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 60%" aria-valuenow="100"
                        aria-valuemin="0" aria-valuemax="100">Amount earned ride ($100 max)</div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="option-buttons col-md-12">
                <button type="button" class="btn  btn1">Take a Break</button>
                <!-- <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-secondary btn2 active">
                        <input type="radio" name="options" id="option1" checked> Online
                    </label>
                    <label class="btn btn-secondary btn2">
                        <input type="radio" name="options" id="option3"> Offline
                    </label>
                </div> -->
                <button type="submit" name="quit-drive" class="btn  btn1">Quit Driving</button>
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

    <script>
        var change = document.getElementById('edit-info');
        function showEditDetails() {
            change.classList.remove('hide');
        }



    </script>

</body>

</html>
