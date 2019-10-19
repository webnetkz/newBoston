<?php
    // Получение данных с таблиц постов
    $sqlPost = 'SELECT * FROM post WHERE rubrics = "Товары"';
    $resPost = $pdo->query($sqlPost);
    $resPost = $resPost->fetchAll(PDO::FETCH_ASSOC);
    foreach($resPost as $key => $val) {
        $_SESSION['post'] = $val['id'];
        echo '<a href="../post.php" class="non"><div class="miniPost">';
            echo '<img src="'.$val['path_1'].'" class="imgPost">';
            echo '<span class="des">'.$val['des'].'</span><hr>';
            //echo '<span class="rub">'.$val['rubrics'].'</span>';
            echo '<span class="allText">'.$val['allText'].'</span>';
        echo '</div></a>';
    }