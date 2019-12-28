<?php
    require_once './autoload.php';

    // Handle errors
    session_start();
    $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
    $_SESSION['errors'] = [];
    session_write_close();

    $activeItem = isset($_GET['item']) ? words()->findById($_GET['item']) : null;
    $wordTypes = wordTypes()->all();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <!-- Jquery -->
    <script src="assets/js/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Custom styles -->
    <link rel="stylesheet" href="assets/css/app.css">

    <title>Words</title>
</head>
<body>
<!-- Header -->
<?php require_once './Partials/header.php'; ?>

<div class="container-fluid body-content p-0 m-0">
    <!-- Navigation -->
    <?php require_once './Partials/navigation.php'; ?>

    <!-- Main content -->
    <div class="p-4">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="h4 text-center mt-2">Words</h1>

                <p class="lead text-center text-muted">
                    <?php if ($activeItem) echo 'Edit'; else echo 'Add new'; ?>
                </p>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-sm-6 offset-3">
                <?php foreach ($errors as $error => $message) { ?>
                    <p class="text-danger"><?php echo $message ?></p>
                <?php } ?>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-sm-6 offset-3">
                <form action="words-processors.php" method="POST">

                    <!-- Language ID -->
                    <?php if ($activeItem) { ?>
                    <input type="hidden" value="<?php echo $activeItem->id; ?>" name="id" id="id">
                    <?php } ?>

                    <!-- Value -->
                    <div class="form-group">
                        <label for="value">Value:</label>

                        <input type="text" class="form-control" id="value" name="value" value="<?php
                            if ($activeItem) {
                                echo $activeItem->value;
                            }
                        ?>" >
                    </div>

                    <!-- Slug -->
                    <div class="form-group">
                        <label for="slug">Slug (leave empty for auto-generation):</label>

                        <input type="text" class="form-control" id="slug" name="slug" value="<?php
                            if ($activeItem) {
                                echo $activeItem->slug;
                            }
                        ?>">
                    </div>

                    <!-- Word type -->
                    <div class="form-group">
                       <label for="type">Word type:</label>
                       <select class="custom-select" name="type_id" id="type">
                            <?php foreach ($wordTypes as $type) { ?>
                                <option value="<?php echo $type->id ?>" <?php
                                    if ($activeItem && $activeItem->typeId == $type->id) {
                                        echo 'selected';
                                    }
                                ?>><?php echo $type->label ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="btn btn-primary mb-2">
                        <?php if ($activeItem) echo 'Update'; else echo 'Create'; ?>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
