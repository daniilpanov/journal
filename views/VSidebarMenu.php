<!-- Боковое меню -->
<nav id="sidebar-nav">
    <!-- Блок с текстом -->
    <div class="text">
        <?php
        // Если пользователь вошел на сайт,
        // то даём ему возможность выйти
        if ($_SESSION['authorised']['id'])
        {
            echo "<p><a href='?exit=true'>Выйти</a></p>";
        }
        ?>

        <!-- В отдельном блоке подключаем все страницы с БД -->
        <div>
            <?php
            // Вызываем метод для получения боковых
            // информационных страниц
            $sidebar_pages = $menu->getSidebarInfoPages();

            // и выводим их:
            foreach ($sidebar_pages as $sidebar_page)
            {
                // 1.  Для перевода на новую строку после каждого прохода цикла,
                // заключаем ссызки в тег "<p>"
                echo "<p title='{$sidebar_page['title']}'>";
                    // 2.  Если пользователь не на этой странице,
                    // то выводим ссылку
                    if ($_GET['info_page'] != $sidebar_page['id'])
                    {
                        echo "<a href='?info_page={$sidebar_page['id']}'>";
                    }
                    // 3.  Если страница "специальная",
                    // нужно вывести тег "<img />"
                    if ($sidebar_page['value'] == 'special')
                    {
                        echo "<img src='img/{$sidebar_page['icon']}' alt='' />";
                    }
                    // Если же страница "обычная",
                    // то выводим тег "<i>" с классом,
                    // указанным в БД (использую (R)Font Awesome)
                    elseif ($sidebar_page['value'] == 'common')
                    {
                        echo "<i class='{$sidebar_page['icon']}'></i>";
                    }
                    // 4.  Выводим название страницы:
                    echo "{$sidebar_page['name']}";

                    // 5.  Закрывающие теги:
                    if ($_GET['page'] != $sidebar_page['id']) echo "</a>";

                echo "</p>";
            }
            ?>
        </div>
    </div>
</nav>

<!-- кнопка для открытия бокового меню -->
<!-- ( использую атрибут onklick, внутри него всё подробно расписано ) -->
<i id="nav_opener" onclick=" nav_opener_onclick(); ">
    <!-- ( использую (R)Font Awesome ) -->
    <i class="icon-align-justify"></i>
</i>