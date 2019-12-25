<div class="changepw location">
    <h1>Изменить пароль</h1>
    <?php
    if ($data) {
        echo $data;
    }

    ?>
    <form action="/account/changepw" method="post">
        <p>
            <label>Текущий пароль</label><br>
            <input type="password" name="password" value="<?php echo @$_POST['password']; ?>">
        </p>
        <p>
            <label>Новый пароль</label><br>
            <input type="password" name="new_password" value="<?php echo @$_POST['new_password']; ?>">
        </p>
        <p>
            <label>Повторите новый пароль</label><br>
            <input type="password" name="new_password_2" value="<?php echo @$_POST['new_password_2']; ?>">
        </p>
<!--        <p><a href="/reset" name="forgot">Не помню пароль!</a><br></p>
-->        <p><input class="button" name="change_pw" type="submit" value="Сохранить"></p>
    </form>
</div>