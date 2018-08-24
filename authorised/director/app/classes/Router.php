<?php
namespace director\app\classes;
//use app\interfaces\IRouter as IRouter;

class Router// implements IRouter
{
    public static $authorised = false;

    public function __construct()
    {
        if ($_GET)
        {
            $this->router();
        }
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
            "SELECT id FROM journal.teachers_and_director WHERE login = '{$login}' AND password = '{$password}'";

        self::$authorised['id'] = Db::getInstance()->sql($sql);
        self::$authorised['authorised_as'] = $sign_in_as;
    }
}