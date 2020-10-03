<?php
include('connection.php');

$sql = "SELECT * FROM `Satelights` ";
$result = mysqli_query($conn, $sql);
$satelights = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result(($result));
mysqli_close(($conn));

?>

<!DOCTYPE html>
<html>

<?php include('header.php'); ?>

<script>
    function VisitedSatelights() {
        var satelights = [];
        <?php foreach ($satelights as $satelight) { ?>
            satelights.push('<?php echo $satelight['Name'] ?>');
        <?php } ?>
        return satelights;
    }

    var satelights = VisitedSatelights();

    for (var i = 0; i < satelights.length; i++) {
        console.log(satelights[i]);
    }
</script>

<table>
    <tr>
        <th>Satelight Id </th>
        <th>Name </th>
    </tr>
    <?php foreach ($satelights as $satelight) { ?>
        <tr>
            <th><?php echo $satelight['Satelight_id'] ?> </th>
            <th><?php echo $satelight['Name'] ?> </th>
        </tr>
    <?php } ?>

</table>

<?php include('footer.php'); ?>

</html>
