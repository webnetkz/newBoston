<?php

    // Файл отладки
    require_once '../../app/config/debug.php';

    // Подключение БД
    require_once '../../app/PDO/connect.php';
    
    // Переменные
    $title = 'Сезонные товары';
    $path = '../../';
    
    require_once '../../tamplate.php';
    include_once '../../app/post/postHire.php';
?>
