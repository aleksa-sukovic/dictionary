<?php

namespace Aleksa\WordTranslation\Models;

class WordTranslation
{
    public $id;
    public $wordId;
    public $languageId;
    public $value;

    public $word;
    public $language;

    public function __construct($id, $value, $wordId, $languageId)
    {
        $this->id = $id;
        $this->value = $value;
        $this->wordId = $wordId;
        $this->languageId = $languageId;
    }

    public function word($refresh = false)
    {
        if ($this->wordId && (!$this->word || $refresh)) {
            $this->word = words()->findById($this->wordId);
        }

        return $this->word;
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
        return $this->value;
    }

    public function __toArray()
    {
        return [
            'id' => $this->id,
            'value' => $this->value,
            'word_id' => $this->wordId,
            'language_id' => $this->languageId,
        ];
    }
}
