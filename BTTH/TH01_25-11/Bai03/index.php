<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiển Thị Tệp CSV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Danh sách tài khoản</h1>
    <table class="table table-bordered table-hover table-striped">
        <thead class="table-dark">
        <tr>
            <th>Username</th>
            <th>Password</th>
            <th>Lastname</th>
            <th>Firstname</th>
            <th>City</th>
            <th>Email</th>
            <th>Course</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Đường dẫn tới file CSV
        $file = 'KTPM2.csv';

        // Kiểm tra file có tồn tại
        if (file_exists($file)) {
            // Mở file
            $handle = fopen($file, 'r');

            // Bỏ qua dòng tiêu đề đầu tiên
            $header = fgetcsv($handle);

            // Đọc từng dòng và hiển thị
            while (($row = fgetcsv($handle)) !== false) {
                echo '<tr>';
                foreach ($row as $cell) {
                    // Kiểm tra nếu giá trị là null, thay thế bằng chuỗi rỗng
                    echo '<td>' . htmlspecialchars(isset($cell) ? $cell : '') . '</td>';
                }
                echo '</tr>';
            }

            // Đóng file
            fclose($handle);
        } else {
            echo '<tr><td colspan="7" class="text-center">Không tìm thấy file CSV.</td></tr>';
        }
        ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
