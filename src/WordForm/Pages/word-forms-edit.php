<?php
    require_once '../../autoload.php';

    $errors = fetchErrors();
    $activeItem = isset($_GET['item']) ? wordForms()->findById($_GET['item']) : null;
    $wordTypes = wordFormTypes()->all();
    $wordStates = wordFormStates()->all();

    if (isset($_GET['item'])) {
        $translation = $activeItem->translation();
    } else if (isset($_GET['translation'])) {
        $translation = wordTranslations()->findById($_GET['translation']);
    } else {
        redirect('/WordForm/Pages/word-forms.php');
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

    <title>Word forms</title>
</head>
<body>
<!-- Header -->
<?php require_once '../../Partials/header.php'; ?>

<div class="container-fluid body-content p-0 m-0">
    <!-- Navigation -->
    <?php require_once '../../Partials/navigation.php'; ?>

    <!-- Main content -->
    <div class="p-4 container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="bg-light p-4 rounded">
                    <h1 class="display-4">Word form</h1>
                    <p class="lead">Word form represents a variation of a word.</p>
                    <p>Define all aspects of particular word form.</p>
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
                <form action="/WordForm/Pages/word-forms-processor.php" method="POST" class="bg-light rounded p-4">
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

                    <!-- State -->
                    <div class="form-group">
                        <label for="state">State:</label>

                        <select class="custom-select" name="state_id" id="type">
                            <?php foreach($wordStates as $state) { ?>
                                <option value="<?php echo $state->id ?>" <?php if ($activeItem && $activeItem->stateId == $state->id) echo 'selected' ?>>
                                    <?php echo $state->value ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <!-- Type -->
                    <div class="form-group">
                        <label for="type">Type:</label>

                        <select class="custom-select" name="type_id" id="type">
                            <?php foreach($wordTypes as $type) { ?>
                            <option value="<?php echo $type->id ?>" <?php if ($activeItem && $activeItem->typeId == $type->id) echo 'selected' ?>>
                                <?php echo $type->value ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>

                    <!-- Translation -->
                    <div class="form-group">
                        <label for="translation">Word:</label>

                        <input type="text" class="form-control" id="translation" disabled value="<?php echo $translation->value ?>">
                        <input type="hidden" class="form-control" name="word_translation_id" value="<?php echo $translation->id ?>">
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
