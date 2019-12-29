<?php

namespace Aleksa\Word\Repositories;

use Aleksa\Library\Exceptions\ItemNotFoundException;
use mysqli as MySQL;
use Aleksa\Library\Repositories\ObjectRepository;
use Aleksa\Word\Transformers\WordTransformer;

class WordRepository extends ObjectRepository
{
    protected $tableName  = 'words';
    protected $primaryKey = 'id';

    public function __construct(MySQL $connection)
    {
        parent::__construct($connection);
        $this->transformer = new WordTransformer($connection);
    }

    public function findBySlug($slug)
    {
        $value = $this->transformer->sqlValue($slug, 'slug');
        $query = "SELECT * FROM $this->tableName WHERE slug = $value";

        $result = $this->connection->query($query);
        $item = $result->fetch_assoc();

        if (!$item) {
            throw new ItemNotFoundException();
        }

        $transformed = $this->transformer->toObject($item);
        mysqli_free_result($result);
        return $transformed;
    }

    public function availableLanguages($id)
    {
        $primaryKey = $this->transformer->sqlValue($id, $this->primaryKey);
        $query = "SELECT * FROM languages L WHERE EXISTS (SELECT * FROM word_translations WT WHERE WT.word_id = $primaryKey AND WT.language_id = L.id)";
        $result = $this->connection->query($query);

        if (!$result) {
            return [];
        }

        $transformed = languages()->transformer->toObjectArray($result);

        mysqli_free_result($result);
        return $transformed;
    }

    public function search($q, $languageId)
    {
        $query  = "SELECT * FROM words W ";

        if ($q && $languageId) {
            $query .= "WHERE W.value LIKE '$q' AND EXISTS (SELECT * FROM word_translations WT WHERE WT.word_id = W.id AND WT.language_id = $languageId)";
        } else if ($q) {
            $query .= "WHERE W.value LIKE '$q'";
        } else if ($languageId) {
            $query .= "WHERE EXISTS (SELECT * FROM word_translations WT WHERE WT.word_id = W.id AND WT.language_id = $languageId)";
        }

        $result = $this->connection->query($query);

        if (!$result) {
            return [];
        }

        $transformed = $this->transformer->toObjectArray($result);

        mysqli_free_result($result);
        return $transformed;
    }

    public function create($params)
    {
        if (!empty($params['value']) && empty($data['slug'])) {
            $params['slug'] = $this->generateSlug($params['value']);
        }

        return parent::create($params); // TODO: Change the autogenerated stub
    }

    public function update($data)
    {
        if (!empty($data['value']) && empty($data['slug'])) {
            $data['slug'] = $this->generateSlug($data['value']);
        }

        return parent::update($data); // TODO: Change the autogenerated stub
    }

    public function generateSlug($value, $postfix = 0)
    {
        $value = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $value)));
        $slug = $postfix ? $value . '-' . $postfix : $value;

        try {
            $this->findBySlug($slug);

            return $this->generateSlug($value, $postfix + 1);
        } catch (ItemNotFoundException $e) {
            return $slug;
        }
    }
}













