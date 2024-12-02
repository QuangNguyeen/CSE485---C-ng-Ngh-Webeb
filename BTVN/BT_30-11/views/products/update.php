<!-- views/products/update.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
</head>
<body>
<h1>Update Product</h1>
<form action="/product/update/<?php echo $product['id']; ?>" method="POST" enctype="multipart/form-data">
    <label for="name">Product Name:</label><br>
    <input type="text" id="name" name="name" value="<?php echo $product['name']; ?>" required><br><br>

    <label for="price">Price:</label><br>
    <input type="number" id="price" name="price" value="<?php echo $product['price']; ?>" required><br><br>

    <label for="description">Description:</label><br>
    <textarea id="description" name="description" required><?php echo $product['description']; ?></textarea><br><br>

    <label for="image">Image:</label><br>
    <input type="file" id="image" name="image"><br><br>

    <button type="submit">Update Product</button>
</form>
</body>
</html>
