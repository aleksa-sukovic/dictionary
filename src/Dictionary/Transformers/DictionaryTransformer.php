<?php

namespace Aleksa\Dictionary\Transformers;

use Aleksa\Dictionary\Models\Dictionary;
use Aleksa\Library\Transformers\ObjectTransformer;

class DictionaryTransformer extends ObjectTransformer
{
    protected $fields = [
        'id'            => 'int',
        'name'          => 'string',
        'language_code' => 'string',
        'description'   => 'string:nullable',
    ];

    public function toObject($array)
    {
        return new Dictionary(
            $array['id'] ?? 0,
            $array['language_code'] ?? '',
            $array['name'] ?? '',
            $array['description'] ?? ''
        );
    }
}

