<?php
# Den Xor encryption Key herausholen: Aus dem default Base64_decoding des Cookies und dem json plain default array
#
# Wenn wir also den Key berechnen wollen, müssen wir die zwei bekannten Parteien Zeichen für miteinander Xoren;
#
# denn jsonplain ⊕ key = base64_encrypt/cookie
# und jsonplain ⊕ cookie = key  
#
# 
$default_cookie = "HmYkBwozJw4WNyAAFyB1VUcqOE1JZjUIBis7ABdmbU1GIjEJAyIxTRg=";
$defaultdata = array("showpassword" => "no", "bgcolor" => "#ffffff");

$dec_base = base64_decode($default_cookie);

$plain_text = json_encode($defaultdata);

function xor_encrypt($in, $in_base){
	$dec_base = $in_base;
	$text = $in;
	$border = (strlen($dec_base) > strlen($text) ? strlen($text) : strlen($dec_base));

	$out_key = '';

	for($i=0; $i<$border;$i++){

	$out_key .= $dec_base[$i % $border] ^ $text[$i % $border];

	}
	
	echo "Der Key der für die Verschlüselung verwendet wurde lautet: $out_key";
}

xor_encrypt($plain_text,$dec_base);
?>
