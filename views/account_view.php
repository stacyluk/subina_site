<div class="account">
    <h1>Личный кабинет</h1>
    <?php
    if (isset($_POST['do_logout'])) {
        unset($_SESSION['logged_user']);
        header('Location: http://phpsite.local/');
    }
    ?>
    <form method="post">
        <p><input class="button" name="do_logout" type="submit" value="Выйти"></p>
    </form>
</div>