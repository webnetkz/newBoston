<?php

    // Файл отладки
    require_once '../app/config/debug.php';

    // Подключение БД
    require_once '../app/PDO/connect.php';

    // Валидация пользователя
    require_once '../app/config/valid.php';

    // Если кнопка отправить нажата
    if(!empty($_POST['sub'])) {
        
        $err = [];

        // Проверка имени
        if(!empty($_POST['name'])) {
            $name = trim($_POST['name']);
            $name = htmlentities($name);

            // Проверка на существование логина
            $sql = 'SELECT * FROM users WHERE name = "'. $name .'"';
            $res = $pdo->query($sql);
            $res = $res->fetch(PDO::FETCH_ASSOC);
            
            if($res['name'] !== $name) {

                // Проверка пароля
                if(!empty($_POST['pass'])) {
                    $pass = trim($_POST['pass']);
                    $pass = htmlentities($pass);
                }else{
                    $err = 'Введите пароль!';
                }
                
                // Проверка повторного пароля
                if($_POST['pass2'] && $_POST['pass2'] == $_POST['pass']) {
                    $pass2 = trim($_POST['pass2']);
                    $pass = password_hash($pass, PASSWORD_DEFAULT);

                    // Регистрация
                    $sqlReg = 'INSERT INTO users(`name`, `pass`) VALUES("'.$name.'", "'.$pass.'");';
                    $resReg = $pdo->query($sqlReg);
            
                    // Редирект при успешной регистрации
                    if(!empty($resReg)) {
            
                        $_SESSION['name'] = $name;

                        // Получение ID для создания папки файлов
                        $sqlId = 'SELECT * FROM users WHERE name="'.$name.'"';
                        $resId = $pdo->query($sqlId);
                        $resId = $resId->fetch(PDO::FETCH_ASSOC);

                        // Создание папки для изображений
                        $string = '../app/files/images/'.$resId['id'];
                        if (!mkdir($string, 0777, true)) {
                            die('<p class="visibleEr error" onclick="closeError();>Не удалось создать директории</p>');
                        }
                        
                        header('Location: ../profile.php');
                    }
                }else{
                    $err = '<p class="visibleEr error" onclick="closeError();">Заполните поле с паролем</p>';
                }

            }else{
                $err = '<p class="visibleEr error" onclick="closeError();">Пользователь с таким именем существует</p>';
            }
            
        }else{
            $err = '<p class="visibleEr error" onclick="closeError();">Введите имя!</p></p>';
        }
    }
    
    // Переменные
        if(empty($name)) {
            $name = '';
        }
        if(empty($email)) {
            $email = '';
        }

    // Проверка существование ошибок
    if(!empty($err)) {
        echo $err;
    }

    $title = 'Регистрация';
    $path = '../';
    
    require_once '../tamplate.php';
    
    ?>

    <form action="signup.php" method="POST" class="signForm">
        <input type="text" name="name" class="input" placeholder="Логин" value="<?=$name?>">
        <input type="password" name="pass" class="input" placeholder="Пароль">
        <input type="password" name="pass2" class="input" placeholder="Повторите пароль">
       <!-- <input type="email" name="email" class="input" placeholder="Email" value="<?//=$email?>">-->
        <input type="submit" name="sub" class="button" value="Регистрация">
    </form>
