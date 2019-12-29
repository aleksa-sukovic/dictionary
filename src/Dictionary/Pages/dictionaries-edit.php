<?php
    require_once '../../autoload.php';

    $errors     = fetchErrors();
    $activeItem = isset($_GET['item']) ? dictionaries()->findById($_GET['item']) : null;
    $languages  = languages()->all();
    $wordQuery  = empty($_GET['q']) ? null : $_GET['q'];
    $searchResults = $wordQuery ? words()->search($wordQuery, null) : [];
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
    <div class="container p-4">
        <div class="row">
            <div class="col-sm-12">
                <div class="bg-light p-4 rounded">
                    <h1 class="display-4">Dictionaries</h1>
                    <p class="lead">Dictionary represents a collection of words of particular language.</p>
                    <p>Define all aspects of a single dictionary including its words.</p>
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

        <!-- Main form -->
        <div class="row mt-4">
            <div class="col-sm-12">
                <form action="dictionaries-processors.php" method="POST" class="bg-light rounded p-4">

                    <!-- ID -->
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

        <!-- Word add -->
        <?php if ($activeItem) { ?>
        <div class="row mt-4">
            <div class="col-sm-12">
                <div class="bg-light rounded p-4">
                    <h4 class="h4">Add words</h4>

                    <!-- Search form -->
                    <form action="/Dictionary/Pages/dictionaries-edit.php" method="GET" class="form-inline mt-4">
                        <input type="hidden" value="<?php echo $activeItem->id ?>" name="item">

                        <input type="text" value="<?php if ($wordQuery) echo $wordQuery ?>" name="q" id="q" placeholder="Search word" class="form-control mr-4">

                        <button type="submit" class="btn btn-outline-secondary">Search</button>
                    </form>

                    <!-- Search for words claim -->
                    <?php if (!$wordQuery) { ?>
                    <div class="mt-4 mb-0 alert alert-info">
                        Search for words to add to this dictionary.
                    </div>
                    <?php } ?>

                    <!-- Search results -->
                    <?php if ($wordQuery) { ?>
                    <table class="table table-bordered table-hover table-sm mt-4">
                        <thead>
                            <tr>
                                <th class="w-25">ID</th>
                                <th>Word</th>
                                <th class="text-center w-25">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($searchResults as $word) { ?>
                                <tr>
                                    <td><?php echo $word->id ?></td>
                                    <td><?php echo $word->value ?></td>
                                    <td class="text-center">
                                        <a href="/Dictionary/Pages/dictionary-add-word.php?word=<?php echo $word->id ?>&dictionary=<?php echo $activeItem->id ?>" class="text-info">Add</a>
<!--                                        <a href="/WordForm/Pages/dictionary-delete-word.php?word=--><?php //echo $word->id ?><!--&dictionary=--><?php //echo $activeItem->id ?><!--" class="text-danger mr-2">Delete</a>-->
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php } ?>

        <!-- Word list -->
        <div class="row mt-4">
            <div class="col-sm-12">
                <div class="bg-light rounded p-4">
                    <h4 class="h4">Words</h4>

                    <!-- No words message -->
                    <?php if (!count($activeItem->words())) { ?>
                        <div class="mt-4 mb-0 alert alert-info">
                            This dictionary doesn't have any words.
                        </div>
                    <?php } ?>

                    <!-- Words -->
                    <?php if (count($activeItem->words())) { ?>
                        <table class="table table-bordered table-hover table-sm mt-4">
                            <thead>
                            <tr>
                                <th class="w-25">ID</th>
                                <th>Word</th>
                                <th class="text-center w-25">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($activeItem->words() as $word) { ?>
                                <tr>
                                    <td><?php echo $word->id ?></td>
                                    <td><?php echo $word->value ?></td>
                                    <td class="text-center">
                                        <a href="/Word/Pages/words-edit.php?item=<?php echo $word->id ?>" class="text-info mr-2">Edit</a>
                                        <a href="/Dictionary/Pages/dictionary-delete-word.php?word=<?php echo $word->id ?>&dictionary=<?php echo $activeItem->id ?>" class="text-danger">Remove</a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
