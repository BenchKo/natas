<?php

$args = var_dump($argv);

$is_image = exif_imagetype($args[1]);

echo "$arg[1] ist ein image: $is_image";

?>

