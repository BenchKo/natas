<?php

#Ausgangspunkt: Ich muss das $defaultdata array bzw das ZielData in Hex umwandeln.
#Default ist 

#$defaultdata = array("showpassword" => "no", "bgcolor" => "#ffffff");
# Meine Eingabe ist Hex und wird zu json_encode() → über XOR-encoding() zu base64_encode() kodiert aber beim Überschreiben, spielt das keine Rolle, da alles wieder zurück dekodiert wird.
#
# Annahme: Einen Hex Wert wählen, welcher als assoziatives Array statt "no" "yes" ist.
# Neue Annahme: Einen Cookie nach dem Schema verschlüsseln→ injizieren und vom Programm
# dekodieren lassen mit den korrekt gesetzen Schlüssel-Wert Paaren.
# Der Key war falsch aber mit dem defaultdata und der xor funktion lässt sich der Xor'Hash'-Key erahnen, denn xor Operationen sind reversible und symmetrisch!
#
$defaultdata = array( "showpassword" => "yes", "bgcolor" => "#ffffff");

function xor_encrypt($in) {
    $key = 'eDWo';
    $text = $in;
    $outText = '';

    // Iterate through each character
    for($i=0;$i<strlen($text);$i++) {
    	$outText .= $text[$i] ^ $key[$i % strlen($key)];
    }

    return $outText;
}

$str = json_encode($defaultdata);
$xori = xor_encrypt($str);
$basi = base64_encode($xori);

echo "json encoded:\t\t\t '$str'\n";
echo "json + xor^: '$xori'\n";
echo "fully encoded:\t '$basi'\n";

# decode it back
# check original cookie
$orgCookie = "HmYkBwozJw4WNyAAFyB1VUcqOE1JZjUIBis7ABdmbU1GIjEJAyIxTRg=";
$test = "HmYkBwozJw4WNyAAFyB1VUc9MhxHaHUNAic4Awo2dVVHZzEJAyIxCUc5";

# decrypting starts here:
$old_base = base64_decode($test);
$old_xor = xor_encrypt($old_base);
$array_old = json_decode($old_xor, true);
# loop durch nen asoz array

foreach( $array_old as $x => $y) {
	echo "$x: $y \t";
}



?>

