<?php

namespace Aleksa\Dictionary\Models;

class Dictionary
{
    public $id;
    public $languageId;
    public $language;
    public $name;
    public $description;

    public function __construct($id, $languageId, $name, $description = null)
    {
        $this->id = $id;
        $this->languageId = $languageId;
        $this->name = $name;
        $this->description = $description;
    }

    public function language($refresh = false)
    {
        if ($this->languageId && (!$this->language || $refresh)) {
            $this->language = languages()->findById($this->languageId);
        }

        return $this->language;
    }

    public function __toString()
    {
        return $this->name;
    }

    public function __toArray()
    {
        return [
            'id' => $this->id,
            'language_id' => $this->languageId,
            'name' => $this->name,
            'description' => $this->description,
        ];
    }
}
