<?php declare(strict_types=1);

function createTable(int $row, int $col){
    $table = "<table>";

    $table .= "<tr>";
    for($i = 1; $i <= $col; $i++){
        $table .= "<th>";
        $table .= "h$i";
        $table .= "</th>";
    }
    $table .= "</tr>";

    for($i = 1; $i <= $row; $i++){
        $table .= "<tr>";
        for($j = 1; $j <= $col; $j++){
            $table .= "<td>";
            $table .= "d$i$j";
            $table .= "</td>";
        }
        $table .= "</tr>";
    }


    $table .= "</table>";

    return $table;
}

echo createTable(9, 9);

