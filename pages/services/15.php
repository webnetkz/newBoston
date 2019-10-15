<?php

    // Файл отладки
    require_once '../../app/config/debug.php';

    // Подключение БД
    require_once '../../app/PDO/connect.php';
    
    // Переменные
    $title = 'Искусство и шоу-бизнеc';
    $path = '../../';
    
    require_once '../../tamplate.php';
    include_once '../../app/post/visiblePost.php';
?>
