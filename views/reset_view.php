<div class="reset location">
    <h1>Восстановление пароля</h1>
    <?php
        if($data) {
            echo $data.'<br>';
        }
    ?>
    <form action="/reset" method="post">
        <p>
            <label>Полное имя</label><br>
            <input type="text" name="username" value="<?php echo @$_POST['username']; ?>">
        </p>
        <p><input class="button" name="reset_pw" type="submit" value="Восстановить"></p>
        <div class="row">
            <div class="col-sm-12">
                <a href="/login">Обратно на страницу авторизации.</a>
            </div>
        </div>
    </form>
</div>
