<?php

namespace Aleksa\Library\Services;

use Aleksa\Library\Transformers\ObjectTransformer;

class FilterService
{
    public function filter(array $params, ObjectTransformer $transformer): string
    {
        $params = array_filter($params, function ($value) {
            return $value;
        }, ARRAY_FILTER_USE_BOTH);

        $params = array_map(function ($key) use ($params, $transformer) {
            if ($params[$key][0] == '!') {
                return $key . ' != ' . $transformer->sqlValue(substr($params[$key], 1), $key);
            } else {
                return $key . ' = ' . $transformer->sqlValue($params[$key], $key);
            }
        }, array_keys($params));

        return implode(' AND ', $params);
    }
}
