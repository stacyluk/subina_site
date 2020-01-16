<div class="login location">
    <?php
    if ($data) {
        echo $data;
    }
    ?>
    <h1>Вход</h1>
    <div class="row">
        <div class="col-sm-12 site_form">
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
                <p><a href="/reset">Забыли пароль?</a><br></p>
                <p>Еще не зарегистрированы? <a class="nav-link  reg-link" href="/signup">Регистрация!</a></p>
            </form>
        </div>
    </div>
</div>
