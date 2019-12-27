<?php

namespace Aleksa\Language\Transformers;

use Aleksa\Language\Models\Language;
use Aleksa\Library\Transformers\ObjectTransformer;

class LanguageTransformer extends ObjectTransformer
{
    protected $fields = [
        'id' => 'int',
        'code' => 'string',
        'label' => 'string',
    ];

    public function toObject($array)
    {
        return new Language(
            $array['id'] ?? 0,
            $array['code'] ?? '',
            $array['label'] ?? ''
        );
    }
}

