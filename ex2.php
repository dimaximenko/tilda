<?php

/*
 * Задача 2: массивы
 *
 * Нужно заполнить массив 5 на 7 случайными уникальными числами от 1 до 1000.
 * Вывести получившийся массив и суммы по строкам и по столбцам.
 */

$randArray = makeArray();
$randArray = calculateArray($randArray);

/*
 * Создает массив 5х7 заполняя случайными числами
 * @return array
 */
function makeArray()
{
    $array = [];
    $checkRand = [];//проверяем на униклаьность

    for ($v = 1; $v <= 5; $v++) {
        for ($h = 1; $h <= 7; $h++) {
            do {
                $rand = mt_rand(1, 1000);
            } while (in_array($rand, $checkRand));
            $checkRand[] = $rand;
            $array[$v][] = $rand;
        }
    }

    return $array;
}

/*
 * Выводим таблицу считая суммы по вертикале и горизонтале
 *
 * @param $array - массив со случайными числами
 */
function calculateArray(array $array)
{
    $str = '<table cellpadding="10" border="1">';
    $verticalSumm = [];
    foreach ($array as $level) {
        $horizontalSumm = array_sum($level);
        $str.='<tr>';
        foreach ($level as $key => $value) {
            $verticalSumm[$key]+=$value;
            $str.='<td>'.$value.'</td>';
        }
        $str.='<td><b>'.$horizontalSumm.'<b></td>';
        $str.='</tr>';
    }
    $str.='<tr>';
    foreach ($verticalSumm as $vertical) {
        $str.='<td><b>'.$vertical.'<b></td>';
    }
    $str.='</tr>';
    $str.= '</table>';

    echo $str;
}