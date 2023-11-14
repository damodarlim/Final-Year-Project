<?php
$hostname = "http://localhost/todu";
$usrnme = "root";
$pswrd = "";
$dbname = "todu";
$conn = new mysqli("localhost", $usrnme, $pswrd, $dbname);
// Check connection

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>



<!-- $hostname = "localhost";
$username = "root";
$password = "";
$databasename = "todu";
$conn = new mysqli($hostname, $username, $password, $databasename);
// Check connection

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} -->


