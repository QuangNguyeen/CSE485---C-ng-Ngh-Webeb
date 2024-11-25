<?php
$target_dir = "uploads/";
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true); // Tạo thư mục nếu chưa tồn tại
}

if (isset($_POST["submit"])) {
    $totalFiles = count($_FILES["filesToUpload"]["name"]);
    $uploadedFiles = [];
    $errors = [];

    for ($i = 0; $i < $totalFiles; $i++) {
        $target_file = $target_dir . basename($_FILES["filesToUpload"]["name"][$i]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Kiểm tra xem file có phải ảnh không
        $check = getimagesize($_FILES["filesToUpload"]["tmp_name"][$i]);
        if ($check === false) {
            $errors[] = "File " . $_FILES["filesToUpload"]["name"][$i] . " is not an image.";
            $uploadOk = 0;
        }

        // Kiểm tra kích thước tệp
        if ($_FILES["filesToUpload"]["size"][$i] > 500000) {
            $errors[] = "File " . $_FILES["filesToUpload"]["name"][$i] . " is too large.";
            $uploadOk = 0;
        }

        // Kiểm tra định dạng tệp
        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            $errors[] = "File " . $_FILES["filesToUpload"]["name"][$i] . " has an invalid format.";
            $uploadOk = 0;
        }

        // Upload tệp nếu không có lỗi
        if ($uploadOk == 1) {
            $unique_name = uniqid() . "." . $imageFileType;
            $final_path = $target_dir . $unique_name;

            if (move_uploaded_file($_FILES["filesToUpload"]["tmp_name"][$i], $final_path)) {
                $uploadedFiles[] = $final_path; // Lưu đường dẫn tệp đã upload thành công
            } else {
                $errors[] = "File " . $_FILES["filesToUpload"]["name"][$i] . " could not be uploaded.";
            }
        }
    }

    // Hiển thị kết quả
    if (!empty($uploadedFiles)) {
        echo "<h3>Uploaded Images:</h3>";
        foreach ($uploadedFiles as $file) {
            echo "<img src='" . $file . "' alt='Uploaded Image' style='max-width: 200px; height: auto; margin: 10px;'><br>";
        }
    }

    if (!empty($errors)) {
        echo "<h3>Errors:</h3>";
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>
