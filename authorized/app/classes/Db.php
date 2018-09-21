<?php
namespace authorized\app\classes;
use PDO;

/**
 * @filename DB.php
 * набор компонентов для работы с БД (Singleton)
 * @author Любомир Пона
 * @copyright 24.09.2013
 * @updated 25.12.2017
 */

class Db extends Config
{
    /** @var $instance Db|null */
    private static $instance = null; // объект для работы с БД
    /** @var $handler PDO */
    private static $handler; // идентефикатор соединения

    // закрываем возможность создания и дублирования объектов
    private function  __construct()
    {
        $this->open_connection();
    }
    private function __clone(){}
    private function __wakeup(){}

    /**
     * Получение объекта для бароты с БД
     * @return Db
     */
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
        /*
         * Записываем в переменные данные
         * из констант класса Config для подключения к БД.
         */

        $db_name = self::DB_NAME;
        $host = self::DB_HOST;
        $username = self::DB_USER;
        $passwd = self::DB_PASS;

        $opt = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        );

        // Далее, пробуем подключиться к БД:
        try
        {
            // присваиваем self::$handler объект класса PDO;
            // конструктору передаём данные для подключения к БД.
            self::$handler = new PDO(
                "mysql:dbname={$db_name};host={$host};charset=UTF8",
                "{$username}",
                "{$passwd}",
                $opt);
        }
        // При неудачной попытке подключения к БД,
        catch (\PDOException $e)
        {
            // выводим сообщение об ошибке
            die($e->getMessage());
        }
    }


    // реализация запроса к БД
    public function sql($query, $emulate = true, ...$params)
    {
        $STH = self::$handler->prepare($query);

        if (!$emulate)
        {
            $STH->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }
        $STH->execute($params);
        $STH->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);

        $result = $STH->fetchAll();
        return $result;
    }
}