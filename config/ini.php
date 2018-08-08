<?php
header("Cache-Control: no-cache, must-revalidate");

session_start();

spl_autoload_register(function ($name) {
    // конвертируем полный путь в пространстве имён с \ в /
    $name = str_replace('\\', '/', $name);
    require_once($name.'.php');
});

// FIRST CONTROLLERS FOR
// <p>  SIGN IN  </p>
    $sign_in = new \app\classes\CSignIn();
// AND <p>  SIGN UP  </p>
    $sign_up = new \app\classes\CSignUp();

// ANOTHER CONTROLLERS:
    $journal_list = new \app\classes\CJournalList(); // для работы с журналом
