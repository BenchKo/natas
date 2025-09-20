import binascii
import pycurl
from io import BytesIO
from urllib.parse import urlencode
import base64

creds = "natas28:1JNwQM1Oi6J6j1k49Xyw7ZN6pXMQInVj"


hexblob = """
1b e8 25 11 a7 ba 5b fd 57 8c 0e ef 46 6d b5 9c dc 84 72 8f dc f8 9d 93 75 1d 10 a7 c7 5c 8c f2 ce c4 3e 41 12 8b ae 24 1a f6 b2 f4 ec dc ca 93 89 6d e9 08 84 f8 61 08 b1 67 f8 b4 ae a5 d7 63 91 72 32 05 14 83 e6 8e 45 8f d0 66 16 7b 30 a3
"""
hex_clean = hexblob.replace('\n',' ').replace('  ', ' ').strip().replace(' ', '')
cipher_bytes = binascii.unhexlify(hex_clean)
plain = "computer"

print(f"Total length: {len(cipher_bytes)} bytes")
# Aufteilen der 16 Byte Blöcke
block_size = 16
# Nehmen immer einen 16 Byte chunk → Blocks wird daraus eine Liste
blocks = [cipher_bytes[i:i+block_size] for i in range(0, len(cipher_bytes), block_size)]
# originale cipherblocks 1-5
C_blocks = blocks[1:]
# InitsialisierungsVektor 0
IV = blocks[0]

print(f"IV: {IV.hex()}")

for i, block in enumerate(C_blocks):
    print(f"C{i+1}: {block.hex()}")
buffer = BytesIO()
ch = pycurl.Curl()
ch.setopt(ch.HTTPAUTH, ch.HTTPAUTH_ANY)
ch.setopt(ch.USERPWD, creds)
ch.setopt(ch.URL, "http://natas28.natas.labs.overthewire.org")
ch.setopt(ch.WRITEDATA, buffer)

for padding in range(16):
    for guess in range(256):
        modified_block = C_blocks[3]
        modified_block[-padding] ^= hex(padding) ^ guess
    for i in range(padding +1):
        modified_block[-i] ^= hex(padding) ^ plain[-i]
        combined = b''.join(C_blocks[:4].modified_block)
        encoded = base64.b64_encode(combined).decode('utf-8')
        url = "http://natas27.natas.labs.overthewire.org/?{encoded}"
        ch.setopt(ch.URL, url)
        ch.perform()
        body = buffer.getvalue()
        print(body.decode('utf-8'))



ch.close()

body = buffer.getvalue()
print(body.decode('utf-8'))

