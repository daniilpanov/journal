<!-- TAG "<BODY>" -->
<body>

<!-- TAG "<MAIN>" -->
<main>
    <?php
    require_once "views/VMenu.php";
    if ($_GET)
    {
        require_once "views/{$S_Router->content['path']}";
    }