<html>

<head>
    <title>Show Customer Information</title>
</head>

<body>
    <?php
    try {
        require 'db.php';
        $sql = 'SELECT customer.*, country.CountryName 
                FROM customer 
                INNER JOIN country ON customer.CountryCode = country.CountryCode';
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<br>' .
                'รหัสลูกค้า : ' . $result['CustomerID'] . ' วันเกิด : ' . $result['Birthdate'] .
                ' ยอดหนี้ : ' . $result['OutstandingDebt'];
        }
    } catch (PDOException $e) {
        echo 'ไม่สามารถประมวลผลข้อมูลได้ : ' . $e->getMessage();
    }

    $conn = null;
    ?>

</body>

</html>