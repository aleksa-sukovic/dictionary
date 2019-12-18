<?php

require_once './autoload.php';

use Dictionary\Dictionary\Repositories\LanguageRepository;
use Dictionary\Library\DB\DBConnection;

$connection = DBConnection::getConnection();

$dictionaryRepository = new LanguageRepository($connection);

DBConnection::closeConnection();
