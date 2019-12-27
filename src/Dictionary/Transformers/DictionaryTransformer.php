<?php

namespace Aleksa\Dictionary\Transformers;

use Aleksa\Dictionary\Models\Dictionary;
use Aleksa\Library\Transformers\ObjectTransformer;

class DictionaryTransformer extends ObjectTransformer
{
    protected $fields = [
        'id'            => 'int',
        'name'          => 'string',
        'language_id'   => 'int',
        'description'   => 'string:nullable',
    ];

    public function toObject($array)
    {
        return new Dictionary(
            $array['id'] ?? 0,
            $array['language_id'] ?? '',
            $array['name'] ?? '',
            $array['description'] ?? ''
        );
    }
}

