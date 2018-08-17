<?php
namespace app\classes;


class CSignIn extends MSignIn
{
    public function signIn($authorised_as, $login, $password)
    {
        $table = null;

        switch ($authorised_as)
        {
            case 'teacher';
            case 'director':
                $table = "teachers_and_director";
                break;

            case 'student':
                $table = 'students';
                break;
        }

        $response = parent::signIn($table, $login, $password);

        $result = mysqli_fetch_assoc($response);
        $result['authorised_as'] = $authorised_as;

        return $result;
    }
}