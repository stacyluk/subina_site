<div class="details location">
    <h1>Персональные данные</h1>
    <?php
    if ($data) {
        echo $data;
    }
    ?>
    <form action="/account/details" method="post">
        <p>
            <label>Полное имя</label><br>
            <input type="text" name="full_name" value="<?php echo $_SESSION['logged_user']['full_name']; ?>">
        </p>

        <p>
            <label>Имя пользователя</label><br>
            <input type="text" name="username" value="<?php echo $_SESSION['logged_user']['username']; ?>">
        </p>
        <p><input class="button" name="change_details" type="submit" value="Сохранить"></p>
    </form>
</div>
