<?php
session_start();
if(isset($_POST['exit']))
{
    unset($_SESSION['authorized']);
}
header("Location: index.php");