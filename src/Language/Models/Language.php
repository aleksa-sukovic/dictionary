<?php

namespace Dictionary\Language\Models;

class Language
{
    public $code;
    public $label;

    public function __construct($code, $label)
    {
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
