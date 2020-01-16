<div class="account location">
    <h1>Личный кабинет</h1>
    <?php
    if ($data) {
        echo '<h2>Здравствуйте, '.$data['full_name'].'!</h2>';
    }

    if (isset($_POST['do_logout'])) {
        unset($_SESSION['logged_user']);
        header('Location: /');
    }
    ?>
    <div class="row">
        <div class="col-sm-12 site_form">
            <a class="nav-link reg-link" href="/account/details">
                <p>Изменить данные учетной записи</p>
            </a>
            <a class="nav-link reg-link" href="/account/changepw">
                <p>Изменить пароль</p>
            </a>
            <form action="/account" method="post">
                <p><input class="button" name="do_logout" type="submit" value="Выйти"></p>
            </form>
        </div>
    </div>
</div>