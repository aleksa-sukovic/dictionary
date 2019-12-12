<?php

namespace Dictionary\Dictionary\Models;

class Dictionary
{
    public $id;
    public $languageCode;
    public $name;
    public $description;

    public function __construct($id, $languageCode, $name, $description = null)
    {
        $this->id = $id;
        $this->languageCode = $languageCode;
        $this->name = $name;
        $this->description = $description;
    }
    
    public function __toString()
    {
        return $this->name;
    }
}
