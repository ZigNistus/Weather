<?php
session_start()
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Новости</title>
    <link rel="stylesheet" href="dist/css/stan.css">
    <link rel="stylesheet" href="dist/css/news/news.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <div class="main">
        <div class="main-container">
            <div class="left-content">
                <div class="nav">
                    <?php if (isset($_SESSION['user'])) {
                        echo '<span class="user">' . $_SESSION['user']['name'] . '</span>';
                    } ?>
                    <span class="left__tittle">Навигация</span>
                    <ul class="left__desc">
                        <li><a href="index.php">Главная</a></li>
                        <li><a href="news.php">Новости</a></li>
                        <?php if (isset($_SESSION['user'])) {
                            echo '<li><a href="create_news.php">Добавить новость</a></li>';
                            echo '<li><a href="inc/php/log_out.php">Выход из аккаунта</a></li>';
                        } else {
                            echo '<li><a href="login.php">Авторизация (для администраторов)</a></li>';
                        } ?>
                    </ul>
                </div>
            </div>

            <div class="right-content">
                <input type="text" placeholder="Поиск по новостям" class="right__input" id="right__input">
                <span class="right__tittle">Новости</span>
                <div class="right_news" id="news">

                </div>
            </div>
        </div>
    </div>

    <script src="/inc/js/news/news.js"></script>
</body>

</html>