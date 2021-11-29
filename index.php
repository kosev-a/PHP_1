<?php

// Домашняя работа №7

/* 1. Создать модуль корзины. В нее можно добавлять товары, а можно удалять.*/


// Будем использовать хранение в сессии


function addToCart($id, $count) {
	if (isset($_SESSION['goods'][$id])) { //если товар уже добавляли в корзину
		$_SESSION['goods'][$id]['count']++;
	}else{
		$_SESSION['goods'][$id] = [];
        $link = mysqli_connect('localhost', 'user', '11111111', 'shop_php1');
		$sqlSelect = "SELECT price FROM goods WHERE id = '$id'";
		$addProduct = mysqli_fetch_assoc(mysqli_query($link, $sqlSelect));
        $_SESSION['goods'][$id]['count'] = 1;
	}
}

function deleteFromCart($id, $count) {
	if (isset($_SESSION['goods'][$id])){ 
        if ($_SESSION['goods'][$id]['count'] > 0) { //если товаров в корзине больше нуля, уменьшаем количество
            $_SESSION['goods'][$id]['count']--;
        }	
	}else{
		unset ($_SESSION['goods'][$id]); //удаляем переменную, когда count станет равным нулю
	}
}

/* 2. Создать модуль личного кабинета, на который будет перенаправляться пользователь после логина. 
Вывести там имя, логин и приветствие. */

if (isset($_POST['email'], $_POST['password'])) {
    require_once 'db.php';
    global $DBLink;
    $result = mysqli_query($DBLink, "SELECT * FROM users WHERE email='" . $_POST['email'] . "'");
    $result = mysqli_fetch_assoc($result);
    if (password_verify($_POST['password'], $result['password'])) {
        header('location: /index2.php?email=' . $_POST['email']);
        die();
    }
    echo 'Incorrect login/password';
}

?>


<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homework7</title>
    <style rel="stylesheet">
        body {
            padding: 0 calc(50% - 1140px / 2);
            display: inline-block;
        }


    </style>
</head>
<body>

    <form method="post" action="/index2.php">
        <input type="email" name="email"><br/>
        <input type="password" name="password"><br/>
        <input type="submit" value="Login"><br/>
    </form>

</body>
</html> 

