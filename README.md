sublime-node-snippets
=====================

The majority of snippets for node 10.26. There are **465** total right now.

## Snippet Categories

* Assert
* Buffer
* Child
* Console
* Cluster
* Crypto
* Decoder
* Domain
* Dns
* Event
* Http
* Https
* Fs
* Global
* Module
* Net
* Path
* Punnycode
* Process
* Querystring
* Readline
* Repl
* Timers
* Tls Ssl
* Tty
* Udp
* Util
* Url
* Os
* Vm
* Zlib

## Building

I went to each page of the node docs, and copied the functions. Then I wrote a converter to take each function and convert it to a snippet.

For Example, this line:

```
setTimeout(fun, delay)
```

Is going to get converted to:

```
setTimeout(${1:fun}, ${2:delay})${0}
```

## sources.txt

This file is cool. It is just a line-by-line output of the node docs functions. This is the file that is raked over to generate the snippets.

## Building

Just run `php convert.php` and it will rake the sources.txt file and then write the new snippet in the snippets folder.

Everything before the first `(` will be used as the filename.

## Why PHP?!

Well, PHP is actually pretty good at manipulating strings and writing files.