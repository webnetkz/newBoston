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

                        if(!empty($_POST['categories'])) {

                            $cat = $_POST['categories'];

                            if(!empty($_POST['allText'])) {
                                $allText = $_POST['allText'];
    
                                // Загрузка в базу данных
                                $path_file = '../files/'.$res['id'].'/'.$_FILES['file']['name']; 
                                $sqlPath = 'INSERT INTO post(path_1, des, rubrics, allText, name, cat) VALUES("'.$path_file.'", "'.$des.'", "'.$rub.'", "'.$allText.'", "'.$name.'", "'.$cat.'")';
                                $resPath = $pdo->query($sqlPath);
                                echo '<p class="visibleEr error">
                                    <a href="../index.php" class="btn" style="margin: 0 30%;">На главную</a>
                                </p>';
                                
                            }else{
                                $err = '<p class="visibleEr error" onclick="closeError();">Заполните описание</p>';
                            }
                        }else{
                            $err = '<p class="visibleEr error" onclick="closeError();">Выбирите категорию</p>';
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
        
        <script>
            function Hire() {

            var bb = document.querySelector('.radio_buttons');
            let inp = document.createElement('input');

            inp.setAttribute('list', 'catHire');
            inp.setAttribute('name', 'categories');
            inp.setAttribute('placeholder', 'Категория');
            inp.setAttribute('class', 'catList');
            inp.setAttribute('id', 'Hire');

            bb.appendChild(inp);
            inp.setAttribute('onclick', '');
            }
        </script>

        <div class="radio_buttons">
            <div>
                <input type="radio" name="rubrics" id="radio1" onclick="Hire();" value="Прокат"/>
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
            <option>Сезонные товары</option> 
            <option>Инструменты</option> 
            <option>Товары для дома</option> 
            <option>Спорт и хобби</option> 
            <option>Автотовары</option>
            <option>Детские товары</option>
            <option>Мебель</option>
            <option>Промышленное оборудование</option>
            <option>Вода, газ, тепло</option>
            <option>Одежда</option>
            <option>Товары для праздника</option>
            <option>Светотехника</option>
            <option>Компьютеры и ПО</option>
            <option>Медицина</option>
            <option>Безопасность и защита</option>
            <option>Бытовая техника</option>
            <option>Товары для офиса</option>
            <option>Сад и огород</option>
            <option>Спецтехника</option>
            <option>Сумки и чемоданы</option>
            <option>Мото, велотехника</option>
            <option>Измерительные приборы</option>
            <option>Полиграфия</option>
            <option>Обувь</option>
            <option>Аудио</option>
            <option>Фото, видео</option>
            <option>Книги</option>
            <option>Недвижимость</option>
            <option>Часы</option>
            <option>Телефоны и связь</option>
            <option>Животные и зоотовары</option>
            <option>Ювелирные изделия</option>
            <option>Антиквариат</option>
        </datalist>

        <input type="text" name="allText" class="input" placeholder="Описание" style="margin-top: 60px;" value="<?php if(!empty($_POST['allText'])){echo $_POST['allText'];}?>">

    <input type="submit" value="Обработать" name="sendPost" class="button">
</form>


