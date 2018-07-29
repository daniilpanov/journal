<?php
//
session_start();

function __autoload($namespace)
{
    // конвертируем полный путь в пространстве имён с \ в /
    $namespace = str_replace('\\', '/', $namespace);
    require_once($namespace.'.php');
}
// FIRST CONTROLLERS
// <p>  SIGN IN:  </p>
$sign_in = new \app\classes\CSignIn();
// AND <p>  SIGN UP:  </p>
$sign_up = new \app\classes\CSignUp();

// ANOTHER CONTROLLERS:
$students = new \app\classes\CStudents(); // Students
$subjects = new \app\classes\CSubjects(); // Subjects