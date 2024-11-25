<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap Table with Search Column Feature</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            // Activate tooltips
            $('[data-toggle="tooltip"]').tooltip();

            // Filter table rows based on searched term
            $("#search").on("keyup", function() {
                var term = $(this).val().toLowerCase();
                $("table tbody tr").each(function(){
                    $row = $(this);
                    var name = $row.find("td:nth-child(2)").text().toLowerCase();
                    console.log(name);
                    if(name.search(term) < 0){
                        $row.hide();
                    } else{
                        $row.show();
                    }
                });
            });
        });
    </script>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <a class="navbar-brand" href="index.php">Hoa Xuân Hè</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Admin</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="user.php">User</a>
        </ul>
    </div>
</nav>
<!-- Main Content -->
<div class="container-lg mt-3">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title bg-danger">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h1>List Flower Management</h1>
                            <a href="#addFlowerModal" class="btn btn-success" data-toggle="modal">
                                <i class="material-icons">&#xE147;</i>
                                <span>Add New Product</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th style="width: 22%;">Hình Ảnh</th>
                    <th style="width: 22%;">Tên</th>
                    <th>Mô tả</th>
                    <th>Chức năng</th>
                </tr>
                </thead>
                <tbody>
                    <?php $data = json_decode(file_get_contents('flowers.json'), true); ?>
                    <?php foreach ($data as $item): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['id']); ?></td>
                            <td>
                                <img src="<?php echo htmlspecialchars($item['image']); ?>"
                                     alt="<?php echo htmlspecialchars($item['name']); ?>"  width="200rem" height="180rem">
                            </td>
                            <td><?php echo htmlspecialchars($item['name']); ?></td>
                            <td style="text-align: justify;"><?php echo htmlspecialchars($item['description']); ?></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-info btn-sm edit-btn" data-toggle="modal" data-target="#updateFlowerModal"
                                            data-id="<?php echo $item['id']; ?>"
                                            data-name="<?php echo htmlspecialchars($item['name']); ?>"
                                            data-description="<?php echo htmlspecialchars($item['description']); ?>"
                                            data-image="<?php echo htmlspecialchars($item['image']); ?>">
                                        <i class="material-icons">edit</i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteFlowerModal"
                                            data-id="<?php echo $item['id']; ?>">
                                        <i class="material-icons">delete</i>
                                    </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--- Add new flower-->
<div id="addFlowerModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="add.php" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Flower</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" required>
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
<!---Delete flower --->
<div id="deleteFlowerModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="deleteForm" method="GET" action="delete.php">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this flower?</p>
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
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const deleteButtons = document.querySelectorAll('.btn-danger[data-toggle="modal"]');
        const deleteIdField = document.getElementById('deleteId');
        deleteButtons.forEach(button => {
            button.addEventListener('click', () => {
                const flowerId = button.getAttribute('data-id');
                deleteIdField.value = flowerId;
            });
        });
    });
</script>
</body>
</html>
