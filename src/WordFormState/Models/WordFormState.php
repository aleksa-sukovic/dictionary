<?php

namespace Aleksa\WordFormState\Models;

class WordFormState
{
    public $id;
    public $value;

    public function __construct($id, $value)
    {
        $this->id = $id;
        $this->value = $value;
    }
    
    public function __toString()
    {
        return $this->value;
    }

    public function __toArray()
    {
        return [
            'id' => $this->id,
            'value' => $this->value,
        ];
    }
}
