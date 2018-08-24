<?php
namespace app\interfaces;


interface IRouter
{
    /**
     *
     *
     */
    public function __construct();

    /**
     *
     *
     *
     */
    public function router();

    /**
     * @param $login string
     * @param $password string
     * @param $sign_in_as string
     * @return void
     */
    public static function authorisation($login, $password, $sign_in_as);
}