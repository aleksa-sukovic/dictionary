<?php

namespace Aleksa\WordType\Repositories;

use mysqli as MySQL;
use Aleksa\Library\Repositories\ObjectRepository;
use Aleksa\WordType\Transformers\WordTypeTransformer;

class WordTypeRepository extends ObjectRepository
{
    protected $tableName  = 'word_types';
    protected $primaryKey = 'id';

    public function __construct(MySQL $connection)
    {
        parent::__construct($connection);
        $this->transformer = new WordTypeTransformer($connection);
    }
}













