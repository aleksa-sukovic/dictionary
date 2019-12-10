<?php

namespace Dictionary\Dictionary\Models;

class Dictionary
{
    protected $id;
    protected $languageCode;
    protected $name;
    protected $description;

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
