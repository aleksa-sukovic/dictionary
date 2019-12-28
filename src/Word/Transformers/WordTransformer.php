<?php

namespace Aleksa\Word\Transformers;

use Aleksa\Word\Models\Word;
use Aleksa\Library\Transformers\ObjectTransformer;

class WordTransformer extends ObjectTransformer
{
    protected $fields = [
        'id' => 'int',
        'slug' => 'string',
        'value' => 'string',
        'type_id' => 'int',
    ];

    public function toObject($array)
    {
        return new Word(
            $array['id'] ?? 0,
            $array['slug'] ?? '',
            $array['value'] ?? '',
            $array['type_id'] ?? 0,
        );
    }
}

