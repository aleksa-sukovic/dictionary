<?php

use Aleksa\Library\Exceptions\ValidationException;

require_once '../../autoload.php';

try {
   requestValidator()->validateWithThrow([
       'label' => 'Label is required.',
   ], $_POST);

    $item = wordTypes()->save($_POST);
    redirect('./word-types-edit.php?item=' . $item->id);
} catch (ValidationException $e) {
    if (isset($_POST['id'])) {
        redirect('./word-types-edit.php?item=' . $_POST['id']);
    } else {
        redirect('./word-types-edit.php');
    }
}
