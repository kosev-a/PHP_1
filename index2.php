<?php
// Домашняя работа №2

/* 1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. Затем написать скрипт, который работает по следующему принципу:

    если $a и $b положительные, вывести их разность;
    если $а и $b отрицательные, вывести их произведение;
    если $а и $b разных знаков, вывести их сумму;
*/

$a = -2;
$b = 3;
if ($a >= 0 && $b >= 0)
    echo ("разность чисел равна " ($a - $b) . PHP_EOL);
else if ($a < 0 && $b <0)
    echo ("произведение чисел равно " . ($a * $b) . PHP_EOL);
else if ($a < 0 && $b >= 0 || $a >= 0 && $b < 0)
    echo ("сумма чисел равна " . ($a + $b) . PHP_EOL);
else
    echo ('Введены неверные значения');

/* 2. Присвоить переменной $а значение в промежутке [0..15].
С помощью оператора switch организовать вывод чисел от $a до 15. */

$a = 8;
echo "\n Вывод чисел с $a до 15: ";
switch ($a) {
    case 0:
        echo '0 '; // не ставим break, чтобы вывод чисел продолжался со значения переменной а до 15, иначе выведет только переменную а
    case 1:
        echo '1 ';
    case 2:
        echo '2 ';
    case 3:
        echo '3 ';
    case 4:
        echo '4 ';
    case 5:
        echo '5 ';
    case 6:
        echo '6 ';
    case 7:
        echo '7 ';
    case 8:
        echo '8 ';
    case 9:
        echo '9 ';
    case 10:
        echo '10 ';
    case 11:
        echo '11 ';
    case 12:
        echo '12 ';
    case 13:
        echo '13 ';
    case 14:
        echo '14 ';
    case 15:
        echo '15 ';
}

/* 3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами.
Обязательно использовать оператор return. */

function plus($x, $y){
    return ($x+$y);
}

function minus($x, $y){
    return ($x-$y);
}

function multiplication($x, $y){
    return ($x*$y);
}

function division($x, $y){
    return ($x/$y);
}

/* 4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 –
значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции
выполнить одну из арифметических операций (использовать функции из пункта 3)
и вернуть полученное значение (использовать switch). */

function mathOperation($arg1, $arg2, $operation){
    $rez = null;
    switch ($operation) {
        case '+':
            $rez = plus($arg1, $arg2);
            break;
        case '-':
            $rez = minus($arg1, $arg2);
            break;
        case '*':
            $rez = multiplication($arg1, $arg2);
            break;
        case '/':
            $rez = division($arg1, $arg2);
            break;
    }
    return $rez;
}

$num = mathOperation(1, 2, '*');
echo ("Результат операции равен " . $num . PHP_EOL);

/* 5. Посмотреть на встроенные функции PHP. Используя имеющийся HTML-шаблон,
вывести текущий год в подвале при помощи встроенных функций PHP. */

$year = date('Y');

/* 6. *С помощью рекурсии организовать функцию возведения числа в степень.
Формат: function power($val, $pow), где $val – заданное число, $pow – степень. */

$val = 2;
$pow = 3;

function power($val, $pow){
    $result = 1;
       if ($pow != 0) {
            $result = $val * power($val, $pow - 1);
       } else {
            $val = 1;
       }
    return $result;
}

$power = power($val, $pow);
echo ("Число " . $val .  " в степени " . $pow . " равно " . $power . ". ");

/* 7. *Написать функцию, которая вычисляет текущее время и возвращает его в формате
с правильными склонениями, например:

22 часа 15 минут
21 час 43 минуты
*/

function cur_time(){
    $cnt_hour_num = date('H');
    $cnt_minutes_num = date('i');
    $hour_string = '';
    $minutes_string = '';
    if (($cnt_hour_num > 4) && ($cnt_hour_num < 21)) { // сначала отсечем диапазон часов от 5 до 20
        $hour_string = 'часов';
    }else if ($cnt_hour_num % 10 === 1) { // числа, заканчивающиеся на 1, кроме 11 - входит в предыдущий диапазон
        $hour_string = 'час';
    }else if ((($cnt_hour_num > 1) && ($cnt_hour_num < 5)) || (($cnt_hour_num > 21) && ($cnt_hour_num < 24))) { // числа, заканчивающиеся на 2, 3, 4, кроме 12, 13, 14
        $hour_string = 'часа';
    }else{ // остальные числа
        $hour_string = 'часов';
    }
    if (($cnt_minutes_num > 4) && ($cnt_minutes_num < 21)) { // сначала отсечем диапазон минут от 5 до 20
        $minutes_string = 'минут';
    }else if ($cnt_minutes_num % 10 === 1) { // теперь все числа, заканчивающиеся на 1, кроме 11 - оно входит в предыдущий диапазон
        $minutes_string = 'минута';
    }else if (($cnt_minutes_num % 10 > 1) && ($cnt_minutes_num % 10 < 5)) { // теперь все числа, заканчивающиеся на 2, 3, 4, кроме 12, 13, 14
        $minutes_string = 'минуты';
    }else{ // все остальные числа
        $minutes_string = 'минут';
    }
    return ($cnt_hour_num . ' ' . $hour_string . ' ' . $cnt_minutes_num . ' ' . $minutes_string);
}

echo('Текущее время: ' . cur_time());

?>


<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homework2</title>
</head>
<body>
    <footer>
        <?php echo $year ?>
    </footer>
</body>
</html>