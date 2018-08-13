<?php
if ($_GET['exit'] == 'true')
{
    unset($_SESSION['authorised']);

    header("Location: http://localhost/journal/index.php");
}

if ($_SESSION['authorised'] !== false)
{
    echo $_SESSION['authorised'] === false;
    require_once "views/VMenu.php";

    require_once "routers/postRout.php";
    require_once "routers/getRout.php";
}