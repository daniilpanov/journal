<form method="post" id="signIn" action="authorised">
    <p>
        <label>Кто Вы? &emsp;</label>
        <select name="sign_in_as">
            <option value="student" selected>Ученик</option>
            <option value="teacher">Учитель</option>
            <option value="director">Директор</option>
        </select>
    </p>

    <p>
        <label>
            Ваш логин: &emsp;
            <input type="text" name="login" placeholder="Your login...">
        </label>
    </p>

    <p>
        <label>
            Ваш пароль: &emsp;
            <input type="password" name="password" placeholder="Your password...">
        </label>
    </p>
    <p>
        <button type="submit" name="signIn">Войти</button>
    </p>
</form>