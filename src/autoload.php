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

require_once './WordType/Models/WordType.php';
require_once './WordType/Repositories/WordTypeRepository.php';
require_once './WordType/Transformers/WordTypeTransformer.php';

require_once './WordFormType/Models/WordFormType.php';
require_once './WordFormType/Repositories/WordFormTypeRepository.php';
require_once './WordFormType/Transformers/WordFormTypeTransformer.php';

require_once './WordFormState/Models/WordFormState.php';
require_once './WordFormState/Repositories/WordFormStateRepository.php';
require_once './WordFormState/Transformers/WordFormStateTransformer.php';

require_once './Word/Models/Word.php';
require_once './Word/Repositories/WordRepository.php';
require_once './Word/Transformers/WordTransformer.php';

require_once './WordTranslation/Models/WordTranslation.php';
require_once './WordTranslation/Repositories/WordTranslationRepository.php';
require_once './WordTranslation/Transformers/WordTranslationTransformer.php';
