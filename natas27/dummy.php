<?php 


# testen wann die DB resetet wird.
# TODO: Zeitstamps
#   curl api
#
#
#
$url = "http://natas27.natas.labs.overthewire.org";
$cred = "natas27:u3RRffXjysjgwFU6b9xa23i6prmUsYne";
$input = "username=testuser&password=123";
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_USERPWD, $cred);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_POSTFIELDS, $input);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_COOKIE, "PHPSESSID=stay123test");

$now = microtime(1);
$curr = $now;
$until = $now + 400;

while($until > $curr){

    $res = curl_exec($ch);
    $curr = microtime(1) - $now;
    if(strstr($res, "created")){
        file_put_contents("test_log.txt", $res . $curr . "\n", FILE_APPEND);
        echo $res;
    }
    
}
curl_close($ch);
?>
