<?php

use Dictionary\Dictionary\Repositories\DictionaryRepository;
use Dictionary\Library\DB\DBConnection;

require_once './autoload.php';

$errors = [];
$dictionaryRepository = new DictionaryRepository(DBConnection::getConnection());
$name = null;
$languageCode = null;
$description = null;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('dictionary.php');
}

if (!isset($_POST['name'])) {
    $errors['name'] = 'Name is required';
} else {
    $name = $_POST['name'];
}

if (!isset($_POST['language_code'])) {
    $errors['language_code'] = 'Language code is required';
} else {
    $languageCode = $_POST['language_code'];
}

if (isset($_POST['description'])) {
    $description = $_POST['description'];
}

print_r($name);
print_r($languageCode);
print_r($description);
print_r($errors);

$description = $dictionaryRepository->save([
    'language_code' => $languageCode,
    'name' => $name,
    'description' => $description,
]);

print_r($description);










