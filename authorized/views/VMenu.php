<!-- НАВИГАЦИЯ ПО САЙТУ -->
<nav id="top-nav">
    <!--  -->
    <div>
        <form method="post" action="exit.php">
            <button type="submit" class="btn btn-block" name="exit">
                Выйти
            </button>
        </form><?php
        // Если пользователь перешёл по какой-либо ссылке,
        if ($_GET)
        {
            // выводим ссылку на главную страницу.
            echo "<a href='index.php' class='btn btn-default' id='go_to_index'>Обратно на главную страницу</a>";
        }
        ?>
    </div>
    <div id="menu">
        <?php
        getMenuType($who);
        ?>
    </div>
</nav> <!--nav#top-nav-->
<!-- END  НАВИГАЦИЯ ПО САЙТУ -->