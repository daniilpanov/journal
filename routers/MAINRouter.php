<?php
if ($_SESSION['authorized'])
{
    echo "<p><a href='?exit=true'>Назад</a></p>";

    require_once "routers/userRouter.php";
}
else
{
    require_once "routers/authorizationRouter.php";
}