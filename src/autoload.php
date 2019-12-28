<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Library/DB/DBConnection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Library/Exceptions/DBException.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Library/Repositories/ObjectRepository.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Library/Transformers/ObjectTransformer.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Library/Exceptions/ItemNotFoundException.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Library/Exceptions/ItemNotSavedException.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Library/Exceptions/ItemNotDeletedException.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/functions.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/Dictionary/Models/Dictionary.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Dictionary/Repositories/DictionaryRepository.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Dictionary/Transformers/DictionaryTransformer.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/Language/Models/Language.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Language/Repositories/LanguageRepository.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Language/Transformers/LanguageTransformer.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/WordType/Models/WordType.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/WordType/Repositories/WordTypeRepository.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/WordType/Transformers/WordTypeTransformer.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/WordFormType/Models/WordFormType.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/WordFormType/Repositories/WordFormTypeRepository.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/WordFormType/Transformers/WordFormTypeTransformer.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/WordFormState/Models/WordFormState.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/WordFormState/Repositories/WordFormStateRepository.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/WordFormState/Transformers/WordFormStateTransformer.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/Word/Models/Word.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Word/Repositories/WordRepository.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Word/Transformers/WordTransformer.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/WordTranslation/Models/WordTranslation.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/WordTranslation/Repositories/WordTranslationRepository.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/WordTranslation/Transformers/WordTranslationTransformer.php';
