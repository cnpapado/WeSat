<!-- hit url unlock_satellite.php?satellite_id=1102&user_id=cosmogo -->
<?php 
$servername = "localhost";
$username = "gnkl";
$password = "gnkl";
$dbname = "NASA";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// get parameters from URL
$user_id = $_REQUEST["user_id"];

// INSERT IGNORE = if id exists it doesn't raise error
$sql = "SELECT * FROM (SELECT * FROM has_unlocked WHERE `user_id`="  . $user_id . ") as hu INNER JOIN satellites as sat ON hu.satellite_id=sat.satellite_id";
// echo "" . $sql . + "<br>";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "Here are the results:<br>";
    while($row = $result->fetch_assoc()) {
      echo "satellite_id: " . $row["satellite_id"]. " - satellite_name: " . $row["name"]. "<br>";
    }
  } else {
    echo "0 results<br>";
  }

$conn->close();
?>

<!-- SELECT * FROM has_unlocked INNER JOIN satellites ON has_unlocked.satellite_id=satellites.satellite_id;
SELECT * FROM ((SELECT * FROM has_unlocked WHERE `user_id`=1) as hu INNER JOIN satellites as sat ON hu.satellite_id=sat.satellite_id) as hus INNER JOIN users ON hus.user_id=users.user_id;
SELECT * FROM (SELECT * FROM has_unlocked WHERE `user_id`=1) as hu INNER JOIN satellites as sat ON hu.satellite_id=sat.satellite_id;
INNER JOIN Customers ON Orders.CustomerID=Customers.CustomerID; -->
