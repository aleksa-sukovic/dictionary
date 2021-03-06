<?php require_once './autoload.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <!-- Jquery -->
    <script src="assets/js/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Font Awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom styles -->
    <link rel="stylesheet" href="assets/css/app.css">

    <title>Dictionary</title>
</head>
<body>
    <!-- Header -->
    <?php require_once './Partials/header.php'; ?>

    <div class="container-fluid body-content p-0 m-0">
        <!-- Navigation -->
        <?php require_once './Partials/navigation.php'; ?>

        <!-- Main content -->
        <div class="container-fluid">
            <div class="row mt-4">
                <div class="col-sm-12">
                    <div class="bg-light p-4 rounded">
                        <h1 class="display-4">Dictionary project</h1>
                        <p class="lead">Keep track of words, organize them in dictionaries, translate them into different languages and much more.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
