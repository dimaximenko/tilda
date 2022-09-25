<?php

/*
 * Задача 1 лесенка
 *
 * Нужно вывести лесенкой числа от 1 до 100.
 */
makeStairway();

function makeStairway()
{
    $str = '';//складываем всё сюда
    $countInStr = 0;//идентификатор к-ва символов в текущей строке
    $countInLastStr = 0;//к-во символов в предыущей строке

    for ($i = 1; $i <= 100; $i++) {
        $countSymbols = strlen($i);//счтаем к-во символов в числе
        $countInStr+=$countSymbols;
        $str.=$i.' ';
        if ($countInStr > $countInLastStr) {
            $str.='<br>';
            $countInLastStr = $countInStr;
            $countInStr = 0;
        }
    }

    echo $str;
}