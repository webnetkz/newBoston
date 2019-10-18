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
        if(!empty($_FILES['file'])) {
            $fileName = $_FILES['file']['name'];
            $fileTmp = $_FILES['file']['tmp_name'];

                // Директория для размещения файла
                $destiation_dir = dirname(__FILE__) .'\\files\\'.$res['id'].'\\'.$fileName;
                // Перемещаем файл в желаемую директорию
                move_uploaded_file($fileTmp, $destiation_dir );

                // Обработка заголовка
                if(!empty($_POST['des'])) {
                    $des = $_POST['des'];

                    // Обработка рубрики
                    if(isset($_POST['rubrics'])) {
                        $rub = $_POST['rubrics'];

                        if(!empty($_POST['allText'])) {
                            $allText = $_POST['allText'];

                            // Загрузка в базу данных
                            $path_file = '../files/'.$res['id'].'/'.$_FILES['file']['name']; 
                            $sqlPath = 'INSERT INTO post(path_1, des, rubrics, allText, name) VALUES("'.$path_file.'", "'.$des.'", "'.$rub.'", "'.$allText.'", "'.$name.'")';
                            $resPath = $pdo->query($sqlPath);
                            echo '<p class="visibleEr error">
                                <a href="../index.php" class="btn" style="margin: 0 30%;">На главную</a>
                            </p>';
                            
                        }else{
                            $err = '<p class="visibleEr error" onclick="closeError();">Заполните описание</p>';
                        }
                    }else{
                        $err = '<p class="visibleEr error" onclick="closeError();">Выбирите рубрику</p>';
                    }
                }else{
                    $err = '<p class="visibleEr error" onclick="closeError();">Запоните заголовок</p>';
            }
        }
        if(!isset($_FILES['file'])) {
            $err = '<p class="visibleEr error" onclick="closeError();">Выбирите фото</p>';
        }
        
    }

    // Проверка существование ошибок
    if(!empty($err)) {
        echo $err;
    }

?>
<form method="POST" action="" enctype="multipart/form-data">
    <div class="example-1">
    <div class="form-group">
        <label class="label">
        <span class="title">Добавить файл</span>
        <input type="file" name="file">
        </label>
    </div>
    </div>
    <input type="text" name="des" placeholder="Заголовок" class="input" value="<?php if(isset($des)){echo $des;}?>">
        
        <div class="radio_buttons">
            <div>
                <input type="radio" name="rubrics" id="radio1" value="Прокат"/>
                <label for="radio1"">Прокат</label>
            </div>
            <div>
                <input type="radio" name="rubrics" id="radio2" value="Услуги"/>
                <label for="radio2">Услуги</label>
            </div>
            <div>
                <input type="radio" name="rubrics" id="radio3" value="Товары"/>
                <label for="radio3">Товары</label>
            </div>
        </div>

        <datalist id="catHire"> 
            <option>Red</option> 
            <option>Yellow</option> 
            <option>Blue</option> 
            <option>Green</option> 
            <option>Orange</option>  
        </datalist>

        <input type="text" name="allText" class="input" placeholder="Описание" style="margin-top: 60px;" value="<?php if(!empty($_POST['allText'])){echo $_POST['allText'];}?>">

    <input type="submit" value="Обработать" name="sendPost" class="button">
</form>


