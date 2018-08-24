<div id="signIn">
    <form method="post" action="authorised/index.php">
        <!-- Таблица для входа:  -->
        <table>
            <tr>
                <td><label>Кто Вы? &emsp;</label></td>
                <td>
                    <select name="sign_in_as">
                        <option value="student" selected>Ученик</option>
                        <option value="teacher">Учитель</option>
                        <option value="director">Директор</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="login">Ваш логин: &emsp;</label>
                </td>
                <td>
                    <input id="login" type="text" name="login" placeholder="Your login..." required>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="password">Ваш пароль: &emsp;</label>
                </td>
                <td>
                    <input id="password" type="password" name="password" placeholder="Your password..." required>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="signIn">Продолжить</button></td>
            </tr>
        </table>
    </form>
</div>