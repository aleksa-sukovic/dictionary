<?php
require_once '../../autoload.php';

$items = dictionaries()->all();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <!-- Jquery -->
    <script src="../../assets/js/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">

    <!-- Custom styles -->
    <link rel="stylesheet" href="../../assets/css/app.css">

    <title>Dictionaries</title>
</head>
<body>
<!-- Header -->
<?php require_once '../../Partials/header.php'; ?>

<div class="container-fluid body-content p-0 m-0">
    <!-- Navigation -->
    <?php require_once '../../Partials/navigation.php'; ?>

    <!-- Main content -->
    <div class="p-4">
        <div class="text-right">
            <a class="btn btn-outline-primary mb-4" role="button" href="dictionaries-edit.php">Add new</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-sm">
                <thead>
                <tr>
                    <th>#ID</th>
                    <th>Name</th>
                    <th>Language</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($items as $item) { ?>
                    <tr>
                        <td><?php echo $item->id; ?></td>
                        <td><?php echo $item->name; ?></td>
                        <td><?php echo $item->language()->label ?></td>
                        <td><?php if ($item->description) echo $item->description; else echo '-' ?></td>
                        <td>
                            <a href="dictionaries-edit.php?item=<?php echo $item->id ?>" class="text-info mr-2">Edit</a>
                            <a href="dictionaries-delete.php?item=<?php echo $item->id ?>" class="text-danger mr-2">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
