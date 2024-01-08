

<?php
include 'connection.php';

$model = $_GET['model'];

$query = "SELECT * FROM trims INNER JOIN models ON trims.model_id = models.id WHERE models.Model = '$model'";
$ress = mysqli_query($conn, $query);

echo "<div style=\"display:inline-flex;padding-top: 30px;\" id=\"trimdiv\">";

echo "<div style=\"padding-top: 30px;padding-left: 100px;\">";
echo "<p id=\"label\"><b>Select The Desired Trim</b></p>";
echo "<div id=\"modelSelect\">";
echo "<select id=\"Select\" onchange=\"order()\" style=\"height: 30px\">";
echo "<option value=0>Select Trim</option>";

while ($row = mysqli_fetch_assoc($ress)) {
    echo "<option value=" . $row['Trim'] . ">" . $row['Trim'] . "</option>";
}
echo "</select>";
echo "</div>";
echo "</div>";

echo "<div >";
echo "<img src=\"Gallery/Models/$model.png\" style=\"padding-left: 100px;\" width=\"300px\">";
echo "</div>";

echo "</div>";
?>