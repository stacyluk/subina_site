<div class="login">
    <h1>Вход</h1>
    <form action="/login" id="login_form" method="post" name="login_form">
        <p><label for="user_login">Имя опльзователя<br>
                <input class="input" id="username" name="username" size="20"
                       type="text" value=""></label></p>
        <p><label for="user_pass">Пароль<br>
                <input class="input" id="password" name="password" size="20"
                       type="password" value=""></label></p>
        <p class="submit"><input class="button" name="login" type="submit" value="Log In"></p>
        <p class="regtext">Еще не зарегистрированы? <a href="/login/register">Регистрация</a>!</p>
    </form>
</div>