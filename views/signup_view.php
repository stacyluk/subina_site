<div class="signup location">
    <h1>Регистрация</h1>
    <?php
    if ($data) {
        echo $data;
    }
    ?>
    <form action="/signup" method="post">
        <p>
            <label>Полное имя</label><br>
            <input type="text" name="full_name" value="<?php echo @$_POST['full_name']; ?>">
        </p>

        <p>
            <label>Имя пользователя</label><br>
            <input type="text" name="username" value="<?php echo @$_POST['username']; ?>">
        </p>
        <p>
            <label>Email</label><br>
            <input type="email" name="email" value="<?php echo @$_POST['email']; ?>">
        </p>
        <p>
            <label>Пароль</label><br>
            <input type="password" name="password" value="<?php echo @$_POST['password']; ?>">
        </p>
        <p>
            <label>Повторите пароль</label><br>
            <input type="password" name="password_2" value="<?php echo @$_POST['password_2']; ?>">
        </p>
        <p><input class="button" name="do_signup" type="submit" value="Зарегистрироваться"></p>
        <p>Уже зарегистрированы? <a href="/login">Введите имя пользователя</a>!</p>
    </form>
</div>