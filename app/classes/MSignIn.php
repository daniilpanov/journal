<?php
namespace app\classes;


class MSignIn
{
    protected function signIn($table, $login, $password)
    {
        $sql = "SELECT id FROM journal.{$table} WHERE login = '{$login}' AND password = '{$password}'";
        $result = Db::getInstance()->sql($sql);
        return $result;
    }
}