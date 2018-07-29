<?php
require_once "views/VSignIn.php";
if (isset($_POST['signIn']))
{
    $_SESSION['authorized'] = $sign_in->signIn($_POST['login'], $_POST['password']);

    header("Location: index.php");
}
