<!-- views/products/delete.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product</title>
</head>
<body>
<h1>Are you sure you want to delete this product?</h1>
<p>Product Name: <?php echo $product['name']; ?></p>
<form action="/product/delete/<?php echo $product['id']; ?>" method="POST">
    <button type="submit">Yes, delete it</button>
    <a href="/">Cancel</a>
</form>
</body>
</html>
