<?php
namespace teacher\app\classes;

class Router
{
    public static $authorized = false;

    public function __construct()
    {
        $this->router();
    }
    private function router()
    {

    }

    /**
     * @param $login string
     * @param $password string
     * @param $sign_in_as string
     * @return void
     */
    public static function authorisation($login, $password, $sign_in_as)
    {
        $salt =
            array (
                "!@salt№1`^$3#^*|\|=++|=><-/`~!!_=+_locTrdVnbd",
                "!@salt№2**|\+/=\g/&_?md5(^#)&?>><->=pqsGnHaj!",
            );

        $password = md5(md5($salt[0]) . md5($password) . md5($salt[1]));

        $sql = /** @lang MySQL */
            "SELECT id FROM journal.students WHERE login = '{$login}' AND password = '{$password}'";

        if ($user_id = mysqli_fetch_assoc(Db::getInstance()->sql($sql))['id'])
        {
            self::$authorized['id'] = $user_id;
            self::$authorized['authorized_as'] = $sign_in_as;
        }
    }
}