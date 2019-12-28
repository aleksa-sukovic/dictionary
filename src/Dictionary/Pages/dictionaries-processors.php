<?php

use Aleksa\Library\Exceptions\ValidationException;

require_once '../../autoload.php';

try {
    requestValidator()->validateWithThrow([
        'name'        => 'Name is required.',
        'language_id' => 'Language is required',
    ], $_POST);

    $item = dictionaries()->save($_POST);
    redirect('./dictionaries-edit.php?item=' . $item->id);
} catch (ValidationException $e) {
    if (isset($_POST['id'])) {
        redirect('./dictionaries-edit.php?item=' . $_POST['id']);
    } else {
        redirect('./dictionaries-edit.php');
    }
}
