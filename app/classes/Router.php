<?php
namespace app\classes;


class Router
{
    public function __construct()
    {
        if (!isset($_SESSION['authorised']['id']))
        {
            if ($_SESSION['authorised'] = $this->authorisationRouter())
            {
                echo "<script>";
                echo "document.location.href='http://localhost/journal';";
                echo "</script>";
            }
        }
        elseif (isset($_SESSION['authorised']['id']))
        {
            $this->userRouter();
        }
        // Если пользователь пожелал выйти:
        if (isset($_GET['exit']))
        {
            unset($_SESSION['authorised']);

            echo "<script>";
            echo "document.location.href='http://localhost/journal';";
            echo "</script>";
        }
    }

    private function authorisationRouter()
    {
        $authorised = false;

        if (!$authorised)
        {
            require_once "views/VSignIn.php";
        }

        if (isset($_POST['signIn']))
        {
            $sign_in = new CSignIn();
            $authorised = $sign_in->signIn($_POST['sign_in_as'], $_POST['login'], $_POST['password']);
            return $authorised;
        }
    }
    private function userRouter()
    {
        require_once ("authorised/" . $_SESSION['authorised']['authorised_as'] . "/index.php");
    }
}