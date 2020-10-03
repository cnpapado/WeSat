<!DOCTYPE html>
<html>

<?php include('header.php');

if (isset($_GET['submit'])) {
    include('connection.php');

    $sql = "INSERT INTO `Satelights`(`Name`) VALUES ('" . $_GET['name'] . "')";

    $result = mysqli_query($conn, $sql);

    if($result) 
        echo " added succesfully";
    mysqli_close(($conn));
} ?>

<?php if (!isset($_GET['submit'])) { ?>
    <section class="container grey-text">
        <h4 class="center">Name Of Satelight</h4>
        <form class="white" method="GET" action="addSatelight.php">
            <label>New Stelight Name</label>
            <input type="text" name="name" required="required">
            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand">
            </div>
        </form>
    </section>
<?php } ?>

<?php include('footer.php'); ?>

</html>
