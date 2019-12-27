<?php

namespace Aleksa\Language\Repositories;

use mysqli as MySQL;
use Aleksa\Library\Repositories\ObjectRepository;
use Aleksa\Language\Transformers\LanguageTransformer;

class LanguageRepository extends ObjectRepository
{
    protected $tableName  = 'languages';
    protected $primaryKey = 'id';

    public function __construct(MySQL $connection)
    {
        parent::__construct($connection);
        $this->transformer = new LanguageTransformer($connection);
    }
}













