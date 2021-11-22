<?php

//Изображение открывается в новой вкладке

$img = $_GET['link'];
echo ('<img src="img/' . $img . '"');


/* 3. *На странице просмотра фотографии полного размера под картинкой должно быть указано число ее просмотров. */

$link = mysqli_connect('localhost', 'user', '11111111', 'images');
$sqlCountUpd = "UPDATE `img` SET `count` = (`count`+ 1) WHERE `link` = '$img'";
mysqli_query($link, $sqlCountUpd);
$res = mysqli_query($link, "SELECT `count` FROM `img` WHERE `link` = '$img'");
$row = mysqli_fetch_assoc($res);
$count = $row['`count`'];
echo $count;

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
    </style>
</head>
<body>

</body>
</html>
