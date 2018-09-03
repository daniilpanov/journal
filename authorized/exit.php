<?php
// Если пользователь зашел сюда по ссылке, то
if(isset($_POST['exit']))
{
    /*
     * для возможности удаления элементов из $_SESSION
     * вызываем функцию session_start()
     */
    session_start();
    // и удаляем нужный нам элемент.
    unset($_SESSION['authorized']);
}
/*
 * В любом случае, здесь мы делаем переадресацию на index.php
 * (коренной файл в папке authorized).
 * И если $_SESSION['authorized'] осталась, то пользователь
 * там и останется. А если нет - будет переадресован на
 * index.php в корне проекта.
 */
header("Location: index.php");