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
$sql = "INSERT IGNORE INTO has_unlocked (`user_id`, `satellite_id`) VALUES ('" . $user_id . "', '" . $satellite_id . "')";

// print section
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<!-- 
  way to call from javascript:
  xmlhttp.open("GET", "insert_satellite.php?satellite_id=" + satid + "&name=" + satname, true);
  xmlhttp.send(); 
-->