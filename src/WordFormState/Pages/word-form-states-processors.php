<?php

use Aleksa\Library\Exceptions\ValidationException;

require_once '../../autoload.php';

try {
    requestValidator()->validateWithThrow([
        'value' => 'Value is required.',
    ], $_POST);

    $item = wordFormStates()->save($_POST);
    redirect('./word-form-states-edit.php?item=' . $item->id);
} catch (ValidationException $e) {
    if (isset($_POST['id'])) {
        redirect('./word-form-states-edit.php?item=' . $_POST['id']);
    } else {
        redirect('./word-form-states-edit.php');
    }
}
