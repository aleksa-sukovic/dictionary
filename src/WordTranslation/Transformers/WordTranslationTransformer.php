<?php

namespace Aleksa\WordTranslation\Transformers;

use Aleksa\WordTranslation\Models\WordTranslation;
use Aleksa\Library\Transformers\ObjectTransformer;

class WordTranslationTransformer extends ObjectTransformer
{
    protected $fields = [
        'id' => 'int',
        'value' => 'string',
        'word_id' => 'int',
        'language_id' => 'int',
    ];

    public function toObject($array)
    {
        return new WordTranslation(
            $array['id'] ?? 0,
            $array['value'] ?? '',
            $array['word_id'] ?? 0,
            $array['language_id'] ?? 0,
        );
    }
}

