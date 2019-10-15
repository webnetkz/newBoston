<?php
    // Получение данных с таблиц постов
    $sqlPost = 'SELECT * FROM post';
    $resPost = $pdo->query($sqlPost);
    $resPost = $resPost->fetchAll(PDO::FETCH_ASSOC);
    foreach($resPost as $key => $val) {
        echo '<div class="miniPost">';
            echo '<img src="'.$val['path_1'].'" class="imgPost">';
            echo '<span class="des">'.$val['des'].'</span>';
            echo '<span class="rub">'.$val['rubrics'].'</span><hr>';
            echo '<span class="allText">'.$val['allText'].'</span>';
        echo '</div>';
    }