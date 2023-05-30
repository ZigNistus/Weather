<?php 
    session_start();
    $val = $_POST['val'];
    $news = $_SESSION['news'];
    $not_found = 0;
    foreach ($news as $value) {
        if(strpos(mb_strtolower($value[1]), mb_strtolower($val)))
        {
            echo '<div class="element">
            <span class="element__tittle">'. $value[1] .'</span>
            <span class="element__category">Категория: '. $value[0] .'</span>
            <span class="element__desc">Описание: '. $value[2] .'</span>';
            if($value[3] != '')
            {
                echo '<img src="/dist/img/news/'. $value[3] .'.jpg">';
            }
            echo '
            <hr>         
        </div>';
        $not_found += 1;
        }
    }
    if($not_found == 0)
    {
        echo '<h2>Новости не найдены</h2>';
    }
