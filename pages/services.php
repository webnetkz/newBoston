<?php

    header('Location: hire.php');

    // Файл отладки
    require_once '../app/config/debug.php';

    // Подключение БД
    require_once '../app/PDO/connect.php';
    
    // Переменные
    $title = 'Услуги';
    $path = '../';
    
    require_once '../tamplate.php';
?>

<div class="categorieMenu">
<ul>
    <a href="services/1.php" class="nonStyle">
        <li class="menuList blackMenuList">
            Инженерно-строительные    
        </li>
    </a>
    <a href="services/2.php" class="nonStyle">
        <li class="menuList">    
            Промышленные
        </li>
    </a>
    <a href="services/3.php" class="nonStyle">
        <li class="menuList blackMenuList">    
            Бытовые
        </li>
    </a>
    <a href="services/4.php" class="nonStyle">
        <li class="menuList">    
            Туристические
        </li>
    </a>
    <a href="services/5.php" class="nonStyle">
        <li class="menuList blackMenuList">    
            Организация праздников
        </li>
    </a>
    <a href="services/6.php" class="nonStyle">
        <li class="menuList">    
            Полиграфия и дизайн
        </li>
    </a>
    <a href="services/7.php" class="nonStyle">
        <li class="menuList blackMenuList">    
            Деловые
        </li>
    </a>
    <a href="services/8.php" class="nonStyle">
        <li class="menuList">    
            Образования, тренинги
        </li>
    </a>
    <a href="services/9.php" class="nonStyle">
        <li class="menuList blackMenuList">    
            Реклама, маркетинг, PR
        </li>
    </a>
    <a href="services/10.php" class="nonStyle">
        <li class="menuList">    
            Упаковка
        </li>
    </a>
    <a href="services/11.php" class="nonStyle">
        <li class="menuList blackMenuList">    
            Транспортные
        </li>
    </a>
    <a href="services/12.php" class="nonStyle">
        <li class="menuList">    
            Риэлторские
        </li>
    </a>
    <a href="services/13.php" class="nonStyle">
        <li class="menuList blackMenuList">    
            Логистика и склады
        </li>
    </a>
    <a href="services/14.php" class="nonStyle">
        <li class="menuList">    
            Сельское хозяйство
        </li>
    </a>
    <a href="services/15.php" class="nonStyle">
        <li class="menuList blackMenuList">    
            Искусство и шоу-бизнеc
        </li>
    </a>
    <a href="services/16.php" class="nonStyle">
        <li class="menuList">    
            Сфера IT
        </li>
    </a>
    <a href="services/17.php" class="nonStyle">
        <li class="menuList blackMenuList">    
            Коммунальные
        </li>
    </a>
    <a href="services/18.php" class="nonStyle">
        <li class="menuList">    
            Телекоммуникаций
        </li>
    </a>
    <a href="services/19.php" class="nonStyle">
        <li class="menuList blackMenuList">    
            Организации досуга
        </li>
    </a>
    <a href="services/20.php" class="nonStyle">
        <li class="menuList">    
            Скидочные карты и купоны
        </li>
    </a>
    <a href="services/21.php" class="nonStyle">
        <li class="menuList blackMenuList">    
            Ритуальные
        </li>
    </a>
    <a href="services/22.php" class="nonStyle">
        <li class="menuList">    
            Готовый бизнес
        </li>
    </a>
    <a href="services/23.php" class="nonStyle">
        <li class="menuList blackMenuList">    
            Наградная продукция
        </li>
    </a>
    <a href="services/24.php" class="nonStyle">
        <li class="menuList">    
            Страхование
        </li>
    </a>
    <a href="services/25.php" class="nonStyle">
        <li class="menuList blackMenuList">    
            Медицина, здоровье и красота
        </li>
    </a>
    <a href="services/26.php" class="nonStyle">
        <li class="menuList">    
            Защита окружающей среды
        </li>
    </a>
    <a href="services/27.php" class="nonStyle">
        <li class="menuList blackMenuList">    
            Охранные, аварийные и экстренные службы
        </li>
    </a>
    <a href="services/28.php" class="nonStyle">
        <li class="menuList">    
            Производство, обслуживание, ремонт техники и оборудования
        </li>
    </a>
</ul>
</div>