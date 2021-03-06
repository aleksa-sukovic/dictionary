<?php

namespace Aleksa\Library\Repositories;

use Aleksa\Library\Exceptions\ItemNotDeletedException;
use Aleksa\Library\Exceptions\ItemNotFoundException;
use Aleksa\Library\Exceptions\ItemNotSavedException;
use Aleksa\Library\Services\FilterService;
use Aleksa\Library\Transformers\ObjectTransformer;
use mysqli as MySQL;

class ObjectRepository
{
    protected MySQL $connection;

    protected ObjectTransformer $transformer;

    protected FilterService $filterService;

    protected $tableName;
    protected $primaryKey;

    public function __construct(MySQL $connection)
    {
        $this->connection = $connection;
        $this->filterService = new FilterService;
    }

    public function all()
    {
        $result = $this->connection->query("SELECT * FROM $this->tableName");

        if (!$result) {
            return [];
        }

        $transformed = $this->transformer->toObjectArray($result);

        mysqli_free_result($result);
        return $transformed;
    }

    public function findById($id)
    {
        $value = $this->transformer->sqlValue($id, $this->primaryKey);
        $query = "SELECT * FROM $this->tableName WHERE $this->primaryKey = $value";

        $result = $this->connection->query($query);
        $item = $result->fetch_assoc();

        if (!$item) {
            throw new ItemNotFoundException();
        }

        $transformed = $this->transformer->toObject($item);
        mysqli_free_result($result);
        return $transformed;
    }

    public function save($data)
    {
        if (isset($data[$this->primaryKey])) {
            return $this->update($data);
        } else {
            return $this->create($data);
        }
    }

    public function create($params)
    {
        $data = $this->transformer->toSqlArray($params);

        $columns = '(' . implode(', ', array_keys($data)) . ')';
        $values = '(' . implode(', ', array_values($data)) . ')';
        $query = "INSERT INTO $this->tableName $columns VALUES $values";

        if (!$this->connection->query($query)) {
            throw new ItemNotSavedException();
        }

        if ($this->connection->insert_id) {
            return $this->findById($this->connection->insert_id);
        } else {
            return $this->findById($params[$this->primaryKey]);
        }
    }

    public function update($data)
    {
        $params = $this->transformer->toSqlArray($data);
        $primaryKey = $params[$this->primaryKey];
        $values = implode(', ', array_map(function ($param) use ($params) {
            return $param . '=' . $params[$param];
        }, array_keys($params)));
        $query = "UPDATE $this->tableName SET $values WHERE $this->primaryKey=$primaryKey";

        if (!$this->connection->query($query)) {
            throw new ItemNotSavedException();
        }

        return $this->findById($data[$this->primaryKey]);
    }

    public function destroy($id)
    {
        $value = $this->transformer->sqlValue($id, $this->primaryKey);
        $query = "DELETE FROM $this->tableName WHERE $this->primaryKey = $value";

        if (!$this->connection->query($query)) {
            die($this->connection->error);
            throw new ItemNotDeletedException();
        }

        return true;
    }
}
