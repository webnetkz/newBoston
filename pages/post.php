<?php

    // Файл отладки
    require_once '../app/config/debug.php';

    // Подключение БД
    require_once '../app/PDO/connect.php';
    
    // Переменные
    $title = 'Объявление';
    $path = '../';
    $post = $_SESSION['post'];

    require_once '../tamplate.php';


    // Получение данных с таблиц постов
    $sqlPost = 'SELECT * FROM post WHERE id = "'.$post.'"';
    $resPost = $pdo->query($sqlPost);
    $resPost = $resPost->fetchAll(PDO::FETCH_ASSOC);


foreach($resPost as $key => $val) {
        echo '<div class="post">';
            echo '<img src="pages/'.$val['path_1'].'" class="imgPost">';
            echo '<span class="des">'.$val['des'].'</span>';
            echo '<span class="rub">'.$val['rubrics'].'</span><hr>';
            echo '<span class="allTextBig">'.$val['allText'].'</span>';
        echo '</div>';
    }