<nav id="menu-sidebar" class="sidebar">
    <p>
        <a href='?exit=true'>Выйти</a>
    </p>

    <p>
        <a href="?page=studentsList">Управление информацией об учениках</a>
    </p>

    <p>
        <a href="?page=subjectsList">Управление информацией о предметах</a>
    </p>

    <?php
    if ($_GET)
    {
        echo "<p><a href='index.php'>На главную страницу</a></p>";
    }
    ?>
</nav>