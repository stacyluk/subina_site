<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="/">
    <!--  <link rel="stylesheet" href="../public/style.css" type="text/css">-->
    <title>Сад Шубиной</title>

    <!--Connect to Bootstrap CSS-->
    <link href="../public/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../public/css/main.css">
    <!--    Connect to font Awesome-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
<!-- navbar -->
<nav class="navbar navbar-expand-lg fixed-top ">
    <a class="navbar-brand" href="/">Сад Шубиной</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!--    Search field-->
    <div class="search">
        <form action="/search">
            <input type="search" name="query" placeholder="Искать здесь...">
            <button type="submit"></button>
        </form>
    </div>
    <!---->
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav mr-4">
            <li class="nav-item">
                <a class="nav-link" data-value="catalog" href="/catalog">Каталог</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " data-value="about" href="/about">О нас</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " data-value="news" href="/news">Новости и события</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " data-value="contact" href="/contacts">Контакты</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-value="faq" href="/faq">FAQ</a>
            </li>
        </ul>
    </div>
    <!--Login button-->
    <div class="login_button">
        <?php if (isset($_SESSION['logged_user'])) : ?>
            <form action="/account">
                <button type="submit"></button>
            </form>
        <?php else: ?>
            <form action="/login">
                <button type="submit"></button>
            </form>
        <?php endif; ?>
    </div>
    <!---->

</nav>
<header class="header">
    <div class="overlay"></div>
</header>
<div class="main">
    <div class="container">

        <!-- start page content-->
        <?php include "views/".$content_view; ?>
        <!--end page content-->

    </div>

</div>
<footer class=" footer py-4 text-black-50">
    <div class="container text-center">
        <div class="row">
            <p>2006 - 2019 КФХ «Сад Шубиной»</p>
        </div>
    </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!--Connect to Popper-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<!--Connect to Bootstrap JS-->
<script src="../public/js/bootstrap.js"></script>

<!-- Загрузка React. -->
<!-- Внимание: во время развертывания, замените "development.js" на "production.min.js". -->
<script src="https://unpkg.com/react@16/umd/react.development.js" crossorigin></script>
<script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js" crossorigin></script>

<!-- Загрузка нашего компонента React. -->
<script src="like_button.js"></script>

</body>
</html>
