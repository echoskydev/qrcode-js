<!doctype html>
<html lang="en">

<head>
    <title>QR Code</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/twitter/bootstrap/dist/css/bootstrap.min.css">
    <script src="node_modules/jquery/dist/jquery.slim.js"></script>
    <script src="vendor/twitter/bootstrap/dist/js/bootstrap.min.js"></script>


</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand" href="#">QR Code</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=test1">Test</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=select-camera">Select camera</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=back-camera">Back camera</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <?php
    // var_dump($_REQUEST);
    $page = $_REQUEST['page'];
    if ($page == '') {
        $page = 'home';
    }
    include $page . '.php';
    ?>
</body>

</html>