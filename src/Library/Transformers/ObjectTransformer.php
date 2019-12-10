<?php

namespace Dictionary\Library\Transformers;

use mysqli_result as MySqlResult;

abstract class ObjectTransformer
{
    public abstract function transform($array);

    public function transformMany(MySqlResult $set)
    {
        $output = [];

        while ($item = $set->fetch_assoc()) {
            $output[] = $this->transform($item);
        }

        return $output;
    }
}












