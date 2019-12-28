<?php

require_once '../../autoload.php';

if (isset($_GET['item'])) {
    wordForms()->destroy($_GET['item']);
}

redirect('/WordTranslation/Pages/word-translations-edit.php?item=' . $_GET['translation']);
