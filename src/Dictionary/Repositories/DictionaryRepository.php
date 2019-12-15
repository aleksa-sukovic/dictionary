<?php

namespace Dictionary\Dictionary\Repositories;

use mysqli as MySQL;
use Dictionary\Library\Repositories\ObjectRepository;
use Dictionary\Dictionary\Transformers\DictionaryTransformer;

class DictionaryRepository extends ObjectRepository
{
    protected $tableName  = 'dictionaries';
    protected $primaryKey = 'id';

    public function __construct(MySQL $connection)
    {
        parent::__construct($connection);
        $this->transformer = new DictionaryTransformer($connection);
    }
}













