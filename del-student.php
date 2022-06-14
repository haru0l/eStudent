<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "estudent";
$conn = new mysqli($servername, $username, $password, $dbname);
$tableID = $_GET['tableID'];

$sql = "DELETE FROM student WHERE tableID = $tableID";

if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
if (!$conn->query($sql)) {
  echo("Error description: " . $mysqli -> error);
}
else {
    echo '<script>alert("Success")</script>';
    header("location:javascript://history.go(-2)");
die();
}
?>