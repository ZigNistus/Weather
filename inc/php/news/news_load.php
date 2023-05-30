<?php 
    require_once '../connect.php';
    session_start();
    $check_news = $db->prepare(
        "SELECT category.name,
        tittle,
        description,
        img
        FROM news
        left join category on category.id = news.cat_id");
    $check_news->execute();
    $check_news = $check_news->get_result();
    
    if (mysqli_num_rows($check_news) > 0) {
        $data = mysqli_fetch_all($check_news);
        
        foreach ($data as $value) {
            echo '<div class="element">
            <span class="element__tittle">'. $value[1] .'</span>
            <span class="element__category">Категория: '. $value[0] .'</span>
            <span class="element__desc">'. $value[2] .'</span>';
            if($value[3] != '')
            {
                echo '<img src="/dist/img/news/'. $value[3] .'.jpg">';
            }
            echo '
            <hr>         
        </div>';
        }
        
        $_SESSION['news'] = $data;
    }
    else {
        $_SESSION['message'] = 'Товары не найдены';
    }
