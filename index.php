<?php
// Домашняя работа №5

/* 1. Создать галерею изображений, состоящую из двух страниц:

    просмотр всех фотографий (уменьшенных копий);
    просмотр конкретной фотографии (изображение оригинального размера) по ее ID в базе данных.
 */

$link = mysqli_connect('localhost', 'user', '11111111', 'images');
$sql = 'SELECT `id`, `title`, `link`, `count` FROM `img` ORDER BY count DESC';
$res = mysqli_query($link, $sql);

while ($row = mysqli_fetch_assoc($res)):
    echo ('<a target="_blank" rel="stylesheet" href="image.php?link=' . $row["link"] . '"><img src="img/' . $row["link"] . '" alt=' . $row["title"] . '></a>');
endwhile;

/* 2. В базе данных создать таблицу, в которой будет храниться информация о картинках (адрес на сервере, размер, имя). */

/*
CREATE DATABASE images;
USE images;

CREATE TABLE `img` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `link` varchar(100) NOT NULL,
  `size` varchar(50) NOT NULL,
  `count` int NOT NULL,
  PRIMARY KEY (id)
) CHARSET=utf8;

INSERT INTO `img` (`title`, `link`, `size`, `count`) VALUES
('img1', '1.jpg', '1332x888', 0),
('img2', '2.jpg', '1920x1200', 3),
('img3', '3.jpg', '1600x1000', 1);

*/

/* 3. *На странице просмотра фотографии полного размера под картинкой должно быть указано число ее просмотров. */

// сделано в файле image.php

?>


<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homework5</title>
    <style rel="stylesheet">
        body {
            padding: 0 calc(50% - 1140px / 2);
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }
        img {
            width: 300px;
            padding: 30px;
        }
    </style>
</head>
<body>

</body>
</html>