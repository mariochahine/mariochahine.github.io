
<?php
include 'connection.php';

$model = $_GET['model'];
$trim = $_GET['trim'];

$query = "SELECT * FROM trims INNER JOIN models ON trims.model_id = models.id WHERE models.Model = '$model' AND trims.Trim='$trim'";
$ress = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($ress)) {
    echo '<div style="display:inline-flex;padding-top: 30px;" id=\"orderdiv\">';

    echo '<div style="padding-left: 75px; padding-right: 75px">';
    echo '<p style="text-decoration: underline;margin-bottom: 10px;">Horsepower &nbsp &nbsp &nbsp &nbsp</p>';
    echo '<p style="font-size: 16px;font-style:italic;padding-left: 50px;">' . $row['Horsepower'] . ' HP</p>';
    echo '</div>';

    echo '<div style="padding-left: 75px; padding-right: 75px">';
    echo '<p style="text-decoration: underline;margin-bottom: 10px;">Engine &nbsp &nbsp &nbsp &nbsp</p>';
    echo '<p style="font-size: 16px;font-style:italic;padding-left: 50px;">Mercedes ' . $row['Engine'] . '</p>';
    echo '</div>';

    echo '<div style="padding-left: 75px; padding-right: 75px">';
    echo '<p style="text-decoration: underline;margin-bottom: 10px;">Type &nbsp &nbsp &nbsp &nbsp</p>';
    echo '<p style="font-size: 16px;font-style:italic;padding-left: 50px;">' . $row['Type'] . '</p>';
    echo '</div>';

    echo '<div style="padding-left: 100px; padding-right: 100px">';
    echo '<button class="btn" onclick="PlaceOrder()">Place Order</button>';
    echo '</div>';

    echo '</div>';
}

?>