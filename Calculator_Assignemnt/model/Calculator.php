<?php

namespace model;

use Exception;

class Calculator
{

    private $operands;
    private $operators;

    public function __construct(string $input)
    {
        $this->operands = preg_split("/[+\-*\/]/", $input);
        $this->operators = preg_split("/[0-9]+/", $input, -1, PREG_SPLIT_NO_EMPTY);
    }

    /**
     * @throws Exception
     */
    public static function compute($a, $b, $operator){
        switch ($operator) {
            case "+":
                $result = $a + $b;
                break;
            case "-":
                $result = $a - $b;
                break;
            case "*":
                $result = $a * $b;
                break;
            case "/":
                $result = $a / $b;
                break;
            default:
                throw new Exception("Invalid Operator");
        }

        return $result;
    }

    public function calculate(){

        while(count($this->operators) > 0){

//            print_r($this->operators);
//            echo "<br>";
//            print_r($this->operands);
//            echo "<br>";


            for ($i = 0; $i < count($this->operators); $i++){
                if($this->operators[$i] == "*" or $this->operators[$i] == "/"){
                    $this->operate($i);
                    break;
                }
            }

            if($i == count($this->operators)){
                for ($j = 0; $j < count($this->operators); $j++){
                    if($this->operators[$j] == "+" or $this->operators[$j] == "-"){
                        $this->operate($j);
                        break;
                    }
                }
            }



        }

        return $this->operands[0];
    }

    private function operate(int $i){
        $operator = array_splice($this->operators, $i, 1);
        $num = NULL;
        $a = floatval( $this->operands[$i] );
        $b = floatval( $this->operands[$i + 1] );

        try {
            $num = self::compute($a, $b, $operator[0]);
        } catch (Exception $e) {

        }

        array_splice($this->operands, $i, 2, $num);

    }
}