<?php
require_once "views/VSignIn.php";

if ($_POST)
{
    if (isset($_POST['signIn']))
    {
        // Вызываем метод для получения id и "тип" вошедшего ( "типы" : ученик, учитель, директор )
        $_SESSION['authorised'] = $sign_in->signIn($_POST['signInAs'], $_POST['login'], $_POST['password']);

        // Делаем перезагрузку чтобы обновился массив $_SESSIONS
        header("Location: http://localhost/journal/");

        // Проверяем "тип" вошедшего -- каждого надо переадресовывать В СВОИ ДИРЕКТОРИИ
        switch ($_SESSION['authorised']['sign_in_as'])
        {
            case 'student':
                header("Location: http://localhost/journal");
            break;

            case 'teacher':
                header("Location: http://localhost/journal/teacher");
            break;

            case 'director':
                header("Location: http://localhost/journal/director");
            break;
        }
    }
}