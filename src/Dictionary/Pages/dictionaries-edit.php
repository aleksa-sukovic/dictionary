<?php
    require_once '../../autoload.php';

    $errors     = fetchErrors();
    $activeItem = isset($_GET['item']) ? dictionaries()->findById($_GET['item']) : null;
    $languages  = languages()->all();
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
        <div class="row">
            <div class="col-sm-12">
                <h1 class="h4 text-center mt-2">Dictionaries</h1>

                <p class="lead text-center text-muted">
                    <?php if ($activeItem) echo 'Edit'; else echo 'Add new'; ?>
                </p>
            </div>
        </div>

        <!-- Errors -->
        <?php if (count($errors)) { ?>
        <div class="row mt-2">
            <div class="col-sm-6 offset-3">
                <?php foreach ($errors as $error => $message) { ?>
                    <div class="alert alert-danger"><?php echo $message ?></div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>

        <div class="row mt-2">
            <div class="col-sm-6 offset-3">
                <form action="dictionaries-processors.php" method="POST">

                    <!-- Language ID -->
                    <?php if ($activeItem) { ?>
                    <input type="hidden" value="<?php echo $activeItem->id; ?>" name="id" id="id">
                    <?php } ?>

                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">Name:</label>

                        <input type="text"
                               class="form-control"
                               id="name"
                               name="name"
                               value="<?php if ($activeItem) echo $activeItem->name ?>">
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <label for="description">Description:</label>

                        <textarea type="text"
                                  cols="5"
                                  rows="10"
                                  class="form-control"
                                  id="description"
                                  name="description"><?php if ($activeItem) echo $activeItem->description ?></textarea>
                    </div>

                   <!-- Language -->
                    <div class="form-group">
                        <label for="language">Language:</label>

                        <select class="custom-select" name="language_id" id="language">
                            <?php foreach ($languages as $language) { ?>
                                <option value="<?php echo $language->id ?>" <?php if ($activeItem && $activeItem->languageId == $language->id) echo 'selected' ?>>
                                    <?php echo $language->label ?>
                                </option>
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
