<?php 

$cookie=$argv[1];

$data=unserialize(base64_decode($cookie));
foreach ($data as $object){

    foreach($object as $key => $value){
        echo "$key => $value\n";
    }
}
?>
