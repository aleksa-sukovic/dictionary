<?php

namespace Aleksa\WordType\Transformers;

use Aleksa\WordType\Models\WordType;
use Aleksa\Library\Transformers\ObjectTransformer;

class WordTypeTransformer extends ObjectTransformer
{
    protected $fields = [
        'id' => 'int',
        'name' => 'string',
        'label' => 'string',
    ];

    public function toObject($array)
    {
        return new WordType(
            $array['id'] ?? 0,
            $array['name'] ?? '',
            $array['label'] ?? ''
        );
    }
}

