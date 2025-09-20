#!/bin/bash
curl -H "Authorization: G+glEae6W/1XjA7vRm21nNyEco/c+J2TdR0Qp8dcjPLof/YMma1yzL2UfjQXqQEop36O0aq+C10FxP/mrBQjq0eOsaH+JhosbBUGEQmz/to=" \
	"http://natas28.natas.labs.overthewire.org" \
	| batcat -l html

