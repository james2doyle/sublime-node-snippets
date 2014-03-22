sublime-node-snippets
=====================

The majority of snippets for node 10.26. There are **465** total right now.

## Installing

* Open the Commands Palette (command+shift+p)
* Package Control: Add Repository
* Past in this repos URL
* Press Enter
* Open the palette again
* press enter on "sublime-node-snippets"
* watch it install

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

## Contributing

Just add (or edit) a line in the source file. Then run `php convert.php` to generate the new snippets.

## Why PHP?!

Well, PHP is actually pretty good at manipulating strings and writing files.

## License

**The MIT License**

Copyright (c) 2014 [James Doyle](http://twitter.com/james2doyle) james2doyle@gmail.com

Permission is hereby granted, free of charge, to any person obtaining
a copy of this software and associated documentation files (the
'Software'), to deal in the Software without restriction, including
without limitation the rights to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software, and to
permit persons to whom the Software is furnished to do so, subject to
the following conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY
CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.