<?php

namespace SomeIdeas\TryRandomArray;

class TryRandomArray
{

    private function buildMinors($array, $minors_size)
    {
        $rows = count($array);

        $columns = count($array[array_key_first($array)]);

        $minors = [];  // масив із усіма мінорами
        $minors_number = 0;

        //проходимось по всім рядкам і стовпчикам ( за один крок ми беремо мінор заданої кількості, тому крок у нас minors_size )
        for ($i = 0; $i < $rows; $i += $minors_size) {
            for ($j = 0; $j < $columns; $j += $minors_size) {

                // заповнюємо мінор, якщо try видає помилку, то це означає, що такого елемента немає, тобто ми вийшли з край
                //minors_number - номер мінора, причому ми проходимо спочатку по рядках, тобто спочатку всі можливі мінори із першим рядком
                for ($k = 0; $k < $minors_size; $k++) {
                    for ($l = 0; $l < $minors_size; $l++) {
                        try {
                            $minors[$minors_number][$k][$l] = $array[$i + $k][$j + $l];
                        }catch (\Exception $e){}
                    }
                }

                $minors_number++;
            }

        }

        return $minors;
    }

    private function randWithLessRowAndCol($array, $row, $col)
    {
        $arr = [];
        $n = $col;
        while (empty($arr)) {
            foreach ($array as $key => $value) {
                if ((count($value) <= $row) && (count($value[0]) == $n)) {
                    $arr[$key] = $value;
                }
            }
            $n--;
            if ($n < -20) {
                return -20;
            }
        }

        return array_rand($arr);

    }
    private function arrayAddCol($arr, $a, $start, $k = 0)
    {
        for ($i = 0; $i < count($a); $i++) {
            for ($j = 0; $j < count($a[0]); $j++) {
                $arr[$i + $k][$start + $j] = $a[$i][$j];
            }
        }
        return $arr;
    }
    private function findEmptyKeys($arr, $max)
    {
        $start = -1;
        $end = $max;
        for ($i = 0; $i < $max; $i++) {
            if ((!array_key_exists($i, $arr)) && ($start < 0)) {
                $start = $i;
            } elseif (($start >= 0) && (array_key_exists($i, $arr))) {
                $end = $i;
                break;
            }
        }
        return ['start' => $start, 'end' => $end];
    }


    private function tryBuild($minors, $rows, $columns)
    {
        $result = [[]];
        do {
            $n = $this->randWithLessRowAndCol($minors, $rows, $columns - count($result[0]));
            if ($n < 0) {
                return [];
            }
            $result = $this->arrayAddCol($result, $minors[$n], count($result[0]));
            unset($minors[$n]);
        }while (count($result[0]) < $columns);

        for ($i = 1; $i < $rows; $i++) {

            if ( ! key_exists($i, $result)) {
                $result[$i] = [];
            }

            $empty = $this->findEmptyKeys($result[$i], $columns);

            while ($empty['start'] >= 0) {

                $n = $this->randWithLessRowAndCol($minors, $rows, $empty['end'] - $empty['start']);
                if ($n < 0) {
                    return [];
                }

                $result = $this->arrayAddCol($result, $minors[$n], $empty['start'], $i);
                ksort($result[$i]);
                unset($minors[$n]);
                $empty = $this->findEmptyKeys($result[$i], $columns);

            }
        }

        return $result;
    }

    public function buildRandom($array, $minors_size)
    {
        $rows = count($array);
        $columns = count($array[array_key_first($array)]);
        $minors = $this->buildMinors($array,$minors_size);

        $k = 0;
        do {
            $k ++;
            $result = $this->tryBuild($minors, $rows, $columns);
        }while (empty($result));

        return ['result' => $result, 'tries' =>$k];
    }
}
