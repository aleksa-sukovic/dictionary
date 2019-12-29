<?php
    require_once '../../autoload.php';

    $errors     = fetchErrors();
    $activeItem = isset($_GET['item']) ? words()->findById($_GET['item']) : null;
    $wordTypes  = wordTypes()->all();
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
    <div class="container pt-4">
        <div class="row">
            <div class="col-sm-12">
                <div class="bg-light p-4 rounded">
                    <h1 class="display-4">Words</h1>
                    <p class="lead">Words represent a single distinct meaningful element of speech or writing.</p>
                    <p>Define all aspects of a single word including its translations.</p>
                </div>
            </div>
        </div>

        <!-- Errors -->
        <?php if (count($errors)) { ?>
            <div class="row">
                <div class="col-sm-12">
                    <?php foreach ($errors as $error => $message) { ?>
                        <div class="alert alert-danger mb-0 mt-4"><?php echo $message ?></div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>

        <!-- Input form -->
        <div class="row mt-4">
            <div class="col-sm-12">
                <form action="/Word/Pages/words-processors.php" method="POST" class="bg-light rounded p-4">
                    <!-- Language ID -->
                    <?php if ($activeItem) { ?>
                    <input type="hidden" value="<?php echo $activeItem->id; ?>" name="id" id="id">
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

                    <!-- Word type -->
                    <div class="form-group">
                        <label for="type">Word type:</label>

                        <select class="custom-select" name="type_id" id="type">
                            <?php foreach ($wordTypes as $type) { ?>
                                <option value="<?php echo $type->id ?>" <?php if ($activeItem && $activeItem->typeId == $type->id) echo 'selected' ?>>
                                    <?php echo $type->label ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <!-- Slug -->
                    <div class="form-group">
                        <label for="slug">Slug:</label>

                        <input type="text"
                               class="form-control"
                               id="slug"
                               name="slug"
                               disabled
                               value="<?php if ($activeItem) echo $activeItem->slug ?>">
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="btn btn-primary mb-2">
                        <?php if ($activeItem) echo 'Update'; else echo 'Create'; ?>
                    </button>
                </form>
            </div>
        </div>

        <!-- Translations -->
        <div class="row mt-4">
            <div class="col-sm-12">
                <div class="bg-light rounded p-4">
                    <!-- Translations -->
                    <div class="d-flex flex-row justify-content-between">
                        <p class="h4">Translations</p>
                        <a href="/WordTranslation/Pages/word-translations-edit.php?word=<?php echo $activeItem->id ?>" class="text-info font-weight-lighter">
                            Add translation
                        </a>
                    </div>

                    <!-- Unsaved word warning -->
                    <?php if (!$activeItem) { ?>
                        <p class="alert alert-warning">
                            Save the word in order to add its translations.
                        </p>
                    <?php } ?>

                    <!-- Translations -->
                    <?php if ($activeItem) require_once fullPath('WordTranslation/Pages/word-translations.php') ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
