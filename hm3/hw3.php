<?php
//Задание 1
echo "Задание 3-1<br>";
$i = 0;
while ($i <= 100) {
    if ($i % 3 == 0) {
        echo $i . (($i < 100 - 1) ? ", " : "");
    }
    $i++;
}
echo "<br>";

//Задание 2
echo "Задание 3-2<br>";
$i = 0;
do {
    if ($i == 0) {
        echo $i . " - это ноль;<br>";
    } elseif ($i % 2 == 0) {
        echo $i . " - четное число;<br>";
    } else {
        echo $i . " - нечетное число;<br>";
    }
    $i++;
} while ($i <= 10);
echo "<br>";

//Задание 3
echo "Задание 3-3<br>";
$regions = [
    "Московская область:" => ["Котельники", "Москва", "Кашира", "Зеленоград", "Клин"],
    "Ленинградская область:" => ["Санкт-Петербург", "Кировск", "Всеволожск", "Павловск", "Кронштадт"],
    "Рязанская область:" => ["Рязань", "Касимов", "Скопин", "Рыбное", "Кораблино"]
];

foreach ($regions as $region => $cities) {
    echo $region . "<br>" . implode(', ', $cities) . "<br>";
}
echo "<br>";

//Задание 4
echo "Задание 3-4<br>";
function transliteration($string)
{
    $out = "";
    $alfabet = [
        'а' => 'a', 'б' => 'b', 'в' => 'v',
        'г' => 'g', 'д' => 'd', 'е' => 'e',
        'ё' => 'e', 'ж' => 'zh', 'з' => 'z',
        'и' => 'i', 'й' => 'y', 'к' => 'k',
        'л' => 'l', 'м' => 'm', 'н' => 'n',
        'о' => 'o', 'п' => 'p', 'р' => 'r',
        'с' => 's', 'т' => 't', 'у' => 'u',
        'ф' => 'f', 'х' => 'h', 'ц' => 'c',
        'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch',
        'ь' => '\'', 'ы' => 'y', 'ъ' => '\'',
        'э' => 'e', 'ю' => 'yu', 'я' => 'ya',
        '_' => '_', ',' => ',', '.' => '.'
    ];
    for ($i = 0; $i <= mb_strlen($string) - 1; $i++) {
        if (mb_strtolower(mb_substr($string, $i, 1)) == mb_substr($string, $i, 1)) {
            $out .= $alfabet[mb_substr($string, $i, 1)];
        }
        else {
            $out .= mb_strtoupper($alfabet[mb_strtolower(mb_substr($string, $i, 1))]);
        }
    }

    return $out;
}

echo transliteration("мАсСиВ");
echo "<br>";

//Задание 5
echo "Задание 3-5<br>";
function underscore($string)
{
    return str_replace(" ", "_", $string);
}

echo underscore("Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.");
echo "<br>";

//Задание 7
echo "Задание 3-7<br>";
for ($i = 0; $i <= 9; print $i++ . " ") {
    //здесь пусто
}
echo "<br>";

//Задание 8
echo "Задание 3-8<br>";
foreach ($regions as $region => $cities) {
    echo "<br>" . $region . " ";
    foreach ($cities as $city) {
        if (mb_substr($city, 0, 1) == "К") {
            echo $city . ", ";
        }
    }
}
echo "<br>";

//Задание 8
echo "Задание 3-9<br>";
function inUrl($string)
{
    return transliteration(underscore($string));
}

echo inUrl("Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.");
echo "<br>";