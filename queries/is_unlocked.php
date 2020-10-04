<!-- hit url unlock_satellite.php?satellite_id=1102&user_id=cosmogo -->
<?php 
$servername = "localhost";
$username = "root";
$password = "mypassword";
$dbname = "NASA";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// get parameters from URL
$satellite_id = $_REQUEST["satellite_id"];
$user_id = $_REQUEST["user_id"];

// INSERT IGNORE = if id exists it doesn't raise error
$sql = "SELECT COUNT(*) as count FROM has_unlocked WHERE `user_id`=" . $user_id ." AND `satellite_id`=" . $satellite_id . "";
$result = $conn->query($sql);

// print section
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row["count"] == 0){
        echo "NO, couple does not exist";
    } else {
        echo "YES, couple does exist";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
