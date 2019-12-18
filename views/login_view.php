<div class="login">
    <?php
    if ($data) {
        echo $data;
    }
    ?>
    <h1>Вход</h1>
    <form action="/login" method="post">
        <p>
        <label>Ваш логин</label><br>
        <input type="text" name="username" value="<?php echo @$_POST['username']; ?>">
        </p>
        <p>
        <label>Пароль</label><br>
        <input type="password" name="password" value="<?php echo @$_POST['password']; ?>">
        </p>
        <p><input class="button" name="do_login" type="submit" value="Войти"></p>
        <p>Еще не зарегистрированы? <a href="/signup">Регистрация</a>!</p>
    </form>
</div>
