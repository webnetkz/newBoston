<?php

    // Файл отладки
    require_once '../../app/config/debug.php';

    // Подключение БД
    require_once '../../app/PDO/connect.php';
    
    // Переменные
    $title = 'Сезонные товары';
    $path = '../../';
    
    require_once '../../tamplate.php';

    // Получение данных с таблиц постов
    $sqlPost = 'SELECT * FROM post WHERE rubrics = "hire"';
    $resPost = $pdo->query($sqlPost);
    $resPost = $resPost->fetchAll(PDO::FETCH_ASSOC);
    foreach($resPost as $key => $val) {
        echo $val['path_1'];
    }
?>
