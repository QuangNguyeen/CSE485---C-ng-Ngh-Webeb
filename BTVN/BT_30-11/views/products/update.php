<?php
    require '../../models/Product.php';
    $productModel = new Product();
    $id = $_GET['id'] ?? null;
    if ($id) {
        $product = $productModel->getByID($id);
    } else {
        echo "Product ID is missing.";
    }
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    if ($image) {
        $imagePath = '../../image/' . time() . '-' . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], '../../image/' . $imagePath);
    } else {
        $product = $productModel->getByID($id);
        $imagePath = $product['IMAGE'];
    }
    $updateSuccess = $productModel->updateProduct($id, $name, $price, $description, $imagePath);

    if ($updateSuccess) {
        echo "Product updated successfully!";
        header("Location: index.php");
        exit;
    } else {
        echo "Error updating product!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CellphoneS</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
<div id="updateProductModal" >
    <div>
        <div class="modal-content">
            <form action="index.php?action=edit&id=<?= $product['ID']; ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Update Product</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars(isset($product['ID']) ? $product['ID'] : ''); ?>">

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name"
                               value="<?php echo htmlspecialchars(isset($product['NAME']) ? $product['NAME'] : ''); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" name="price"
                               value="<?php echo htmlspecialchars(isset($product['PRICE']) ? $product['PRICE'] : ''); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" required><?php echo htmlspecialchars(isset($product['DESCRIPTION']) ? $product['DESCRIPTION'] : ''); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input class="form-control" type="file" name="image">
                        <small class="form-text text-muted">Leave blank if you don't want to change the image.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>