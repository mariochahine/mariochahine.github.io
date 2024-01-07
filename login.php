<?php
include 'connection.php';

if (
    isset($_POST['email']) && !empty($_POST['email'])
    && isset($_POST['password']) && !empty($_POST['password'])
) {
    $Email = $_POST['email'];
    $pass = $_POST['password'];

    $query = "SELECT * FROM members 
            WHERE Email = '$Email' AND Password = '$pass'";

    $res = mysqli_query($conn, $query);
    $nbrows = mysqli_num_rows($res);

    $nquery = "SELECT Name FROM members 
            WHERE Email = '$Email' AND Password = '$pass'";
    $result = mysqli_query($conn, $nquery);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            $Name = $row['Name'];
        } else {
            $Name = "No Name Found";
        }
    }

    if ($nbrows == 0) {
        header("Location:login.html");
    } else {
        session_start();
        $_SESSION['isLoggedIn'] = 1;

        $_SESSION['email'] = $Email;

        $_SESSION['Name'] = $Name;

        header("Location:home.php");
    }
} else {
    header("Location:login.html");
}
