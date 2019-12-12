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

    public abstract function transform($array);
    public abstract function transformToArray($object);

    public function transformMany(MySqlResult $set)
    {
        $output = [];

        while ($item = $set->fetch_assoc()) {
            $output[] = $this->transform($item);
        }

        return $output;
    }

    public function transformField($value, $fieldName)
    {
        if (!isset($this->fields[$fieldName])) {
            die('Field not found.');
        }

        switch ($this->fields[$fieldName]) {
            case 'int':
                return intval($value);
            case 'string':
                return "'" . $this->connection->escape_string($value) . "'";
            default:
                return null;
        }
    }

    public function transformNullableString($string)
    {
        return $string ? "'" . $this->connection->escape_string($string) . "'" : 'null';
    }

    public function transformString($string)
    {
        return $string ? "'" . $this->connection->escape_string($string) . "'" : "''";
    }
}












