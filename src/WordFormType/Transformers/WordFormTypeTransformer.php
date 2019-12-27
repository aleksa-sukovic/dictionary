<?php

namespace Aleksa\WordFormType\Transformers;

use Aleksa\WordFormType\Models\WordFormType;
use Aleksa\Library\Transformers\ObjectTransformer;

class WordFormTypeTransformer extends ObjectTransformer
{
    protected $fields = [
        'id' => 'int',
        'value' => 'string',
    ];

    public function toObject($array)
    {
        return new WordFormType(
            $array['id'] ?? 0,
            $array['value'] ?? '',
        );
    }
}

