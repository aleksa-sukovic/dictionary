<?php
    require_once '../../autoload.php';

    $errors = fetchErrors();
    $activeItem = isset($_GET['item']) ? wordTranslations()->findById($_GET['item']) : null;
    $languages = languages()->all();

    if (isset($_GET['item'])) {
        $word = $activeItem->word();
    } else if (isset($_GET['word'])) {
        $word = words()->findById($_GET['word']);
    } else {
        redirect('/Word/Pages/words.php');
    }
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

    <title>Word translation</title>
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
                <h1 class="h4 text-center mt-2">Word translation</h1>

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

        <!-- Input form -->
        <div class="row mt-2">
            <div class="col-sm-6 offset-3">
                <form action="word-translations-processors.php" method="POST">
                    <p class="lead">Base word</p>

                    <!-- ID -->
                    <?php if ($activeItem) { ?>
                    <input type="hidden" name="id" value="<?php echo $activeItem->id ?>">
                    <?php } ?>

                    <!-- Value -->
                    <div class="form-group">
                        <label for="value">Value:</label>

                        <input type="text"
                               class="form-control"
                               id="value"
                               name="value"
                               value="<?php if ($activeItem) echo $activeItem->value ?>">
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
                            <option value="<?php echo $language->id ?>" <?php if ($activeItem && $activeItem->languageId == $language->id) echo 'selected' ?>>
                                <?php echo $language->label ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="btn btn-primary">
                        <?php if ($activeItem) echo 'Update'; else echo 'Create'; ?>
                    </button>
                </form>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-sm-6 offset-3">
                <!-- Word forms -->
                <div class="d-flex flex-row justify-content-between mt-5">
                    <p class="lead">Forms</p>
                    <a href="/WordForm/Pages/word-forms-edit.php?translation=<?php echo $activeItem->id ?>" class="text-info font-weight-lighter">
                        Add form
                    </a>
                </div>

                <!-- Unsaved translation warning -->
                <?php if (!$activeItem) { ?>
                    <p class="alert alert-warning">
                        Save the word in order to add its forms.
                    </p>
                <?php } ?>

                <!-- Forms -->
                <?php if ($activeItem) require_once fullPath('WordForm/Pages/word-forms.php') ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
