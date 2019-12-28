<?php

require_once '../../autoload.php';

if (isset($_GET['item'])) {
    wordTranslations()->destroy($_GET['item']);
}

redirect('../../Word/Pages/words-edit.php?item=' . $_GET['word']);
