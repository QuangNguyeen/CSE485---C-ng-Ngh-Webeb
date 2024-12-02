<!-- views/products/add.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
<h1>Add New Product</h1>
<form action="/product/add" method="POST" enctype="multipart/form-data">
    <label for="name">Product Name:</label><br>
    <input type="text" id="name" name="name" required><br><br>

    <label for="price">Price:</label><br>
    <input type="number" id="price" name="price" required><br><br>

    <label for="description">Description:</label><br>
    <textarea id="description" name="description" required></textarea><br><br>

    <label for="image">Image:</label><br>
    <input type="file" id="image" name="image" required><br><br>

    <button type="submit">Add Product</button>
</form>
</body>
</html>
