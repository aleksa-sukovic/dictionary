<?php
    require_once '../../autoload.php';

    $errors         = fetchErrors();
    $activeLanguage = isset($_GET['item']) ? languages()->findById($_GET['item']) : null;
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

    <title>Languages</title>
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
                <div class="bg-light p-4 rounded">
                    <h1 class="display-4">Language</h1>
                    <p class="lead">Language represents a method of human communication, either spoken or written, consisting of the use of words in a structured and conventional way.</p>
                    <p>Define all aspects of particular language.</p>
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

        <div class="row mt-4">
            <div class="col-sm-12">
                <form action="languages-processors.php" method="POST" class="bg-light rounded p-4">

                    <!-- ID -->
                    <?php if ($activeLanguage) { ?>
                    <input type="hidden" value="<?php echo $activeLanguage->id; ?>" name="id" id="id">
                    <?php } ?>

                    <!-- Language Code -->
                    <div class="form-group">
                        <label for="label">Code:</label>

                        <input type="text"
                               class="form-control"
                               id="label"
                               name="code"
                               value="<?php if ($activeLanguage) echo $activeLanguage->code ?>">
                    </div>

                    <!-- Language label -->
                    <div class="form-group">
                        <label for="label">Label:</label>

                        <input type="text"
                               class="form-control"
                               id="label"
                               name="label"
                               value="<?php if ($activeLanguage) echo $activeLanguage->label ?>">
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="btn btn-primary mb-2">
                        <?php if ($activeLanguage) echo 'Update'; else echo 'Create'; ?>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
