<?php
require 'config.php';

if (isset($_POST['submit'])) {
    $person = $_POST['person'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $cnic = $_POST['cnic'];
    $number = $_POST['number'];
    $password = $_POST['password'];

    if ($person == 'User') {
        $duplicateUser = mysqli_query($con, "SELECT * FROM `user` WHERE email = '$email'");
        if (mysqli_num_rows($duplicateUser) > 0) {
            echo
                "<script>alert('username or email has already taken')</script>";
        } else {
            $queryUSer = "INSERT INTO `user`(`email`, `name`, `cnic`, `phone`, `password`) 
            VALUES ('$email','$name','$cnic','$number','$password')";
            mysqli_query($con, $queryUSer);
            echo '<script type="text/JavaScript"> 
            alert("User Registration Successful");
            </script>';
        }
    }

    if ($person == 'Driver') {
        $duplicateDriver = mysqli_query($con, "SELECT * FROM `driver` WHERE email = '$email'");
        if (mysqli_num_rows($duplicateDriver) > 0) {
            echo
                "<script>alert('username or email has already taken')</script>";
        } else {
            $queryDriver = mysqli_query($con, "INSERT INTO `driver`(`email`, `name`, `cnic`, `phone`, `password`) 
            VALUES ('$email','$name','$cnic','$number','$password')");
            // mysqli_query($con, $queryDriver);
            echo '<script type="text/JavaScript"> 
            alert("Driver Registration Successful");
            </script>';
        }
    }

    header("Location: login.php");
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="signup.css">
    <title>Sign Up - DriverBooker</title>
</head>

<body>
    <nav class="navbar navbar-dark  color">
        <span class="navbar-brand mb-0 h1 text-center w-100 font-weight-bold font">DriverBooker</span>
    </nav>


    <div class="container1">
        <div class="side-container">
            <h1>All Your Driver Solutions at <b>ONE</b> place.</h1>
        </div>
        <div class="container main-container ">

            <form action="signup.php" method="post">
                <div class="choice">
                    <!-- <input type="button" class="btn hb1 " id="person" name="person" value="Driver">
                    <input type="button" class="btn hb2 " id="person" name="person" value="User"> -->
                    <select name="person" id="person">
                        <option value="User">User</option>
                        <option value="Driver">Driver</option>
                    </select>
                </div>
                <div class="form-group " style="text-align:left;">
                    <label>Email address</label>
                    <input type="email" class="form-control border-dark" id="email" name="email"
                        aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                        else.</small>

                    <label for="name">Name</label>
                    <input type="text" class="form-control border-dark" id="name" name="name" aria-describedby="name">
                    <label for="cnic">CNIC</label>
                    <input type="text" class="form-control border-dark" id="name" name="cnic" aria-describedby="name">
                    <label for="">Phone Number</label>
                    <input type="text" class="form-control border-dark" id="number" name="number"
                        aria-describedby="number">

                    <div class="form-group" style="text-align:left;">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control border-dark" id="password">
                    </div>
                    <button type="submit" class="btn dbtn" name="submit">SignUp</button>
                </div>
            </form>
        </div>
    </div>


    <div class="footer">
        <div class="container text-center">
            <h5>A Website made for educational purposes</h5>
            <p>All rights reserved &copy;<br />
                Talha bin Zubair <br>
            talhazubair.info@gmail.com</p>
        </div>
    </div>






    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('.hb2').click(function () {
                $('.hb1').removeClass('active');
                $('.hb2').addClass('active');
            })
            $('.hb1').click(function () {
                $('.hb2').removeClass('active');
                $('.hb1').addClass('active');
            })
        })
    </script>
</body>

</html>
