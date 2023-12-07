<?php
for ($num = 2; $num <= 1000; $num++) {
    $isPrime = true;
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i == 0) {
            $isPrime = false;
            break;
        }
    }
    if ($isPrime) {
        echo $num . "<br />";
    }
}
?>
