<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'barang_pkl';

try {
 $conn = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
 $conn ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo "Connection Failed:". $e->getMessage();
}
?>