<?php
if (
    isset($_POST['Name']) && !empty($_POST['Name'])
    && isset($_POST['phone']) && !empty($_POST['phone'])
    && isset($_POST['password']) && !empty($_POST['password'])
    && isset($_POST['email']) && !empty($_POST['email'])
    && isset($_POST['Address']) && !empty($_POST['Address'])
    && isset($_POST['credit']) && !empty($_POST['credit'])
    && isset($_POST['code']) && !empty($_POST['code'])
) {
    include 'connection.php';

    $name = $_POST['Name'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $Address = $_POST['Address'];
    $credit = $_POST['credit'];
    $code = $_POST['code'];

    $query = "SELECT * FROM members WHERE Email = '$email'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) != 0) {
        echo 'Email alreday exists!';
    } else {
        $query = "INSERT INTO members VALUES(NULL, '$name','$phone','$email','$password','$Address','$credit','$code')";
        $result2 = mysqli_query($conn, $query);
        header("Location:login.html");
    }

}
?>