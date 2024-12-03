<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Sách</title>
</head>
<body>
    <h1>Sửa Sách</h1>
    <form method="POST" action="../../controllers/index.php?action=edit&id=<?= htmlspecialchars($book['BookID']) ?>">
    <label for="title">Tiêu đề:</label>
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($book['Title']) ?>" required>
        <br>
        <label for="published_year">Năm xuất bản:</label>
        <input type="number" id="published_year" name="published_year" value="<?= htmlspecialchars($book['PublishedYear']) ?>" required>
        <br>
        <label for="genre">Thể loại:</label>
        <input type="text" id="genre" name="genre" value="<?= htmlspecialchars($book['Genre']) ?>" required>
        <br>
        <button type="submit">Cập nhật</button>
        <a href="index.php">Trở lại</a>
    </form>
</body>
</html>
