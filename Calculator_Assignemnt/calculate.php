<?php

include('model/Calculator.php');

use model\Calculator;

$input = $_GET["expression"];

$input = $input = preg_replace('/\s+/', '', $input);

$check = preg_match("~^[0-9+\-*\/]+$~", $input);
$check2 = preg_match("~[+\-*\/][+\-*\/]~", $input);
$check3 = preg_match("~^[0-9]~", $input);
$check4 = preg_match("~[0-9]$~", $input);

if($check and !$check2 and $check3 and $check4){
    $calculator = new Calculator($input);
    $result = $calculator->calculate();
    echo "result: $result<br>";
}else{
    echo "Invalid Input!<br>";
}

echo "<a href='index.html'>Back</a><br>";
