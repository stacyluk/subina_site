<!--<div class="register">
    <h1>Регистрация</h1>
    <form action="/signup" id="register_form" method="POST" name="register_form">
        <p><label for="user_login">Полное имя<br>
                <input class="input" id="full_name" name="full_name" size="32" type="text" value=""></label></p>
        <p><label for="user_pass">E-mail<br>
                <input class="input" id="email" name="email" size="32" type="email" value=""></label></p>
        <p><label for="user_pass">Имя пользователя<br>
                <input class="input" id="username" name="username" size="32" type="text" value=""></label></p>
        <p><label for="user_pass">Пароль<br>
                <input class="input" id="password" name="password" size="32" type="password" value=""></label></p>
        <p class="submit"><input class="button" id="register" name="register" type="submit" value="Зарегистрироваться">
        </p>
        <p class="regtext">Уже зарегистрированы? <a href="/login">Введите имя пользователя</a>!</p>
    </form>
</div>-->
<div class="signup">
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