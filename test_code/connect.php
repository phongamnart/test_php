<?php
$host = "localhost";
$user = "root";
$pass = "";

try {
  $conn = new PDO("mysql:host=$host;dbname=test_code;charset=utf8", $user, $pass);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
    date_default_timezone_set('Asia/Bangkok');
?>