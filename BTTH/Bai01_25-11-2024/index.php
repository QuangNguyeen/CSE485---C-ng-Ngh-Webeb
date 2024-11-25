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
    <a class="navbar-brand" href="#">Hoa Xuân Hè</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="admin.php">Admin</a>
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
                        <h1>Hoa tuyệt đẹp dịp xuân hè</h1>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
