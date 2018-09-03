<?php
namespace authorized\app\classes;

class Router
{
    /** @var $content array */
    public $content = array();

    /**
     * @return void
     */
    public function __construct()
    {
        $this->router();
    }
    /**
     * @return void
     */
    private function router()
    {

    }

    /**
     * @param string $part
     * @return void
     */
    public function printContent($part = 'content')
    {
        if ($part == 'content')
        {
            require_once "{$_SESSION['authorized']['authorized_as']}/views/{$this->content['content']}.php";
        }
        else
        {
            echo $this->content[$part];
        }
    }

    /**
     * @param $login string
     * @param $password string
     * @param $sign_in_as string
     * @return array|\mysqli_result|false
     */
    public static function authorization($login, $password, $sign_in_as)
    {
        /**
         * Переменная для записи в неё результата
         * авторизации и последующего его возвращения
         * @var $authorized array|false
         -----------------------------------------------
         * Переменная для записи в неё таблицы БД,
         * из которой мы будем запрашивать id пользователя
         * @var $table string|false
         */
        $authorized = false;
        $table = false;

        // Из какой таблицы мы будем запрашивать id пользователя
        switch ($sign_in_as)
        {
            case "director";
            case "teacher":
                $table = "teachers_and_director";
                break;
            case "student":
                $table = "students";
        }

        // Если удалось подобрать таблицу, то
        if ($table !== false)
        {
            // ШИФРОВКА ПАРОЛЯ:
            /*
             * создаём массив с 'солью'
             * (для того, чтобы уж точно не разшифровали значения из БД).
             */
            $salt =
                array (
                    "!@salt№1`^$3#^*|\|=++|=><-/`~!!_=+_locTrdVnbd",
                    "!@salt№2**|\+/=\g/&_?md5(^#)&?>><->=pqsGnHaj!",
                );
            /* И, наконец, сама шифровка:
             * 1. Шифруем первую 'соль'
             * 2. Шифруем пароль
             * 3. Шифруем вторую 'соль'
             * 4. Шифруем полученные результаты вместе,
             * и записываем иж в переменную $password.
             */
            $password = md5(md5($salt[0]) . md5($password) . md5($salt[1]));

            // Далее - sql-запрос.
            $sql = /** @lang MySQL */
                "SELECT id FROM journal.{$table} WHERE login = '{$login}' AND password = '{$password}'";

            //
            if ($user_id = mysqli_fetch_assoc(Db::getInstance()->sql($sql))['id'])
            {
                //
                $authorized['id'] = $user_id;
                //
                $authorized['authorized_as'] = $sign_in_as;
            }
        }

        return $authorized;
    }
}