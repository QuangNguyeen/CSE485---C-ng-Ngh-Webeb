<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Items Display</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .item-image {
            width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center">14 loại hoa tuyệt đẹp thích hợp trồng để <br>khoe hương sắc dịp xuân hè</h1>
    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
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
                <td><?php echo htmlspecialchars($item['description']); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
