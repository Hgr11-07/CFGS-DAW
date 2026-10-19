<?php

$var1 = 100;
$var2 = &$var1;

echo "Var 1 = $var1 <br>";
echo "Var 2 = $var2 <br>";

$var3 = $var1;
echo "Var 2 = $var2 <br>";

$var2 = 300;
echo "Var 1 = $var1 <br>";

$var3 = 400;

echo "Var 1 = $var1 <br>";
?>