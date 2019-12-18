<?php

namespace Language\Dictionary\Repositories;

use mysqli as MySQL;
use Dictionary\Library\Repositories\ObjectRepository;
use Dictionary\Language\Transformers\LanguageTransformer;

class LanguageRepository extends ObjectRepository
{
    protected $tableName  = 'languages';
    protected $primaryKey = 'code';

    public function __construct(MySQL $connection)
    {
        parent::__construct($connection);
        $this->transformer = new LanguageTransformer($connection);
    }
}













