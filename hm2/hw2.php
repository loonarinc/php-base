<?php
//Задание 1
$a = rand(-10, 10);
$b = rand(-10, 10);
if ($a >= 0 && $b >= 0) {
    echo "Разность {$a} и {$b} равна " . ($a - $b);
} elseif ($a < 0 && $b < 0) {
    echo "Произведение {$a} и {$b} равно " . ($a * $b);
} else {
    echo "Сумма {$a} и {$b} равна " . ($a + $b);
}

//Задание 2
echo "<br>";
$a = rand(0, 15);
echo $a . "<br>";
switch ($a){
    case 0:
        echo "0 ";
    case 1:
        echo "1 ";
    case 2:
        echo "2 ";
    case 3:
        echo "3 ";
    case 4:
        echo "4 ";
    case 5:
        echo "5 ";
    case 6:
        echo "6 ";
    case 7:
        echo "7 ";
    case 8:
        echo "8 ";
    case 9:
        echo "9 ";
    case 10:
        echo "10 ";
    case 11:
        echo "11 ";
    case 12:
        echo "12 ";
    case 13:
        echo "13 ";
    case 14:
        echo "14 ";
    case 15:
        echo "15";
}

//Задание 3-4
echo "<br>";
function multiplication($a, $b){
    return $a * $b;
}
function division($a, $b){
    if ($b == 0)
        return "Ошибка, деление на ноль";
    else
        return $a / $b;
}
function addition($a, $b){
    return $a + $b;
}
function subtraction($a, $b){
    return $a - $b;
}
function mathOperation($arg1, $arg2, $operation){
    switch ($operation) {
        case "multiplication":
            return multiplication($arg1, $arg2);
        case "division":
            return division($arg1, $arg2);
        case "addition":
            return addition($arg1, $arg2);
        case "subtraction":
            return subtraction($arg1, $arg2);
        default:
            return "Произошла ошибка, неверный ввод данных";
    }
}
$arg1 = rand(-15,15);
$arg2 = rand(-15,15);
$multi = mathOperation($arg1, $arg2, "multiplication");
$div = mathOperation($arg1, $arg2, "division");
$add = mathOperation($arg1, $arg2, "addition");
$sub = mathOperation($arg1, $arg2, "subtraction");
$err = mathOperation($arg1, $arg2, "err");
echo "Умножение {$arg1} и {$arg2} равно {$multi} <br>";
echo "Деление {$arg1} и {$arg2} равно {$div} <br>";
echo "Сложение {$arg1} и {$arg2} равно {$add} <br>";
echo "Вычитание {$arg1} и {$arg2} равно {$sub} <br>";
echo "Вычитание {$arg1} и {$arg2} равно {$err}";