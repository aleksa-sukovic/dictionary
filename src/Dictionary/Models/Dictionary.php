<?php

namespace Aleksa\Dictionary\Models;

class Dictionary
{
    public $id;
    public $languageId;
    public $language;
    public $name;
    public $description;

    public $words;

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

    public function words($params = [], $refresh = false)
    {
        if (!$this->words || $refresh) {
            $this->words = dictionaries()->words($this->id, $params);
        }

        return $this->words;
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
