<?php
session_start();
if (isset($_SESSION['user'])) {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="dist/css/stan.css">
    <link rel="stylesheet" href="dist/css/news/news.css">
    <link rel="stylesheet" href="dist/css/login/login.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <div class="main">
        <div class="main-container">
            <div class="left-content">
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

            <div class="right-content">
                <form action="inc/php/login/log_val.php" method="post">
                    <label class="tittle">Авторизация</label>
                    <label>Логин</label>
                    <input type="text" name="login" placeholder="Введите логин">
                    <label>Пароль</label>
                    <input type="password" name="password" placeholder="Введите пароль">
                    <?php
                    if (isset($_SESSION['message'])) {
                        echo '<p class="msg">' . $_SESSION['message'] . '</p>';
                    }
                    unset($_SESSION['message']);
                    ?>
                    <button type="submit">Войти</button>
                </form>
            </div>
        </div>
    </div>

    <script src="/inc/js/news/news.js"></script>
</body>

</html>