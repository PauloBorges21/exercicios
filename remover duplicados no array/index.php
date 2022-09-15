<?php

$array = [1,5,1,5,9,6,10,12,22,55,85,55];

//print_r($array);

$array_data = array_unique($array, SORT_STRING);


foreach ($array_data as $item){

    echo '</br>' . $item ;
}
//print_r($array_data);