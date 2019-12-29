<?php
require_once '../../autoload.php';

    $items = words()->search($_GET['q'] ?? null, $_GET['l'] ?? null);
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

    <title>Words</title>
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
            <a class="btn btn-outline-primary mb-4" role="button" href="words-edit.php">Add new</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-sm">
                <thead>
                <tr>
                    <th>#ID</th>
                    <th>Value</th>
                    <th>Slug</th>
                    <th>Type</th>
                    <th>Languages</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($items as $item) { ?>
                    <tr>
                        <td><?php echo $item->id; ?></td>
                        <td><?php echo $item->value; ?></td>
                        <td><?php echo $item->slug ?></td>
                        <td><?php if ($item->type()) echo $item->type()->label; else echo '-'; ?></td>
                        <td><?php echo implode(',', $item->availableLanguages()) ?></td>
                        <td>
                            <a href="./words-edit.php?item=<?php echo $item->id ?>" class="text-info mr-2">Edit</a>
                            <a href="./words-delete.php?item=<?php echo $item->id ?>" class="text-danger mr-2">Delete</a>
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
