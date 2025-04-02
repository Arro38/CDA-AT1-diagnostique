<?php
$servername = "localhost";
$username = "root";
$password = "root"; // Pas de mot de passe sous wamp par defaut
$dbname = "cda_task_manager";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>