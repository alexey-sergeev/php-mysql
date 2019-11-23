<!doctype html>
<html lang="ru">
    <head>

        <!-- Подключить Bootstrap для оформления страницы -->

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <!-- Font Awesome - векторные иконки -->

        <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">
        
        <!-- Локальные настройки сайта -->

        <link rel="stylesheet" href="styles.css">
        <link rel="icon" href="interface/logo-o.png">

        <title>Четыре лапы</title>

    </head>
    <body>

        <?php

            // Вспомогательные функции

            require_once "functions.php";

            // Подключение к MySQL

            $mysqli = new mysqli( "localhost", "animals", "animalspwd", "animals" );
            
            if ( $mysqli->connect_errno ) {

                echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                die();

            }
            
            $mysqli->set_charset( "utf8" );

            // Определить идентификаторы запрашиваемых ресурсов - страницы или раздела сайта

            global $page_id;
            $page_id = ( isset( $_REQUEST['page'] ) ) ? (int) $_REQUEST['page'] : 0;

            global $cat_id;
            $cat_id = ( isset( $_REQUEST['cat'] ) ) ? (int) $_REQUEST['cat'] : 0;

            // Вывод отладочной информации (полезно для понимания правильности работы скрипта)

            // p( $_REQUEST );
            // p( $page_id );

        ?>

        <!-- Заголовок -->

        <?php include "header.php"; ?>

        <!-- Основное содержимое -->

        <?php 
        
            if ( $page_id ) {

                include "content.php"; 

            } else {

                include "homepage.php"; 

            }
        
        ?>

        <!-- Нижняя часть страницы -->

        <?php include "footer.php"; ?>

        <!-- Отключение от MySQL -->

        <?php 

            $mysqli->close();

        ?>

    </body>
</html>