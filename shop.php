

<?php
include 'connection.php';



$query = "SELECT * FROM models";
$Result = mysqli_query($conn, $query);

echo "<p id=\"label\">Select The Desired Model</p>";
echo "<div id=\"modelselect\">";
echo "<select id=\"select\" onchange=\"selectTrim()\" style=\"height: 30px\">";
echo "<option value=0>Select Model</option>";

while ($row = mysqli_fetch_assoc($Result)) {
    echo "<option value=" . $row['Model'] . ">" . $row['Model'] . "</option>";
}
echo "</select>";
echo "</div>";

?>
