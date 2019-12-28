<?php

namespace Aleksa\Word\Models;

class Word
{
    public $id;
    public $slug;
    public $value;
    public $typeId;
    public $type;

    public $translations;

    public function __construct($id, $slug, $value, $typeId)
    {
        $this->id = $id;
        $this->slug = $slug;
        $this->value = $value;
        $this->typeId = $typeId;
    }

    public function type($refresh = false)
    {
        if ($this->typeId && (!$this->type || $refresh)) {
            $this->type = wordTypes()->findById($this->typeId);
        }

        return $this->type;
    }

    public function availableLanguages()
    {
        return words()->availableLanguages($this->id);
    }

    public function translations($refresh = false)
    {
        if (!$this->translations || $refresh) {
            $this->translations = wordTranslations()->forWord($this->id);
        }

        return $this->translations;
    }

    public function __toString()
    {
        return $this->value;
    }

    public function __toArray()
    {
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'value' => $this->value,
            'type_id' => $this->typeId,
        ];
    }
}
