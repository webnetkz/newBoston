<?php

    // Файл отладки
    require_once '../app/config/debug.php';

    // Подключение БД
    require_once '../app/PDO/connect.php';

    if(empty($_SESSION['name'])) {
        header('Location: pages/sign.php');
    }

    // Переменные
    $title = 'Добавить';
    $path = '../';

    require_once '../tamplate.php';

    // Код обработки сценария
    if(isset($_POST['sendPost'])) {
        
        if(isset($_FILES['imageOne'])) {
            $file_name = $_FILES['imageOne']['name'];
            $file_size = $_FILES['imageOne']['size'];
            $file_tmp = $_FILES['imageOne']['tmp_name'];
            $file_type = $_FILES['imageOne']['type'];
            $file_ext = strtolower(end(explode('.', $_FILES['imageOne']['name'])));
            
            var_dump($_FILES['imageOne']);

            $expensions = array("jpeg","jpg","png");

            if($file_size > 20099999) {
                $err = '<p class="visibleEr error" onclick="closeError();">Размер файла превышает допустимый!</p>';
            }

            if(empty($err) == true) {
                move_uploaded_file($file_tmp.'.'.$file_name);
                echo '<p class="visibleEr error" onclick="closeError()">Файл загружен</p>';
            }else{
                echo $err;
            }
        }

    
        // Проверка существование ошибок
        if(!empty($err)) {
            echo $err;
        }
    }

?>

<form action="append.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="imageOne">
    <input type="submit" name="sendPost">
</form>