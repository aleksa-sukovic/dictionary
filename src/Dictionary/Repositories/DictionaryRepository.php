<?php

namespace Dictionary\Dictionary\Repositories;

use Dictionary\Dictionary\Transformers\DictionaryTransformer;
use Dictionary\Library\Exceptions\ItemNotFoundException;
use Dictionary\Library\Repositories\ObjectRepository;
use mysqli as MySQL;

class DictionaryRepository extends ObjectRepository
{
    protected $tableName = 'dictionaries';

    public function __construct(MySQL $connection)
    {
        parent::__construct($connection);
        $this->transformer = new DictionaryTransformer();
    }

    public function findById($id)
    {
        $result = $this->connection
            ->query('SELECT * FROM dictionaries WHERE id = ' . $this->connection->escape_string($id));
        $item = $result->fetch_assoc();
        $this->connection->insert_id
        if (!$item) {
            throw new ItemNotFoundException();
        }

        $transformed = $this->transformer->transform($item);
        mysqli_free_result($result);
        return $transformed;
    }
}
