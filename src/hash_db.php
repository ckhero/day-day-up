<?php 
function calc_hash_db($u, $s = 4)
{
$h = sprintf("%u", crc32($u));
$h1 = intval(fmod($h, $s));
return $h1;
} 

for($i=1;$i<100;$i++)
{
echo calc_hash_db($i);
echo "<br>";
} 

function calc_hash_tbl($u, $n = 256, $m = 16)
{
$h = sprintf("%u", crc32($u));
$h1 = intval($h / $n);
$h2 = $h1 % $n;
$h3 = base_convert($h2, 10, $m);
$h4 = sprintf("%02s", $h3);
return $h4;
}