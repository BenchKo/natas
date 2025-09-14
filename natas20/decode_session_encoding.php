<?php

$id = session_create_id();
session_start();
$_SESSION['admin'] = 1;
$_SESSION['name'] = "admin";

echo "$id\n";
?>
