<?php

namespace Dictionary\Library\Repositories;

use Dictionary\Library\Transformers\ObjectTransformer;
use mysqli as MySQL;

class ObjectRepository
{
    /**
     * @var MySQL
     */
    protected $connection;

    /**
     * @var ObjectTransformer
     */
    protected $transformer;

    protected $tableName;

    public function __construct(MySQL $connection)
    {
        $this->connection = $connection;
    }

    public function all()
    {
        $result = $this->connection->query("SELECT * FROM $this->tableName");
        $transformed = $this->transformer->transformMany($result);

        mysqli_free_result($result);
        return $transformed;
    }
}
