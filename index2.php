<?php
// Домашняя работа №6

/* 2. Создать калькулятор, который будет определять тип выбранной пользователем операции,
ориентируясь на нажатую кнопку.*/

if(isset($_POST['submit'])){
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
    $operation = $_POST['operation'];
    $msg = '';

    if(!$operation || (!$number1 && $number1 != '0') || (!$number2 && $number2 != '0')) {
        $error_result = 'Не все поля заполнены';

    }
    else {

        if(!is_numeric($number1) || !is_numeric($number2)){
            $error_result = "Операнды должны быть числами";
        }
        else
            switch($operation){
                case 'sum':
                    $result = $number1 + $number2;
                    break;
                case 'min':
                    $result = $number1 - $number2;
                    break;
                case 'mul':
                    $result = $number1 * $number2;
                    break;
                case 'div':
                    if( $number2 == '0')
                        $error_result = "На ноль делить нельзя!";
                    else
                        $result = $number1 / $number2;
                    break;
            }

    }
    if(isset($error_result)){
       $msg = $error_result;
    }
    else {
        $msg = $result;
    }
}








?>


<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homework6</title>
    <style rel="stylesheet">
        body {
            padding: 0 calc(50% - 1140px / 2);
            display: inline-block;
        }
        .calculate-form{
            margin: 50px auto;
            display: inline-block;
        }

    </style>
</head>
<body>

    <form action="" method="post" class="calculate-form">
        <input type="text" name="number1" class="numbers" placeholder="Первое число">
        <input type="submit" name="operation" value="sum"/>
        <input type="submit" name="operation" value="min"/>
        <input type="submit" name="operation" value="mul"/>
        <input type="submit" name="operation" value="div"/>
        <input type="text" name="number2" class="numbers" placeholder="Второе число">
    </form>
    <div class='msg'><?php echo $msg ?></div>

</body>
</html>