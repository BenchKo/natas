<?php
# Annahme: Wenn mt_srand nicht vorher initialisiert wird, nimmt mt_rand den aktuellen Zeitstempel als seed.
#
# Ich teste die vorhersehbarkeit indem ich den aktuellen Zeitstempel einfriere und öfter hintereinander verwende:
# Das müsste zu dem selben string führen.
#
function genRandomString() {
	mt_srand(1757349636115, MT_RAND_MT19937);

	$length = 10;
    	$characters = "0123456789abcdefghijklmnopqrstuvwxyz";
   	$string = "";

    	for ($p = 0; $p < $length; $p++) {
        	$string .= $characters[mt_rand(0, strlen($characters)-1)];
    	}

   	 echo $string;
}
# Programmfluss
genRandomString();
?>
