<?php
$flowers = [];
if (file_exists('flowers.json')) {
    $jsonData = file_get_contents('flowers.json');
    $flowers = json_decode($jsonData, true);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $targetDir = 'images/';
        $targetFile = $targetDir . basename($_FILES['image']['name']);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                $image = $targetFile;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "Only image files are allowed (jpg, jpeg, png, gif).";
        }
    }
    if ($name && $description && $image) {
        $lastId = 0;
        if (!empty($flowers)) {
            $lastFlower = end($flowers);
            $lastId = intval($lastFlower['id']);
        }
        $newId = $lastId + 1;

        $newFlowers = [
            'id' => $newId,
            'image' => $image,
            'name' => $name,
            'description' => $description
        ];
        $flowers[] = $newFlowers;
    }
    file_put_contents('flowers.json', json_encode($flowers, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    header("Location: admin.php");
    exit();
}
