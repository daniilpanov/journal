<?php
namespace app\classes;


class MSignIn
{
    /**
     * @param string $login
     * @param string $password
     * @return array|\mysqli_result
     */
    protected function signIn($login, $password)
    {
        $sql = "SELECT id FROM journal.students WHERE login = '{$login}' AND password = '{$password}'";

        $result = Db::getInstance()->sql($sql);

        return $result;
    }
}