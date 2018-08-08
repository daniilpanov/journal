<?php
header("Cache-Control: no-cache, must-revalidate");

session_start();

spl_autoload_register(function ($namespace) {
    // конвертируем полный путь в пространстве имён с \ в /
    $path = str_replace('\\', '/', $namespace);
    require_once($path.'.php');
});

// FIRST CONTROLLERS FOR
// <p>  SIGN IN  </p>
    $sign_in = new \app\classes\CSignIn();
// AND <p>  SIGN UP  </p>
    $sign_up = new \app\classes\CSignUp();

// ANOTHER CONTROLLERS:
    $students = new \app\classes\CStudents(); // Students
    $subjects = new \app\classes\CSubjects(); // Subjects