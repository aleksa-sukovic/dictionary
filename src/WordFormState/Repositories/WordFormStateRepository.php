<?php

namespace Aleksa\WordFormState\Repositories;

use mysqli as MySQL;
use Aleksa\Library\Repositories\ObjectRepository;
use Aleksa\WordFormState\Transformers\WordFormStateTransformer;

class WordFormStateRepository extends ObjectRepository
{
    protected $tableName  = 'word_form_states';
    protected $primaryKey = 'id';

    public function __construct(MySQL $connection)
    {
        parent::__construct($connection);
        $this->transformer = new WordFormStateTransformer($connection);
    }
}













