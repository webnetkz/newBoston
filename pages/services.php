<?php

    // Файл отладки
    require_once '../app/config/debug.php';

    // Подключение БД
    require_once '../app/PDO/connect.php';
    
    // Переменные
    $title = 'Услуги';
    $path = '../';

    require_once '../tamplate.php';

    echo '<form action="" method="POST">';

    // Выбор подкатегорий
    if(!empty($_POST['title'])) {
        
        $base = $_POST['title'];
        $sql = 'SELECT * FROM '.$base.'';
        $res = $pdo->query($sql);
        $res = $res->fetchAll(PDO::FETCH_ASSOC);

        foreach($res as $k => $v) {
            echo '<button name="s" class="catList" value="'.$v['id'].'">'.$v['title'].'</button>';
        }
    }

    if(empty($_POST['title'])) {

        $sqlCat = 'SELECT * FROM services';
        $resCat = $pdo->query($sqlCat);
        $resCat = $resCat->fetchAll(PDO::FETCH_ASSOC);
    
        foreach($resCat as $k => $v) {
            echo '<button name="title" class="catList" value="'.$v['des'].'">'.$v['title'].'</button>';
    
        }
    }

    echo '</form>';
?>