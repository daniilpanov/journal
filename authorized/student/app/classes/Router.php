<?php
namespace student\app\classes;

class Router
{
    /**
     *
     * @var array|false $authorized
     */
    public static $authorized = false;

    /**
     *
     * @var array|null $content
     */
    public $content = null;

    public function __construct()
    {
        $this->router();
    }

    /**
     * ROUTER  --  МАРШРУТИЗАТОР
     * @return void
     */
    private function router()
    {
        if ($_GET)
        {
            /** @var array $content */
            $content = array();

            foreach ($_GET as $views_dir => $item)
            {
                switch ($views_dir)
                {
                    case "page":

                        break;
                    default:
                        $content = $this->switcher($views_dir, $item);
                        break;
                }
            }

            $this->content = $content;
        }
    }
    /**
     * @param $dir string
     * @param $page string
     * @return array
     */
    private function switcher($dir, $page)
    {
        /** @var array $view */
        $view = array (
            'path' =>
                /** @lang text */
                "{$dir}/",
            'title' =>
                /** @lang HTML */
                "&starf;"
        );

        switch ($page)
        {
            case "list":
                $view['path'] .= "VList.php";
                $view['title'] .= " | list";
                break;
            case "add":
                $view['path'] .= "VAdd.php";
                $view['title'] .= " | add";
                break;
            case "delete":
                $view['path'] .= "VDelete.php";
                $view['title'] .= " | delete";
                break;
        }

        return $view;
    }


    /**
     * Этот статический метод используется
     * для авторизации пользователя
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