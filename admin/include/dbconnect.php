<!-- db connection using ip address-->
<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "beegle";

// Create Connection
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//echo "Connected successfully";
?>