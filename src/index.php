<?php

require_once './autoload.php';

use Dictionary\Dictionary\Repositories\DictionaryRepository;
use Dictionary\Library\DB\DBConnection;

$connection = DBConnection::getConnection();
$dictionaryRepository = new DictionaryRepository($connection);

$dictionaries = $dictionaryRepository->all();

foreach ($dictionaries as $dictionary) {
    echo '<h1>' . $dictionary . '</h1>';
}

DBConnection::closeConnection();













