<?php
if (empty($_SESSION['id'])) {
    header("Location: logout.php");
}
if (!empty($_SESSION['Did'])) {
    header("Location: index.php");
}
$Did = $_GET['Did'];
$queryDriver = mysqli_query($con, "SELECT * FROM `driver` WHERE `DriverId`='$Did'");
if (!$queryDriver){
    echo "error in driver query";
}
$userid = $_SESSION['id'];
$queryUser = mysqli_query($con, "SELECT * FROM `user` WHERE `id`='$userid'");
if (!$queryUser){
    echo "error in user query";
}
$userRow = $queryUser->fetch_assoc();
$userName = $userRow['name'];

if (mysqli_num_rows($queryDriver) > 0) {
    $row = $queryDriver->fetch_assoc();
    $n = $row['name'];
    $id = $row['DriverId'];
    $rate = $row['rate'];
}
if (isset($_POST['submit'])){
    $hours = $_POST['hours'];
    $totalAmount = $_POST['total'];
    $fetchedId = $_POST['id'];

    $bookingQuery = mysqli_query($con, "INSERT INTO `booking`(`hours`, `total-amount`, `DriverId`, `userId`) 
    VALUES ('$hours','$totalAmount','$fetchedId','$userid')");
    if ($bookingQuery == true){
        echo "<script>
        alert('Your booking is confirmed!');
        </script>";
        header("Location: index.php");
    }
    
}


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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="Booking.css">
    <title>DriverBooker - Booking</title>
</head>

<body>
    <?php include('navbar.php'); ?>
    <div class="container">
        <h3>Book <b class="bold-red">Driver</b></h3>

        <form action="Booking.php" method="post">
            <table border="1">
                <tr>
                    <th id="c1">DriverId</th>
                    <th>Name</th>
                    <th>Rate in $</th>
                    <th>Hours</th>
                    <th id="c5">Total Amount</th>
                </tr>
                <tr>

                    <td><input class="inputedit" type="text" name="id" value="<?php echo $id; ?>"readonly="readonly"></td>
                    <td>
                        <?php echo $n; ?>
                    </td>
                    <td id="rate">
                        <?php echo $rate; ?>
                    </td>
                    <td><input class="hours" onchange="calculateTotal()" type="number" name="hours" id="hours"
                            placeholder="Hours"></td>
                    <td ><input class="inputedit" type="text" name="total" id="total" readonly="readonly"></td>

                </tr>
            </table>
            <div class="container right">
                <button type="submit" name="submit" class="btn btn1">Finalize Booking</button>
            </div>
        </form>
    </div>
    <hr>
    <?php include('footer.php');?>


    <script>
        function calculateTotal() {
            hours = document.getElementById('hours').value;
            rate = document.getElementById('rate').innerText;
            console.log("Hours * Rate: " + hours * rate);
            Total = hours * rate;
            document.getElementById('total').value = Total;
        }
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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
