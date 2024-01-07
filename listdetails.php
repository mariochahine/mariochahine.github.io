

<?php
include 'connection.php';

session_start();
$email = $_SESSION['email'];

$query = "SELECT * FROM members WHERE Email = '$email'";
$result = mysqli_query($conn, $query);

echo "<table border='2' width='75%' style='text-align: center;background-color: rgba(113, 113, 113, 0.35);'>";
echo "<tr>";
echo "<th>Name</th>";
echo "<th>Email</th>";
echo "<th>Password</th>";
echo "<th>Phone Number</th>";
echo "<th>Shipping Address</th>";
echo "<th>Billing Info</th>";
echo "<th>Code</th>";
echo "</tr>";

while ($row = mysqli_fetch_assoc($result)) {
    $trimmedBillingInfo = substr($row['BillingInfo'], 0, -8);


    echo "<tr>";
    echo "<td>" . $row['Name'] . "</td>";
    echo "<td>" . $row['Email'] . "</td>";
    echo "<td>***********</td>";
    echo "<td>" . $row['Phone_Number'] . "</td>";
    echo "<td>" . $row['Address'] . "</td>";
    echo "<td>" . $trimmedBillingInfo . "********</td>";
    echo "<td>***</td>";
    echo "</tr>";
}
echo "</table>";
echo "</br>";
echo "<button class='btn' onclick='Edit()'>Edit</button>";
