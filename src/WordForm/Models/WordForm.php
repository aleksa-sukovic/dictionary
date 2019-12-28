<?php

namespace Aleksa\WordForm\Models;

use Aleksa\WordFormState\Models\WordFormState;
use Aleksa\WordFormType\Models\WordFormType;
use Aleksa\WordTranslation\Models\WordTranslation;

class WordForm
{
    public $id;
    public $value;
    public $typeId;
    public $stateId;
    public $translationId;

    public ?WordFormType $type = null;
    public ?WordFormState $state = null;
    public ?WordTranslation $translation = null;

    public function __construct($id, $value, $typeId, $stateId, $translationId)
    {
        $this->id = $id;
        $this->value = $value;
        $this->typeId = $typeId;
        $this->stateId = $stateId;
        $this->translationId = $translationId;
    }

    public function type($refresh = false): WordFormType
    {
        if ($this->typeId && (!$this->type || $refresh)) {
            $this->type = wordFormTypes()->findById($this->typeId);
        }

        return $this->type;
    }

    public function state($refresh = false): WordFormState
    {
        if ($this->stateId && (!$this->state || $refresh)) {
            $this->state = wordFormStates()->findById($this->stateId);
        }

        return $this->state;
    }

    public function translation($refresh = false): WordTranslation
    {
        if ($this->translationId && (!$this->translation || $refresh)) {
            $this->translation = wordTranslations()->findById($this->translationId);
        }

        return $this->translation;
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
            'type_id' => $this->typeId,
            'state_id' => $this->stateId,
            'word_translation_id' => $this->translationId,
        ];
    }
}
