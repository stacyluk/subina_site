<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/style.css" type="text/css">
    <title>Сад Шубиной</title>
</head>
<body>
<header>
    <div class="head-container">
        <nav class="top-menu">
        <a href="/" class="logo">Сад Шубиной</a>
            <ul class="main-menu">
                <li><a href="/contacts">Контакты</a></li>
                <li><a href="/about">О нас</a> </li>
            </ul>
            <ul class="bottom-menu">
                <li><a href="/catalog">Каталог</a></li>
                <li><a href="/news">Новости и события</a></li>
            </ul>
        </nav>
    </div>
</header>
<div class="main">
    <div class="container">


        <?php include "views/".$content_view; ?>
    </div>

</div>
<footer>
    <div class="container">
        <p style="text-align: center; font-size: 10px">2006 - 2019 КФХ «Сад Шубиной»</p>
    </div>
</footer>
</body>
</html>