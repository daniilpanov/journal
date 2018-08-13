<?php
namespace app\classes;


class MSignIn
{
    /**
     * @param string $table
     * @param string $login
     * @param string $password
     * @return array|\mysqli_result
     */
    protected function signIn($table, $login, $password)
    {
        $sql = "SELECT `id` FROM journal.{$table} WHERE login = '{$login}' AND password = '{$password}'";
        echo $sql;
        $result['id'] = Db::getInstance()->sql($sql);

        return $result;
    }
}