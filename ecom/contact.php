<?php
require 'config.php';
session_start();
if (empty($_SESSION['id']) && empty($_SESSION['Did'])) {
    header("Location: logout.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - DriverBooker</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="contact.css">
</head>

<body>
<?php include('navbar.php');?>

    <div class="container">
        <h3>How to <b class="bold-red">Contact</b> us?</h3>
        <div class="map">
            <div class="row">
                <div class="col-md-7">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3405.841045862357!2d74.
                    23948441452735!3d31.390946160663614!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3919018
                    a8ea548c1%3A0x4a52db69c2c814f!2sThe%20University%20of%20Lahore!5e0!3m2!1sen!2s!4v1669217928893!5m2!1sen!2s"
                         height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade" class="maps-max-width-on-mobile"></iframe>
                </div>
                <div class="col-md-5">
                    <h5>CEO <b class="bold-red">Mail</b></h5>
                    <p>tahazubair.info@gmail.com</p>
                    <h5>Company <b class="bold-red">Contact</b></h5>
                    <p>03174071947</p>
                    <h5>We are <b class="bold-red">Based in</b></h5>
                    <p>1-Km Defence Road،, near Bhuptian Chowk،, Lahore, Punjab</p>
                </div>
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