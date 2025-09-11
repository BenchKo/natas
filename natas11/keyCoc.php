<?php

$plaintext = '{"showpassword":"no","bgcolor":"#ffffff"}';
$ciphertext = base64_decode("HmYkBwozJw4WNyAAFyB1VUcqOE1JZjUIBis7ABdmbU1GIjEJAyIxTRg=");
$key = '';

for ($i = 0; $i < strlen($plaintext); $i++) {
    $key .= $plaintext[$i % strlen($plaintext)] ^ $ciphertext[$i];
}
echo "key:$key";
?>

