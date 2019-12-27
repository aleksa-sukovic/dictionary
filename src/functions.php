<?php

use Aleksa\Dictionary\Repositories\DictionaryRepository;
use Aleksa\Language\Repositories\LanguageRepository;
use Aleksa\Library\DB\DBConnection;
use Aleksa\WordFormType\Repositories\WordFormTypeRepository;
use Aleksa\WordType\Repositories\WordTypeRepository;

function redirect($location)
{
    header('Location: ' . $location);

    exit;
}

function languages()
{
    return new LanguageRepository(DBConnection::getConnection());
}

function wordTypes()
{
    return new WordTypeRepository(DBConnection::getConnection());
}

function dictionaries()
{
    return new DictionaryRepository(DBConnection::getConnection());
}

function wordFormTypes()
{
    return new WordFormTypeRepository(DBConnection::getConnection());
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
