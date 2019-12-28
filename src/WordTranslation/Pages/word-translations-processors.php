<?php

use Aleksa\Library\Exceptions\ItemNotFoundException;
use Aleksa\Library\Exceptions\ValidationException;

require_once '../../autoload.php';

$validationParams = [
    'value' => 'Value is required.',
    'language_id' => 'Language is required.',
    'word_id' => 'You must specify word.',
    'unique' => function ($params) {
        try {
            if (!isset($params['word_id']) || !isset($params['language_id'])) {
                throw new Exception();
            }

            wordTranslations()->find($params['word_id'], $params['language_id'], $params['id'] ?? null);

            return "Translation for this language already exists.";
        } catch (ItemNotFoundException|Exception $e) {
            return null;
        }
    }
];

try {
    requestValidator()->validateWithThrow($validationParams, $_POST);

    $item = wordTranslations()->save($_POST);
    redirect('../../Word/Pages/words-edit.php?item=' . $item->wordId);
} catch (ValidationException $e) {
    if (isset($_POST['id'])) {
        redirect('./word-translations-edit.php?item=' . $_POST['id']);
    } else if (isset($_POST['word_id'])) {
        redirect('./word-translations-edit.php?word=' . $_POST['word_id']);
    } else {
        redirect('./word-translations-edit.php');
    }
}
