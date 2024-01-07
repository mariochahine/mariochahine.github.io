

<?php
include 'connection.php';

session_start();
$oldemail = $_SESSION['email'];

$name = $_GET['name'];
$email = $_GET['email'];
$pass = $_GET['pass'];
$phone = $_GET['phone'];
$card = $_GET['card'];
$code = $_GET['code'];
$address = $_GET['address'];

$query = "UPDATE members SET (Name = '$name',Phone_Number = '$phone', Email = '$email',Password = '$pass',Address = '$address',BillingInfo = '$card',code = '$code')  WHERE Email = '$oldemail'";
$ress = mysqli_query($conn, $query);
