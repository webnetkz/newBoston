<?php

    // Файл отладки
    require_once '../../app/config/debug.php';

    // Подключение БД
    require_once '../../app/PDO/connect.php';
    
    // Переменные
    $title = 'Светотехника';
    $path = '../../';
    
    require_once '../../tamplate.php';
    include_once '../../app/post/postHire.php';
?>
