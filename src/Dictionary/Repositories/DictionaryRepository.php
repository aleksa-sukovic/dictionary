<?php

namespace Dictionary\Dictionary\Repositories;

use Dictionary\Dictionary\Models\Dictionary;
use Dictionary\Dictionary\Transformers\DictionaryTransformer;
use Dictionary\Library\Exceptions\ItemNotDeletedException;
use Dictionary\Library\Exceptions\ItemNotFoundException;
use Dictionary\Library\Exceptions\ItemNotSavedException;
use Dictionary\Library\Repositories\ObjectRepository;
use mysqli as MySQL;

class DictionaryRepository extends ObjectRepository
{
    protected $tableName = 'dictionaries';
    protected $primaryKey = 'id';

    public function __construct(MySQL $connection)
    {
        parent::__construct($connection);
        $this->transformer = new DictionaryTransformer($connection);
    }

     public function insert($dictionary)
     {
         $data = $this->transformer->transformToArray($dictionary);
         $columns = '(' . implode(', ', array_keys($data)) . ')';
         $values = '(' . implode(', ', array_values($data)) . ')';
         $query = "INSERT INTO $this->tableName $columns VALUES $values";

         if (!$this->connection->query($query)) {
             throw new ItemNotSavedException();
         }

         return $this->findById($this->connection->insert_id);
     }
}













