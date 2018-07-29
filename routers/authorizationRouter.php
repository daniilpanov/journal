<?php
require_once "views/VSignIn.php";

if ($_POST)
{
    if (isset($_POST['auth']))
    {
        $_SESSION['authorized'] = $sign_in->signIn($_POST['login'], $_POST['password']);
        header("Location: index.php");
    }
}