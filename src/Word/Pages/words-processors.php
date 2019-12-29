<?php

use Aleksa\Library\Exceptions\ValidationException;

require_once '../../autoload.php';

try {
   requestValidator()->validateWithThrow([
       'value'   => 'Value is required.',
       'type_id' => 'Word type is required.',
   ], $_POST);

    $word = words()->save($_POST);
    redirect('./words-edit.php?item=' . $word->id);
} catch (ValidationException $e) {
    if (isset($_POST['id'])) {
        redirect('./words-edit.php?item=' . $_POST['id']);
    } else {
        redirect('./words-edit.php');
    }
}
