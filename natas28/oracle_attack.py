import binascii
import pycurl
from io import BytesIO
from urllib.parse import urlencode
import base64

creds = "natas28:1JNwQM1Oi6J6j1k49Xyw7ZN6pXMQInVj"


hexblob = """
1b e8 25 11 a7 ba 5b fd 57 8c 0e ef 46 6d b5 9c dc 84 72 8f dc f8 9d 93 75 1d 10 a7 c7 5c 8c f2 ce c4 3e 41 12 8b ae 24 1a f6 b2 f4 ec dc ca 93 89 6d e9 08 84 f8 61 08 b1 67 f8 b4 ae a5 d7 63 91 72 32 05 14 83 e6 8e 45 8f d0 66 16 7b 30 a3
"""
hex_clean = hexblob.replace('\n','').replace('  ', '').strip().replace(' ', '')
cipher_bytes = bytearray(binascii.unhexlify(hex_clean))

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

# Buffer for Response vom Server
buffer = BytesIO()
# curl settings
ch = pycurl.Curl()
ch.setopt(ch.HTTPAUTH, ch.HTTPAUTH_ANY)
ch.setopt(ch.USERPWD, creds)
ch.setopt(ch.COOKIE, "PHPSESSID=gotyouamk")
ch.setopt(ch.URL, "http://natas28.natas.labs.overthewire.org/")
ch.setopt(ch.WRITEDATA, buffer)
n = len(C_blocks)

all_intermediate_blox = [] 
all_plaintext_blox = []
# Jeder moegliche paddingwert
for b in range(len(C_blocks)):
    blx =  len(C_blocks) - b -1
    intermediate = [0] * 16
    plainText = [0] * 16
    #prefix = b"".join(blocks[:b])

    prev = IV if b == 0 else C_blocks[blx-1]
    current = C_blocks[blx]

    for padding in range(1, 17):
        print(padding)
        idx = 16 - padding
        for guess in range(256):
            print(guess)
            prevPrime = prev.copy()
            # Rechts des curr Bytes das padding anpassen
            for i in range(15, idx, -1):
                prevPrime[i] = padding ^ prev[i] ^ intermediate[i]
                print(f"Block no {blx}:guess:{guess}:{prevPrime}:{padding}")

            prevPrime[idx] = prev[idx] ^ guess ^ padding

            full = b''.join([prevPrime] + [current])
            q = base64.b64encode(full).decode()

            url2 = f"http://natas28.natas.labs.overthewire.org/search.php/?{urlencode({'query':q})}"
            buffer.truncate(0); buffer.seek(0)
            #print(url2)
            ch.setopt(ch.URL, url2)
            ch.perform()
            body = buffer.getvalue()
            response = body.decode('utf-8')
            length = len(response)
            print(f"response: {response}")
            if "PKCS#7" not in response:
                print (body.decode('utf-8'))

                plainText[idx] =  guess
                intermediate[idx] = prev[idx] ^ plainText[idx]
                print(f"korrekter guess! I: {intermediate}")
                print(f"Weiteres plaintextByte freigelegt:{plainText[idx]}")
                break
    all_plaintext_blox.append(plainText)
    all_intermediate_blox.append(intermediate)
    break
ch.close()
final_plaintext_block = bytearray(16)
for i in range(16):
    final_plaintext_block[i] = intermediate[i] ^ prev[i]
    print(final_plaintext_block.decode('utf-8', errors='replace'))

all_plaintext_blox = b''.join(bytearray(plain) for plain in all_plaintext_blox).decode('utf-8')
print(all_plaintext_blox)
all_intermediate_blox = b''.join(bytearray(I) for I in all_intermediate_blox)
print(all_intermediate_blox.decode('utf-8', errors='replace'))

