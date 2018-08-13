<div id="signIn">
    <form method="post" action="index.php">
        <p>
            <label>
                Логин: &emsp;
                <input type="text" name="login" placeholder="Ваш логин ">
            </label>
        </p>
        <p>
            <label>
                Пароль: &emsp;
                <input type="password" name="password" placeholder="Ваш пароль ">
            </label>
        </p>
        <p>
            <label>
                Войти как: &emsp;
                <select name="signInAs">
                    <option value="student">ученик</option>
                    <option value="teacher">учитель</option>
                    <option value="director">директор</option>
                </select>
            </label>
        </p>
        <button type="submit" name="signIn">Войти</button>
    </form>
</div>