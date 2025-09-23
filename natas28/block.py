import requests
import string
from requests.auth import HTTPBasicAuth
import urllib.parse

basicAuth=HTTPBasicAuth('natas28', '1JNwQM1Oi6J6j1k49Xyw7ZN6pXMQInVj')

u="http://natas28.natas.labs.overthewire.org/index.php"

count = 0
headers = {'Content-Type': 'application/x-www-form-urlencoded' }

while count <= 16:
    data = "query=" + "A"*count
    response = requests.post(u, headers=headers, data=data, auth=basicAuth, verify=False, allow_redirects=True)
    print("{:02d}".format(count), "chars ", urllib.parse.unquote(response.url))
    count += 1

print("Done!")
