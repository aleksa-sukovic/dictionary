<?php

namespace Aleksa\Language\Transformers;

use Aleksa\Language\Models\Language;
use Aleksa\Library\Transformers\ObjectTransformer;

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

