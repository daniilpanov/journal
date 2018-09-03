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
    <div id="menu"><?php
        $menu = $authorized_menu->getMenu($_SESSION['authorized']['authorized_as']);

        foreach ($menu as $row)
        {
            if (count($row['view_names']['items']) == 1)
            {
                ?>
                <a class="btn btn-default" href="?<?=$row['view_names']['dir'] ?>=<?=$row['view_names']['items'][0] ?>">
                    <?=$row['link_names']['items'][0] ?>
                </a><?php
            }
            else
            {
                ?>
                <div class="dropdown">
                    <a href="#" class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?=$row['link_names']['dir'] ?>&emsp;<span class="caret"></span>
                    </a>
                    <div class="dropdown-menu">
                        <h6 class="dropdown-header"><?=$row['link_names']['dir'] ?></h6>
                        <?php
                        foreach ($row['link_names']['items'] as $key => $item)
                        {
                            ?><a class="dropdown-item btn btn-block" href="?<?=$row['view_names']['dir'] ?>=<?=$row['view_names']['items'][$key] ?>">
                            <?=$item ?>
                            </a>
                            <?php
                        }
                        ?></div>

                </div><?php
            }
        }
        ?>
    </div>
</nav> <!--nav#top-nav-->
<!-- END  НАВИГАЦИЯ ПО САЙТУ -->