

<?php
include 'connection.php';

session_start();
$email = $_SESSION['email'];

$query = "SELECT * FROM members WHERE Email = '$email'";
$ress = mysqli_query($conn, $query);



while ($row = mysqli_fetch_assoc($ress)) {

    echo "<div style=\"font-size: 18px; font-family: 'Times New Roman', Times, serif; color:white; display:inline-flex;\">";

    echo "<div style=\"padding-left: 40px; padding-right: 50px;\">";
    echo "<input type=\"text\" name=\"Name\" class=\"input\" placeholder=\"Name\" value=\"" . $row['Name'] . "\">";
    echo "</div>";

    echo "<div style=\"padding-left: 50px; padding-right: 50px;\">";
    echo "<input type=\"email\" name=\"Email\" class=\"input\" placeholder=\"Email\" id=\"long\" value=\"" . $row['Email'] . "\">";
    echo "</div>";

    echo "<div style=\"padding-left: 50px; padding-right: 40px;\">";
    echo "<input type=\"password\" name=\"Pass\" class=\"input\" placeholder=\"Password\" value=\"" . $row['Password'] . "\">";
    echo "</div>";
    echo "</div>";

    echo "<br>";

    echo "<div style=\"font-size: 18px; font-family: 'Times New Roman', Times, serif; color:white; padding-top: 30px; display:inline-flex;\">";

    echo "<div style=\"padding-left: 50px; padding-right: 60px;\">";
    echo "<input type=\"number\" name=\"CardNumb\" class=\"input\" placeholder=\"Billing Info\" id=\"long\" value=\"" . $row['BillingInfo'] . "\">";
    echo "</div>";

    echo "<div style=\"padding-left: 60px; padding-right: 50px;\">";
    echo "<input type=\"text\" name=\"address\" class=\"input\" placeholder=\"Shipping Address\" id=\"long\" value=\"" . $row['Address'] . "\">";
    echo "</div>";
    echo "</div>";

    echo "<br>";

    echo "<div style=\"font-size: 18px; font-family: 'Times New Roman', Times, serif; color:white; padding-top: 30px; display:inline-flex;\">";
    echo "<div style=\"padding-left: 50px; padding-right: 125px;\">";
    echo "<input type=\"number\" name=\"Phone\" class=\"input\" placeholder=\"Phone Number\" value=\"" . $row['Phone_Number'] . "\">";
    echo "</div>";

    echo "<div style=\"padding-left: 125px; padding-right: 50px;\">";
    echo "<input type=\"password\" name=\"Code\" class=\"input\" placeholder=\"Code\" value=\"" . $row['code'] . "\">";
    echo "</div>";
    echo "</div>";


    echo "<div style=\"padding-top: 30px;padding-bottom: 40px\">";
    echo "<button class='btn' onclick='Update()'>Update</button>";
    echo "</div>";
}

?>
