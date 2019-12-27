<?php

namespace Aleksa\WordFormType\Repositories;

use mysqli as MySQL;
use Aleksa\Library\Repositories\ObjectRepository;
use Aleksa\WordFormType\Transformers\WordFormTypeTransformer;

class WordFormTypeRepository extends ObjectRepository
{
    protected $tableName  = 'word_form_types';
    protected $primaryKey = 'id';

    public function __construct(MySQL $connection)
    {
        parent::__construct($connection);
        $this->transformer = new WordFormTypeTransformer($connection);
    }
}













