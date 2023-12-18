<?php
require 'config.php';
if (!empty($_SESSION['Did'])) {
    header("Location: index.php");
}
if (empty($_SESSION['id'])) {
    header("Location: logout.php");
}

$Id = $_SESSION['id'];
$sql = mysqli_query($con, "SELECT `email`, `name`, `cnic`,`phone` FROM `user` WHERE id = '$Id'");
$row = mysqli_fetch_assoc($sql);

$name = $row['name'];
$email = $row['email'];
$cnic = $row['cnic'];
$phone = $row['phone'];

if (isset($_POST['submit'])) {
    $nameUpdate = $_POST['name'];
    $cnicUpdate = $_POST['cnic'];
    $numberUpdate = $_POST['phone'];
    $emailUpdate = $_POST['email'];

    $queryUpdate = mysqli_query($con, "UPDATE `user` 
    SET `email`='$emailUpdate',`name`='$nameUpdate',`cnic`='$cnicUpdate',`phone`='$numberUpdate' WHERE `id`='$Id'");
    echo "<script>alert('Information Updated')</script>";
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
    <link rel="stylesheet" href="useraccount.css">
</head>

<body>
    <?php include('navbar.php'); ?>

    <div class="container main">
        <div class="inner-container">
            <h3 class="card-title heading">Your <b class="bold-red">Information</b></h3>
            <p><b>Name:</b> <?php echo $name; ?></p>
            <p><b>CNIC:</b>
                <?php echo $cnic; ?>
            </p>
            <p><b>Phone No.</b>
                <?php echo $phone; ?>
            </p>
            <p><b>Email:</b> <?php echo $email; ?></p>
            <button type="submit" onclick="showEditDetails()" class="btn btn-outline-danger button-change">Change/Edit
                Info</button>
        </div>
        <form action="useraccount.php" method="post">
            <div id="edit-info" class="hide">
                <p>Name<br /><input type="text" name="name" placeholder="Name"></p>
                <p>CNIC<br /><input type="text" name="cnic" placeholder="CNIC"></p>
                <p>Phone No.<br /><input type="text" name="phone" placeholder="phone"></p>
                <p>Email<br /><input name="email" placeholder="Email"></input></p>
                <button type="submit" name="submit" class="btn btn-outline-danger button-change">Submit Changes</button>
            </div>
        </form>
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

    <script>
        var change = document.getElementById('edit-info');
        function showEditDetails() {
            change.classList.remove('hide');
        }

        var js = 0;
        while (js < 10) {
            console.log(js);
            js++;
        }
    </script>
</body>

</html>
