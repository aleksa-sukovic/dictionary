<?php

namespace Dictionary\Language\Transformers;

use Dictionary\Language\Models\Language;
use Dictionary\Library\Transformers\ObjectTransformer;

class LanguageTransformer extends ObjectTransformer
{
    protected $fields = [
        'code' => 'string',
        'label' => 'string',
    ];

    public function toObject($array)
    {
        return new Language(
            $array['code'] ?? 0,
            $array['label'] ?? ''
        );
    }
}

