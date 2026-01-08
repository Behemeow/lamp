<?php
$conn = new mysqli("db", "student", "student123", "university");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// คำสั่ง SQL Join ตาราง students และ majors
$sql = "SELECT s.student_id, s.full_name, m.major_name
        FROM students s
        LEFT JOIN majors m ON s.major_id = m.major_id";

$result = $conn->query($sql);

// แสดงผล
echo "<h2>รายชื่อนักศึกษา</h2>";

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='5'>";
    echo "<tr>
            <th>รหัสนักศึกษา</th>
            <th>ชื่อ - สกุล</th>
            <th>สาขาวิชา</th>
          </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['student_id']}</td>
                <td>{$row['full_name']}</td>
                <td>{$row['major_name']}</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "ไม่พบข้อมูล";
}

$conn->close();
?>
