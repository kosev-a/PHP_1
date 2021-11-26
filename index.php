<?php
// Домашняя работа №6

/* 1. Создать форму-калькулятор с операциями: сложение, вычитание, умножение, деление.
Не забыть обработать деление на ноль! Выбор операции можно осуществлять с помощью тега <select>.*/
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
                case 'plus':
                    $result = $number1 + $number2;
                    break;
                case 'minus':
                    $result = $number1 - $number2;
                    break;
                case 'multiply':
                    $result = $number1 * $number2;
                    break;
                case 'divide':
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
      <select class="operations" name="operation">
        <option value='plus'>+ </option>
        <option value='minus'>- </option>
        <option value="multiply">* </option>
        <option value="divide">/ </option>
      </select>
    <input type="text" name="number2" class="numbers" placeholder="Второе число">
    <input class="submit_form" type="submit" name="submit" value="Получить ответ">
    </form>
    <div class='msg'><?php echo $msg ?></div>


</body>
</html>