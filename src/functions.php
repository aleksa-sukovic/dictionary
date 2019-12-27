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

function isPageActive($pages)
{
    foreach ($pages as $page) {
        if (basename($_SERVER['PHP_SELF']) === $page) {
            return true;
        }
    }

    return false;
}
