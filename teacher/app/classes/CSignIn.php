<?php
namespace app\classes;


class CSignIn extends MSignIn
{
    public function signIn($login, $password)
    {
        if ($response = parent::signIn($login, $password))
        {
            $result = mysqli_fetch_assoc($response);
        }

        return $result['id'];
    }
}