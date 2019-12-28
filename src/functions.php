<?php

use Aleksa\Dictionary\Repositories\DictionaryRepository;
use Aleksa\Language\Repositories\LanguageRepository;
use Aleksa\Library\DB\DBConnection;
use Aleksa\Library\Validators\RequestValidator;
use Aleksa\Word\Repositories\WordRepository;
use Aleksa\WordFormState\Repositories\WordFormStateRepository;
use Aleksa\WordFormType\Repositories\WordFormTypeRepository;
use Aleksa\WordTranslation\Repositories\WordTranslationRepository;
use Aleksa\WordType\Repositories\WordTypeRepository;

function redirect($location)
{
    header('Location: ' . $location);

    exit;
}

function fetchErrors()
{
    session_start();
    $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];

    $_SESSION['errors'] = [];
    session_write_close();

    return $errors;
}

function requestValidator()
{
    return new RequestValidator();
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

function wordFormStates()
{
    return new WordFormStateRepository(DBConnection::getConnection());
}

function words()
{
    return new WordRepository(DBConnection::getConnection());
}

function wordTranslations()
{
    return new WordTranslationRepository(DBConnection::getConnection());
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
