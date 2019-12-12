<?php

namespace Dictionary\Dictionary\Transformers;

use Dictionary\Dictionary\Models\Dictionary;
use Dictionary\Library\Transformers\ObjectTransformer;

class DictionaryTransformer extends ObjectTransformer
{
    protected $fields = [
        'id' => 'int',
        'name' => 'string',
        'language_code' => 'string',
        'description' => 'string',
    ];

    public function transform($array)
    {
        return new Dictionary(
            $array['id'],
            $array['language_code'],
            $array['name'],
            $array['description']
        );
    }

    public function transformToArray($object)
    {
        return [
            'id' => $object->id,
            'language_code' => $this->transformString($object->languageCode),
            'name' => $this->transformNullableString($object->name),
            'description' => $this->transformNullableString($object->description),
        ];
    }
}

