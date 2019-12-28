<?php
    require_once './autoload.php';

    // Handle errors
    session_start();
    $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
    $_SESSION['errors'] = [];
    session_write_close();

    $activeItem = isset($_GET['word']) && isset($_GET['language']) ? wordTranslations()->find($_GET['word'], $_GET['language']) : null;
    $languages = languages()->all();
    $word = words()->findById($_GET['word']);
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

    <title>Word translation</title>
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
                <h1 class="h4 text-center mt-2">Word translation</h1>

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
                <form action="word-translations-processors.php" method="POST">

                    <!-- ID -->
                    <?php if ($activeItem) { ?>
                    <input type="hidden" name="id" value="<?php echo $activeItem->id ?>">
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

                    <!-- Word -->
                    <div class="form-group">
                        <label for="word">Word:</label>

                        <input type="text" class="form-control" id="word" disabled value="<?php echo $word->value ?>">
                        <input type="hidden" class="form-control" id="word" name="word_id" value="<?php echo $word->id ?>">
                    </div>

                    <!-- Language -->
                    <div class="form-group">
                        <label for="language">Language:</label>

                        <select class="custom-select" name="language_id" id="language">
                            <?php foreach($languages as $language) { ?>
                                <option value="<?php echo $language->id ?>" <?php
                                    if ($activeItem && $activeItem->languageId == $language->id) {
                                        echo 'selected';
                                    }
                                ?>><?php echo $language->label ?></option>
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
