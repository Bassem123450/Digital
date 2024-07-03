<?php
// Create connection
$conn = new mysqli('localhost','root','','digital');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
}
echo "";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"