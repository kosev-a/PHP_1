<?php
// Домашняя работа №4

/* 1. Создать галерею фотографий. Она должна состоять всего из одной странички, на которой пользователь видит
все картинки в уменьшенном виде и форму для загрузки нового изображения. При клике на фотографию она должна
открыться в браузере в новой вкладке. Размер картинок можно ограничивать с помощью свойства width.
При загрузке изображения необходимо делать проверку на тип и размер файла. */


/* 2. *Строить фотогалерею, не указывая статичные ссылки к файлам, а просто передавая в функцию построения
адрес папки с изображениями. Функция сама должна считать список файлов и построить фотогалерею со ссылками в ней. */

// Задание 2 по сути содержит в себе задание 1, поэтому объединим решение:

// Сначала создадим галерею с уменьшенными изображениями

function showGallery(){
    echo '<script>document.body.innerHTML = "";</script>'; // С помощью скрипта очищаем страницу в начале вызова фунции, чтобы изображения не выводились повторно при добавлении новых изображений в галерею
    $files = scandir('./img');
    $images = [];
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            if (is_file('./img/' . $file)) {
                $images[] = $file;
            }
        }
    }
    foreach ($images as $image) {
        echo ("<a target='_blank' href='img/" . $image . "'><img src='img/" . $image . "' alt='image'></a>");
    }
}

showGallery();

// Загрузка новых изображений

    if(isset($_FILES)) {
        $maxsize = 2097152;
        $allowedTypes = array('image/jpeg','image/png','image/gif');
        $uploadDir = "img/"; //Директория загрузки. Если она не существует, обработчик не сможет загрузить файлы и выдаст ошибку
        for($i = 0; $i < count($_FILES['file']['name']); $i++) { //Перебираем загруженные файлы
            $uploadFile[$i] = $uploadDir . basename($_FILES['file']['name'][$i]);
            $fileChecked[$i] = false;
            for($j = 0; $j < count($allowedTypes); $j++) {
                if($_FILES['file']['type'][$i] == $allowedTypes[$j]) { //Проверяем на соответствие допустимым форматам
                    if(($_FILES['file']['size'][$i] <= $maxsize) && ($_FILES["file"]["size"][$i] != 0)) { //Проверяем размер файла - должен быть меньше 2мб
                        $fileChecked[$i] = true;
                        break;
                    } else {
                        echo "<div class='msg'>Ошибка, файл должен быть меньше 2мб</div><br>";
                    }
                }
            }
            if($fileChecked[$i]) { //Если формат допустим, перемещаем файл по указанному адресу
                if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $uploadFile[$i])) {
                    echo "<div class='msg'>Успешно загружен </div><br>";
                    showGallery();
                } else {
                    echo "<div class='msg'>Ошибка ".$_FILES['file']['error'][$i]."</div><br>";
                }
            } else {
                echo "<div class='msg'>Недопустимый формат </div><br>";
            }
        }
    } else {
        echo "<div class='msg'>Вы не прислали файл!</div>";
    }


?>


<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homework4</title>
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
        .upload, .msg {
            padding: 30px 0;
            text-align: center;
            width: 100%;
        }

    </style>
</head>
<body>
    <div class="upload">
        <form action="index.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="file[]" multiple><br><br>
            <input type="submit" value="Загрузить">
        </form>
    </div>
</body>
</html>