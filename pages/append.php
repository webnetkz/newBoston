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
    $name = $_SESSION['name'];
    require_once '../tamplate.php';

    // Запрос данных пользователя
    $sql = 'SELECT * FROM users WHERE name = "'.$name.'"';
    $res = $pdo->query($sql);
    $res = $res->fetch(PDO::FETCH_ASSOC);

    // Код обработки сценария
    if(isset($_POST['sendPost'])){

    // Проверяем, загрузил ли пользователь файл
        if(isset($_FILES['file'])) {
            
        }
    

        // Обработка заголовка
        if(isset($_POST['des'])) {

            $des = $_POST['des'];
        }

        // Обработка рубрики
        if(isset($_POST['rubrics'])) {

            $rub = $_POST['rubrics'];
        }

        if(isset($_POST['allText'])) {

            $allText = $_POST['allText'];
        }


        // Директория для размещения файла
        $destiation_dir = dirname(__FILE__) .'\\files\\'.$res['id'].'/'.$_FILES['file']['name']; 
        // Перемещаем файл в желаемую директорию
        move_uploaded_file($_FILES['file']['tmp_name'], $destiation_dir );
        // Оповещаем пользователя об успешной загрузке файла
        $err = '<p class="visibleEr error" onclick="closeError();">Удачная публикация</p>';
        // Загрузка в базу данных
        $path_file = 'files/'.$res['id'].'/'.$_FILES['file']['name']; 
        $sqlPath = 'INSERT INTO post(path_1, des, rubrics, allText) VALUES("'.$path_file.'", "'.$des.'", "'.$rub.'", "'.$allText.'")';
        $resPath = $pdo->query($sqlPath);
    }
    else{
    // Оповещаем пользователя о том, что файл не был загружен
    //echo'<p class="visibleEr error" onclick="closeError();">Выбирите фото</p>'; 
    }

    
        // Проверка существование ошибок
        if(!empty($err)) {
            echo $err;
        }

?>

<h2>Добавить фото</h2>
<form method="POST" action="" enctype="multipart/form-data">
    <input type="file" name="file" class="photoBtn">
    <input type="text" name="des" placeholder="Заголовок" class="input">
        <div class="checkBlock">
            <label for="hire">Прокат</label>
                <input type="checkbox" id="hire" name="rubrics" class="radio" value="hire"/>
            <label for="services">Услуги</label>
                <input type="checkbox" id="services" name="rubrics" class="radio" value="services"/>
            <label for="goods">Товары</label>
                <input type="checkbox" id="goods" name="rubrics" class="radio" value="goods"/>    
        </div>
        <input type="text" name="allText" class="input" placeholder="Описание" style="margin-top: 10px;">

    <input type="submit" value="Обработать" name="sendPost" class="button">
</form>


