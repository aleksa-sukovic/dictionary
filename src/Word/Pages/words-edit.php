<?php
    require_once '../../autoload.php';

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

                    <p class="lead">Base word</p>

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

                    <!-- Translations -->
                    <div class="d-flex flex-row justify-content-between mt-5">
                        <p class="lead">Translations</p>
                        <a href="../../WordTranslation/Pages/word-translations-edit.php?word=<?php echo $activeItem->id ?>" class="text-info font-weight-lighter">Add translation</a>
                    </div>
                     <?php if ($activeItem) { ?>
                         <?php if (count($activeItem->translations())) { ?>
                            <table class="table table-hover table-sm">
                                <thead>
                                    <tr>
                                        <td>Value</td>
                                        <td>Language</td>
                                        <td>Actions</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($activeItem->translations() as $translation) { ?>
                                    <tr>
                                        <td><?php echo $translation->value ?></td>
                                        <td><?php echo $translation->language()->label ?></td>
                                        <td>
                                            <a href="../../WordTranslation/Pages/word-translations-edit.php?word=<?php echo $translation->wordId ?>&language=<?php echo $translation->languageId ?>" class="text-info mr-2">Edit</a>
                                            <a href="../../WordTranslation/Pages/word-translations-delete.php?word=<?php echo $translation->wordId ?>&item=<?php echo $translation->id ?>" class="text-danger mr-2">Delete</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php } else { ?>
                             <p class="text-muted">There are currently no translations for this word.</p>
                        <?php } ?>
                    <?php } else { ?>
                        <p class="text-muted">Save the word in order to add its translations.</p>
                    <?php } ?>

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
