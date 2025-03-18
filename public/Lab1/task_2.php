<?php 
    $first_value = TRUE;
    $second_value = 155;
    $third_value = 1.23;
    $forth_value = 'Toto';

    echo "bool_value: ".($first_value ? 'true' : 'false').", integer_value: $second_value, float_value: $third_value, string_value: $forth_value <br>";

    var_dump($first_value);
    var_dump($second_value);
    var_dump($third_value);
    var_dump($forth_value);

?>