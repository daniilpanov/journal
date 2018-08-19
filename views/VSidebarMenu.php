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