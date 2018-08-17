<!-- Боковое меню -->
<nav id="sidebar-nav">
    <div class="text">
        <?php
        // Если пользователь вошел на сайт,
        // то даём ему возможность выйти
        if ($_SESSION['authorised'])
        {
            echo "<p><a href='?exit=true'>Выйти</a></p>";
        }
        // Если пользователь прошел по какой-либо ссылке,
        // то даём ему возможность вернуться на главную страницу сайта
        if ($_GET)
        {
            ?><p><a href='index.php'>На главную страницу</a></p><?php
        }
        ?>

        <!-- В отдельном блоке подключаем все страницы с БД -->
        <div>
            <?php
            $sidebar_pages = $menu->getSidebarInfoPages();

            foreach ($sidebar_pages as $sidebar_page)
            {
                echo "<p>";

                    if ($_GET['info_page'] != $sidebar_page['id'])
                    {
                        echo "<a href='?info_page={$sidebar_page['id']}' title='{$sidebar_page['title']}'>";
                    }
                    if ($sidebar_page['value'] == 'special')
                    {
                        echo "<img src='img/{$sidebar_page['icon']}' alt='' />";
                    }
                    elseif ($sidebar_page['value'] == 'common')
                    {
                        echo "<i class='{$sidebar_page['icon']}'></i>";
                    }
                    echo "{$sidebar_page['name']}";

                    if ($_GET['page'] != $sidebar_page['id']) echo "</a>";

                echo "</p>";
            }
            ?>
        </div>
    </div>
</nav>

<!-- кнопка для открытия бокового меню -->
<!-- ( использую атрибут onklick, внутри него всё подробно расписано ) -->
<i
    id="nav_opener"
    class="i-jsButton"
    onclick="
    // получаем боковое меню для дальнейших манипуляций
    let nav_sidebar = document.getElementById('sidebar-nav');
    // получаем позицию меню для понятия, открыто оно или нет
    let nav_pos = getComputedStyle(nav_sidebar, null).left;
    // ЕСЛИ МЕНЮ ОТКРЫТО:
    if ( nav_pos !== '0px')
    {
        // 1.  Закрываем его
        nav_sidebar.style.left = '0px';
        // 2.  И поворачиваем кнопку на 90 градусов по часовой стрелке
        this.style.transform = 'rotateZ(90deg)';
    }
    // ЕСЛИ МЕНЮ ЗАКРЫТО:
    else
    {
        // 1.  Открываем его
        nav_sidebar.style.left = '-25em';
        // 2.  И поворачиваем кнопку на 90 градусов против часовой стрелки
        this.style.transform = 'rotateZ(0deg)';
    }"
>
    <!-- ( использую (R)Font Awesome ) -->
    <i class="icon-align-justify"></i>
</i>