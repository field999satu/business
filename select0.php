<?php
require "db.php";
// ลองให้โชว์ข้อมูล customer
$sql = "SELECT * FROM customer";
$stmt = $conn->prepare($sql);
$stmt->execute();

$result = $stmt->fetchAll();
print_r($result);
