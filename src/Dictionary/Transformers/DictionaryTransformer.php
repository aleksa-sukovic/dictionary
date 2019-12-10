<?php

namespace Dictionary\Dictionary\Transformers;

use Dictionary\Dictionary\Models\Dictionary;
use Dictionary\Library\Transformers\ObjectTransformer;

class DictionaryTransformer extends ObjectTransformer
{
    public function transform($array)
    {
        return new Dictionary(
            $array['id'],
            $array['language_code'],
            $array['name'],
            $array['description']
        );
    }
}
