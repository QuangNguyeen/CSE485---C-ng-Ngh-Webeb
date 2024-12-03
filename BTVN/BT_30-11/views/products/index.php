<?php
    require '../../models/Product.php';
    $productModel = new Product();
    $products = $productModel->getAll();
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
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2><b>List Product</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addProductModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Product</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                <tr class="modal-title">
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($product['ID']); ?></td>
                            <td><img src="<?php echo htmlspecialchars($product['IMAGE']); ?>" alt="Product Image" width="110" height="110"></td>
                            <td><?php echo htmlspecialchars($product['NAME']); ?></td>
                            <td><?php echo htmlspecialchars($product['PRICE']); ?></td>
                            <td><?php echo htmlspecialchars($product['DESCRIPTION']);?></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-info btn-sm edit-btn" data-toggle="modal" data-target="#updateProductModal"
                                            data-id="<?php echo $product['ID']; ?>"
                                            data-name="<?php echo htmlspecialchars($product['NAME']); ?>"
                                            data-price="<?php echo htmlspecialchars($product['PRICE']); ?>"
                                            data-description="<?php echo htmlspecialchars($product['DESCRIPTION']); ?>"
                                            data-image="<?php echo htmlspecialchars($product['IMAGE']); ?>">
                                        <i class="material-icons">edit</i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteProductModal"
                                            data-id="<?php echo $product['ID']; ?>">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="6">No products found.</td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="updateProductModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="updateProduct.php" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- Input hidden để truyền ID sản phẩm -->
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars(isset($product['id']) ? $product['id'] : ''); ?>">

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name"
                               value="<?php echo htmlspecialchars(isset($product['name']) ? $product['name'] : ''); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" name="price"
                               value="<?php echo htmlspecialchars(isset($product['price']) ? $product['price'] : ''); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" required><?php echo htmlspecialchars(isset($product['description']) ? $product['description'] : ''); ?></textarea>
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
<div id="addProductModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="addProduct.php" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Add Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" name="price" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>File</label>
                        <input class="form-control" type="file" name="image" id="formFile" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Delete Product -->
<div id="deleteProductModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="deleteForm" method="GET" action="deleteProduct.php">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this product?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="deleteId">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
