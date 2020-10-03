<!DOCTYPE html>
<html>

<?php include('header.php'); 

if (isset($_GET['submit'])) {
    include('connection.php');
    $sql = "SELECT * FROM `Satelights` WHERE Name='" . $_GET['name'] . "';";

    $result = mysqli_query($conn, $sql);
    $visited = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result(($result));
    mysqli_close(($conn));

    if (count($visited) == 1) echo "Visited";
    else echo "not Visited";
} ?>

<?php if (!isset($_GET['submit'])) { ?>
    <section class="container grey-text">
        <h4 class="center">Name Of Satelight</h4>
        <form class="white" method="GET" action="searchByName.php">
            <label>Stelight Name</label>
            <input type="text" name="name" required="required">
            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand">
            </div>
        </form>
    </section>
<?php } ?>

<?php include('footer.php'); ?>

</html>
