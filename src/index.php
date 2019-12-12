<?php

require_once './autoload.php';

use Dictionary\Dictionary\Models\Dictionary;
use Dictionary\Dictionary\Repositories\DictionaryRepository;
use Dictionary\Library\DB\DBConnection;
use Dictionary\Library\Exceptions\ItemNotFoundException;

$connection = DBConnection::getConnection();
$dictionaryRepository = new DictionaryRepository($connection);

$dictionaries = $dictionaryRepository->all();

foreach ($dictionaries as $dictionary) {
    echo '<h1>' . $dictionary . '</h1>';
}

echo '<h1>' . $dictionaryRepository->findById(1)->name . '</h1>';

//$dictionaryRepository->insert(['id' => 3, 'name' => 'Ime 1', 'language_code' => 'en', 'description' => 'Opis 1']);
$dictionaryRepository->insert(new Dictionary(3, 'en', 'Ime 1', 'Opis 1'));
//$dictionaryRepository->destroy(3);
//try {
//    $dictionaryRepository->findById(3);
//} catch (ItemNotFoundException $e) {
//    die('ItemNotFound!');
//}












DBConnection::closeConnection();













