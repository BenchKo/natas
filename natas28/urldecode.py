from urllib.parse import unquote
import sys

url=sys.argv[1]
decoded=unquote(url)

print(decoded)



