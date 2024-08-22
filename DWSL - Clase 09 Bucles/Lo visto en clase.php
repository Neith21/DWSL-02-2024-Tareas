<?php

//Imprimir los números del 1 al 5
$iteration = 1;

while ($iteration <= 5) {
    echo "Iteración [$iteration]<br>\n";
    $iteration++;
}

echo "<br><br>\n";

do {
    echo "Iteración [$iteration]<br>\n";
    $iteration++;
} while ($iteration <= 10);

echo "<br><br>\n";

for ($x = 2; $x >= -1; $x--) { 
    echo "Iteración [$x]<br>\n";
}

echo "<br><br>\n";

$colors = ['red', 100, ['blue', 2]];

foreach ($colors as $key => $color) {
    if (is_array($color)) {
        foreach ($color as $subkey => $subcolor) {
            echo "El subelemento es: $subcolor<br>\n";
        }
    } else {
        echo "El color es: $color<br>\n";
    }
}

?>