<?php

namespace Aleksa\Dictionary\Repositories;

use mysqli as MySQL;
use Aleksa\Library\Repositories\ObjectRepository;
use Aleksa\Dictionary\Transformers\DictionaryTransformer;

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













