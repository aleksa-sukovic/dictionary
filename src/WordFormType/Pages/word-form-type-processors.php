<?php

use Aleksa\Library\Exceptions\ValidationException;

require_once '../../autoload.php';

 try {
     requestValidator()->validateWithThrow([
         'value' => 'Value is required.',
     ], $_POST);

     $item = wordFormTypes()->save($_POST);
     redirect('./word-form-types-edit.php?item=' . $item->id);
 } catch (ValidationException $e) {
     if (isset($_POST['id'])) {
         redirect('./word-form-types-edit.php?item=' . $_POST['id']);
     } else {
         redirect('./word-form-types-edit.php');
     }
 }
