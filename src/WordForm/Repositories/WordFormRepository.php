<?php

namespace Aleksa\WordForm\Repositories;

use mysqli as MySQL;
use Aleksa\Library\Repositories\ObjectRepository;
use Aleksa\WordForm\Transformers\WordFormTransformer;

class WordFormRepository extends ObjectRepository
{
    protected $tableName  = 'word_forms';
    protected $primaryKey = 'id';

    public function __construct(MySQL $connection)
    {
        parent::__construct($connection);
        $this->transformer = new WordFormTransformer($connection);
    }

    public function forTranslation($id, $params = [])
    {
        $id = wordTranslations()->transformer->sqlValue($id, 'id');
        $query = "SELECT * FROM word_forms WF WHERE WF.word_translation_id = $id";

        $filterQuery = $this->filterService->filter($params, $this->transformer);
        $query = $filterQuery ? "$query AND $filterQuery" : $query;

        $result = $this->connection->query($query);

        if (!$result) {
            return [];
        }

        $transformed = $this->transformer->toObjectArray($result);
        mysqli_free_result($result);

        return $transformed;
    }
}













