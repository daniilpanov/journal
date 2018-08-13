<?php
// Если посетитель авторизировался
if (isset($_SESSION['authorised']))
{
    // подключаем роутер для авторизированого пользователя.
    require_once "routers/userRouter.php";
}
// Иначе:
else
{
    // подключаем роутер для авторизации
    require_once "routers/authorisationRouter.php";
}