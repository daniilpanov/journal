<?php
namespace authorized\app\classes;

/**
 * @filename DB.php
 * набор компонентов для работы с БД (Singleton)
 * @author Любомир Пона
 * @copyright 24.09.2013
 * @updated 25.12.2017
 */

class Db extends Config
{
    private static $instance = null; // объект для работы с БД
    /** @var $DBH \PDO */
    private static $DBH; // идентефикатор соединения
    private static $DSN = "mysql:host=".self::DB_HOST.";dbname=".self::DB_NAME.";charset=".self::SQLCHARSET;
    private static $OPT = [
        \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    ];

    // закрываем возможность создания и дублирования объектов
    private function  __construct()
    {
        $this->open_connection();
    }
    private function __clone(){}
    private function __wakeup(){}

    // объект для работы с БД
    public static function getInstance()
    {
        if (self::$instance === null)
        {
            self::$instance = new self();
        }

        return self::$instance;

    }

    // соединяемся с БД
    private function open_connection()
    {
        try
        {
            self::$DBH = new \PDO(self::$DSN,self::DB_USER,self::DB_PASS,self::$OPT);
        }
        catch(\PDOException $e)
        {
            echo "Извините, но операция подключения к БД не может быть выполнена";
            file_put_contents('DBlogs.txt',$e->getMessage()."\n",FILE_APPEND);
        }

    }

    // реализация запроса к БД
    public function sql($query, $params = NULL, $emulate = true)
    {
        if ($params!=NULL)
        {
            $STH =  self::$DBH->prepare($query);

            self::$DBH->setAttribute(\PDO::ATTR_EMULATE_PREPARES, $emulate);
            $STH->execute($params);
            return $STH;
        }
        else
        {
            $STH = self::$DBH->query($query);
            return $STH;
        }


    }



}
?>

