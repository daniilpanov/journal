<?php
if (!isset($_SESSION['authorized']))
{
    require_once "routers/authorizationRouter.php";
}
elseif ($_GET['exit'] == 'true')
{
    unset($_SESSION['authorized']);

    header("Location: index.php");
}
else
{

    require_once "views/VMenu.php";

    require_once "routers/users/postRout.php";
    require_once "routers/users/getRout.php";
}