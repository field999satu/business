<?php
require 'db.php';

$sql = 'SELECT customer.*, country.CountryName 
            FROM customer 
            INNER JOIN country ON customer.CountryCode = country.CountryCode';

$stmt = $conn->prepare($sql);
$stmt->execute();
echo '<br/>';

// ดึงข้อมูลออกมาเป็น Array แบบระบุชื่อ Column
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $r) {
    print $r['CustomerID'] . '--' . $r['Name'] . '--' . $r['OutstandingDebt'] . '--'
        . $r['CountryCode'] . '--' . $r['CountryName'] . '<br>';
}
