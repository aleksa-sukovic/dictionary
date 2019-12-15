<?php

require_once './autoload.php';

use Dictionary\Dictionary\Repositories\DictionaryRepository;
use Dictionary\Library\DB\DBConnection;

$connection = DBConnection::getConnection();

$dictionaryRepository = new DictionaryRepository($connection);

DBConnection::closeConnection();
