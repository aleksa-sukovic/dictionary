<?php

namespace Aleksa\Language\Models;

class Language
{
    public $id;
    public $code;
    public $label;

    public function __construct($id, $code, $label)
    {
        $this->id = $id;
        $this->code = $code;
        $this->label = $label;
    }
    
    public function __toString()
    {
        return $this->label;
    }

    public function __toArray()
    {
        return [
            'code' => $this->code,
            'label' => $this->label,
        ];
    }
}
