<?php
require_once './autoload.php';

use Dictionary\Library\DB\DBConnection;
use Language\Dictionary\Repositories\LanguageRepository;

$connection = DBConnection::getConnection();
$languageRepository = new LanguageRepository($connection);

$languages = $languageRepository->all();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dictionary</title>
</head>
<body>
    <form action="./dictionary-add.php" method="POST">
        <!-- Name -->
        <label for="name">Name</label>
        <input id="name" type="text" name="name" placeholder="Enter dictionary name" required>

        <!-- Language -->
        <label for="language_code">Language</label>
        <select name="language_code" id="language_code">
            <?php
                foreach ($languages as $language) {
                    echo "<option value=\"$language->code\">$language->label</option>";
                }
            ?>
        </select>

        <!-- Description -->
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10"></textarea>

        <!-- Submit -->
        <button type="submit">Save</button>
    </form>
</body>
</html>
