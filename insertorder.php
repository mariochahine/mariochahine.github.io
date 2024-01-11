<?php
include 'connection.php';

session_start();
$email = $_SESSION['email'];

$model = $_GET['model'];
$trim = $_GET['trim'];

$query = "SELECT * FROM members WHERE Email='$email'";
$ress = mysqli_query($conn, $query);

echo "$query";
echo "</br>";

while ($row = mysqli_fetch_assoc($ress)) {
    $id = $row['id'];
}

$query2 = "SELECT * FROM models WHERE Model='$model'";
$ress2 = mysqli_query($conn, $query2);

echo "$query2";
echo "</br>";

while ($row2 = mysqli_fetch_assoc($ress2)) {
    $modelid = $row2['id'];
}

$query3 = "SELECT * FROM trims WHERE Trim='$trim'";
$ress3 = mysqli_query($conn, $query3);

while ($row3 = mysqli_fetch_assoc($ress3)) {
    $trimid = $row3['id'];
}

echo "$query3";
echo "</br>";

$date = date('Y/m/d');

$Query = "INSERT INTO orders VALUES ('','$id','$model','$trimid','$date',0)";
$Result = mysqli_query($conn, $Query);

echo "$Query";
?>
