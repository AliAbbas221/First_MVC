<?php
$host = "localhost";
$dbname = "mvc";
$username = "root";
$password = "";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    // set the PDO error mode to exception
    
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }