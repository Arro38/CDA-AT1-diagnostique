<?php
include("db.php");

if(isset($_GET["id"])){
    $id=$_GET["id"];
    $sql = "DELETE FROM task WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header('Location: '.'/');
      } else {
        echo "Error deleting record: " . $conn->error;
      }
}