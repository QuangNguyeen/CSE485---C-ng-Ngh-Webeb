<?php
$filename = "KTPM2.csv";
$students = [];

if (file_exists($filename)) {
    if (($handle = fopen($filename, "r")) !== FALSE) {
        $headers = fgetcsv($handle, 1000, ",");
        if ($headers) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if (count($headers) === count($data)) {
                    $students[] = array_combine($headers, $data);
                } else {
                    error_log("Dòng dữ liệu không hợp lệ: " . implode(",", $data));
                }
            }
        } else {
            echo "Lỗi: Tệp CSV không có tiêu đề.";
        }
        fclose($handle);
    } else {
        echo "Lỗi: Không thể mở tệp CSV.";
    }
} else {
    echo "Lỗi: Tệp CSV không tồn tại.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Danh sách sinh viên</h1>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
        <tr>
            <th>Username</th>
            <th>Password</th>
            <th>Họ</th>
            <th>Tên</th>
            <th>Thành phố</th>
            <th>Email</th>
            <th>Khóa học</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (!empty($students)) {
            foreach ($students as $student) {
                echo "<tr>";
                echo "<td>{$student['username']}</td>";
                echo "<td>{$student['password']}</td>";
                echo "<td>{$student['lastname']}</td>";
                echo "<td>{$student['firstname']}</td>";
                echo "<td>{$student['city']}</td>";
                echo "<td>{$student['email']}</td>";
                echo "<td>{$student['course1']}</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7' class='text-center'>Không có dữ liệu để hiển thị</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

