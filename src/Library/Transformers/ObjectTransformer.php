<?php

namespace Dictionary\Library\Transformers;

use mysqli_result as MySqlResult;
use mysqli as MySQL;

abstract class ObjectTransformer
{
    /**
     * @var MySQL
     */
    protected $connection;
    protected $fields;

    public function __construct(MySQL $connection)
    {
        $this->connection = $connection;
    }

    public abstract function toObject($array);

    public function toObjectArray(MySqlResult $set)
    {
        $output = [];

        while ($item = $set->fetch_assoc()) {
            $output[] = $this->toObject($item);
        }

        return $output;
    }

    public function toSqlArray($data)
    {
        $array = [];

        foreach ($data as $key => $value) {
            if (array_key_exists($key, $this->fields)) {
                $array[$key] = $this->sqlValue($value, $key);
            }
        }

        return $array;
    }

    public function sqlValue($value, $fieldName)
    {
        switch ($this->fields[$fieldName]) {
            case 'int':
                return intval($value);
            case 'string':
                return $this->sqlString($value);
            case 'string:nullable':
                return $this->sqlNullableString($value);
            default:
                return null;
        }
    }

    public function sqlNullableString($string)
    {
        return $string ? "'" . $this->connection->escape_string($string) . "'" : 'null';
    }

    public function sqlString($string)
    {
        return $string ? "'" . $this->connection->escape_string($string) . "'" : "''";
    }
}












