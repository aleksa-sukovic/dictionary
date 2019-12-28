<?php

namespace Aleksa\WordForm\Transformers;

use Aleksa\WordForm\Models\WordForm;
use Aleksa\Library\Transformers\ObjectTransformer;

class WordFormTransformer extends ObjectTransformer
{
    protected $fields = [
        'id' => 'int',
        'value' => 'string',
        'type_id' => 'int',
        'state_id' => 'int',
        'word_translation_id' => 'int',
    ];

    public function toObject($array)
    {
        return new WordForm(
            $array['id'] ?? 0,
            $array['value'] ?? '',
            $array['type_id'] ?? 0,
            $array['state_id'] ?? 0,
            $array['word_translation_id'] ?? 0,
        );
    }
}

