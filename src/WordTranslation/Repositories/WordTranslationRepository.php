<?php

namespace Aleksa\WordTranslation\Repositories;

use Aleksa\Library\Exceptions\ItemNotFoundException;
use mysqli as MySQL;
use Aleksa\Library\Repositories\ObjectRepository;
use Aleksa\WordTranslation\Transformers\WordTranslationTransformer;

class WordTranslationRepository extends ObjectRepository
{
    protected $tableName  = 'word_translations';
    protected $primaryKey = 'id';

    public function __construct(MySQL $connection)
    {
        parent::__construct($connection);
        $this->transformer = new WordTranslationTransformer($connection);
    }

    public function forWord($id)
    {
        $id = words()->transformer->sqlValue($id, 'id');
        $query = "SELECT * FROM word_translations WT WHERE WT.word_id = $id";
        $result = $this->connection->query($query);

        if (!$result) {
            return [];
        }

        $transformed = $this->transformer->toObjectArray($result);
        mysqli_free_result($result);

        return $transformed;
    }

    public function find($wordId, $languageId, $excludeId = null)
    {
        $wordId = $this->transformer->sqlValue($wordId, 'word_id');
        $languageId = $this->transformer->sqlValue($languageId, 'language_id');
        $query = "SELECT * FROM word_translations WT WHERE WT.word_id = $wordId AND WT.language_id = $languageId";

        if ($excludeId) {
            $excludeId = $this->transformer->sqlValue($excludeId, 'id');
            $query .= " AND WT.id != $excludeId";
        }

        $result = $this->connection->query($query);
        $item = $result->fetch_assoc();

        if (!$item) {
            throw new ItemNotFoundException();
        }

        $transformed = $this->transformer->toObject($item);
        mysqli_free_result($result);
        return $transformed;
    }
}













