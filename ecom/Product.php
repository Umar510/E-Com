<?php
require 'config.php';
$Id = $_GET['Did'];
$showDrivers = mysqli_query($con, "SELECT * FROM `driver` WHERE `DriverId`= '$Id'");
if (mysqli_num_rows($showDrivers) > 0) {
    $row = $showDrivers->fetch_assoc();
    $n = $row['name'];
    $img = $row['image'];
    $id = $row['DriverId'];
    $phone = $row['phone'];
    $rate = $row['rate'];
    $driverAbout = $row['driverAbout'];

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product - DriverBooker</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="Product.css">
</head>

<body>
<?php include('navbar.php');?>

    <div class="container">
        <div class="row">
            <div class="img col-md-6">
                <img style="width: 400px;" src="<?php echo "./images/$row[image]" ?>" alt="Driver img">
            </div>


            <div class="info col-md-6">
                <h5 class="card-title heading">Driver <b class="bold-red">Information</b></h5>
                <p><b>Name: </b>
                    <?php echo $n; ?>
                </p>
                <p><b>Driver ID: </b> <?php echo $id; ?></p>
                <p><b>Rating: </b> <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></p>

                <h5 class="card-title heading">What <b class="bold-red">Driver </b>says about himself</h5>
                <p><?php echo $driverAbout;?>
                </p>
                <p><b>Rate: </b>$<?php echo $rate; ?>/hr</p>
                <a href=" Booking.php?Did=<?php echo $id;?>">
                <button type="button" class="btn btn1">Book Driver</button>
                </a>
                <a href="https://api.whatsapp.com/send?phone=<?php echo $phone; ?>">
                    <button type="button" class="btn btn1">Contact Driver</button>
                </a>
            </div>
        </div>
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
