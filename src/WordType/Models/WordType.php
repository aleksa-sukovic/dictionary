<?php

namespace Aleksa\WordType\Models;

class WordType
{
    public $id;
    public $name;
    public $label;

    public function __construct($id, $name, $label)
    {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
    }
    
    public function __toString()
    {
        return $this->label;
    }

    public function __toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'label' => $this->label,
        ];
    }
}
