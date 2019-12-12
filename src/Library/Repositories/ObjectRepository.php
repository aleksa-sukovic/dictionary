<?php

namespace Dictionary\Library\Repositories;

use Dictionary\Library\Exceptions\ItemNotDeletedException;
use Dictionary\Library\Exceptions\ItemNotFoundException;
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
    protected $primaryKey;

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

    public function findById($id)
    {
        $value = $this->transformer->transformField($id, $this->primaryKey);
        $query = "SELECT * FROM $this->tableName WHERE $this->primaryKey = $value";

        $result = $this->connection->query($query);
        $item = $result->fetch_assoc();

        if (!$item) {
            throw new ItemNotFoundException();
        }

        $transformed = $this->transformer->transform($item);
        mysqli_free_result($result);
        return $transformed;
    }

    public function destroy($id)
    {
        $value = $this->transformer->transformField($id, $this->primaryKey);
        $query = "DELETE FROM $this->tableName WHERE $this->primaryKey = $value";

        if (!$this->connection->query($query)) {
            throw new ItemNotDeletedException();
        }

        return true;
    }

}
