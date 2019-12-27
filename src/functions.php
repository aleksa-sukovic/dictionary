<?php

use Aleksa\Language\Repositories\LanguageRepository;
use Aleksa\Library\DB\DBConnection;

function redirect($location)
{
    header('Location: ' . $location);

    exit;
}

function languages()
{
    return new LanguageRepository(DBConnection::getConnection());
}
