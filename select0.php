<?php
require "db.php";

// ดึงข้อมูล customer
$sql = "SELECT * FROM customer";
$stmt = $conn->prepare($sql);
$stmt->execute();
?>

<table width="800" border="1">
    <tr>
        <th width="90">
            <div align="center">รหัสผู้ใช้ </div>
        </th>
        <th width="140">
            <div align="center">ชื่อ </div>
        </th>
        <th width="120">
            <div align="center">วันเกิด </div>
        </th>
        <th width="100">
            <div align="center">อีเมล์ </div>
        </th>
        <th width="50">
            <div align="center">ประเทศ </div>
        </th>
        <th width="70">
            <div align="center">ยอดหนี้</div>
        </th>
    </tr>

    <?php
    // เติม $stmt ลงในช่องว่าง เพื่อดึงข้อมูลทีละแถว (Row)
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>

        <tr>
            <td>
                <div align="center"><?php echo $result["CustomerID"]; ?></div>
            </td>

            <td>
                <!-- เติมชื่อ -->
                <?php echo $result["Name"]; ?>
            </td>

            <td>
                <!-- เติมวันเกิด -->
                <div align="center"><?php echo $result["Birthdate"]; ?></div>
            </td>

            <td>
                <!-- เติมการแสดงผลอีเมล์ -->
                <?php echo $result["Email"]; ?>
            </td>

            <td>
                <!-- เติมประเทศ -->
                <div align="center"><?php echo $result["CountryCode"]; ?></div>
            </td>

            <td>
                <div align="right"><?php echo $result["OutstandingDebt"]; ?></div>
            </td>
        </tr>

    <?php
    }
    ?>

</table>