<?php

namespace Aleksa\Dictionary\Repositories;

use Aleksa\Library\Exceptions\ItemNotDeletedException;
use Aleksa\Library\Exceptions\ItemNotSavedException;
use mysqli as MySQL;
use Aleksa\Library\Repositories\ObjectRepository;
use Aleksa\Dictionary\Transformers\DictionaryTransformer;

class DictionaryRepository extends ObjectRepository
{
    protected $tableName  = 'dictionaries';
    protected $primaryKey = 'id';

    public function __construct(MySQL $connection)
    {
        parent::__construct($connection);
        $this->transformer = new DictionaryTransformer($connection);
    }

    public function words($dictionaryId, $params = [])
    {
        $primaryKey = $this->transformer->sqlValue($dictionaryId, 'id');

        $query = "SELECT * FROM words W WHERE EXISTS (SELECT * FROM dictionaries_words DW WHERE DW.word_id = W.id AND DW.dictionary_id = $primaryKey)";
        $filterQuery = $this->filterService->filter($params, $this->transformer);
        $query = $filterQuery ? "$query AND $filterQuery" : $query;

        $result = $this->connection->query($query);

        if (!$result) {
            return [];
        }

        $transformed = words()->transformer->toObjectArray($result);

        mysqli_free_result($result);
        return $transformed;
    }

    public function findWord($wordId, $dictionaryId)
    {
        $primaryKey = $this->transformer->sqlValue($dictionaryId, 'id');
        $wordKey = words()->transformer->sqlValue($wordId, 'id');
        $query   = "SELECT * FROM words W WHERE EXISTS (SELECT * FROM dictionaries_words DW WHERE DW.word_id = $wordKey AND DW.dictionary_id = $primaryKey)";
        $result = $this->connection->query($query);
        $item = $result->fetch_assoc();

        if (!$item) {
            return null;
        }

        $transformed = words()->transformer->toObject($item);
        mysqli_free_result($result);
        return $transformed;
    }

    public function addWord($wordId, $dictionaryId)
    {
        if ($this->findWord($wordId, $dictionaryId)) {
            return;
        }

        $wordKey = words()->transformer->sqlValue($wordId, 'id');
        $dictionaryKey = $this->transformer->sqlValue($dictionaryId, 'id');
        $query = "INSERT INTO dictionaries_words (dictionary_id, word_id) VALUES ($dictionaryKey, $wordKey)";

        $result = $this->connection->query($query);
        if (!$result) throw new ItemNotSavedException("Word with id $wordId could not be added to dictionary $dictionaryId");

        return $this->findWord($wordId, $dictionaryId);
    }

    public function removeWord($wordId, $dictionaryId)
    {
        $wordKey = words()->transformer->sqlValue($wordId, 'id');
        $dictionaryKey = $this->transformer->sqlValue($dictionaryId, 'id');
        $query = "DELETE FROM dictionaries_words WHERE dictionary_id = $dictionaryKey AND word_id = $wordKey";

        $result = $this->connection->query($query);
        if (!$result) throw new ItemNotDeletedException();

        return true;
    }
}













