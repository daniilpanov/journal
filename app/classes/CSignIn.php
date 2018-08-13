<?php
namespace app\classes;


class CSignIn extends MSignIn
{
    public function signIn($sign_in_as, $login, $password)
    {
        switch ($sign_in_as)
        {
            case "director";
            case "teacher";
                $table = "teachers_and_director";
            break;

            case "student":
                $table = "students";
            break;
        }

        $response = parent::signIn($table, $login, $password);

        $result = mysqli_fetch_assoc($response);

        echo $result['id'];

        if (empty($result['id']))
        {
            return false;
        }

        $result['sign_in_as'] = $sign_in_as;

        return $result;
    }
}