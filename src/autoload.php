<?php

require_once './Library/DB/DBConnection.php';
require_once './Library/Exceptions/DBException.php';
require_once './Library/Repositories/ObjectRepository.php';
require_once './Library/Transformers/ObjectTransformer.php';
require_once './Library/Exceptions/ItemNotFoundException.php';
require_once './Library/Exceptions/ItemNotSavedException.php';
require_once './Library/Exceptions/ItemNotDeletedException.php';

require_once './functions.php';

require_once './Dictionary/Models/Dictionary.php';
require_once './Dictionary/Repositories/DictionaryRepository.php';
require_once './Dictionary/Transformers/DictionaryTransformer.php';

require_once './Language/Models/Language.php';
require_once './Language/Repositories/LanguageRepository.php';
require_once './Language/Transformers/LanguageTransformer.php';
