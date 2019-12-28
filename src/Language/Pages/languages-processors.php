<?php

use Aleksa\Library\Exceptions\ValidationException;

require_once '../../autoload.php';

try {
    requestValidator()->validateWithThrow([
        'code'  => 'Code is required.',
        'label' => 'Label is required',
    ], $_POST);

    $language = languages()->save($_POST);
    redirect('./languages-edit.php?item=' . $language->id);
} catch (ValidationException $e) {
    if (isset($_POST['id'])) {
        redirect('./languages-edit.php?item=' . $_POST['id']);
    } else {
        redirect('./languages-edit.php');
    }
}
