<?php

namespace Aleksa\WordFormState\Transformers;

use Aleksa\WordFormState\Models\WordFormState;
use Aleksa\Library\Transformers\ObjectTransformer;

class WordFormStateTransformer extends ObjectTransformer
{
    protected $fields = [
        'id' => 'int',
        'value' => 'string',
    ];

    public function toObject($array)
    {
        return new WordFormState(
            $array['id'] ?? 0,
            $array['value'] ?? '',
        );
    }
}

