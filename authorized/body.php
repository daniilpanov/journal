<!-- TAG "<BODY>" -->
<body>

<!-- TAG "<MAIN>" -->
<main>
    <?php
    // Если пользователь ещё не авторизирован,
    if (!isset($_SESSION['authorized']))
    {
        // и если авторизация прошла успешно, то
        if ($authorized = \authorized\app\classes\Router::authorization($_POST['login'], $_POST['password'], $_POST['sign_in_as']))
        {
            /*
             * чтобы можно было в любой момент посмотреть id пользователя
             * и авторизирован ли он,
             * записываем в суперглобальный массив $_SESSION
             * переменную $authorized.
             */
            $_SESSION['authorized'] = $authorized;

            // Перезагружаем страницу, чтобы изменения в $_SESSION вошли в силу.
            header("Location: index.php");
        }
    }
    // Если же пользователь уже авторизирован,
    elseif (isset($_SESSION['authorized']))
    {
        // всего лишь подключаем меню и нужный нам индекс
        require_once "views/VMenu.php";
        require_once "including/{$_SESSION['authorized']['authorized_as']}/index.php";
    }