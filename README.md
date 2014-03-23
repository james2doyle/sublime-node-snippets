sublime-node-snippets
=====================

The majority of snippets for node 10.26. There are **783** total right now.

## Installing

* Open the Commands Palette (command+shift+p)
* Package Control: Add Repository
* Past in this repos URL
* Press Enter
* Open the palette again
* press enter on "sublime-node-snippets"
* watch it install

## Using

Pressing `.` (period) will end the snippet lookup.

You will have better results if you pretend the period isn't needed. So if you are looking for `fs.readdir`, you would type `fsread` and you would see the results coming up.

## Snippet Categories

Node Populars

* async
* underscore
* lodash

Node Core

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

## Adding New Snippets

Here is how I quickly got all these snippets. I will use Express as an example since it isn't in here.

First I went to the docs for the framework, and I looked to see what the code examples were wrapped in.

For the express docs site, the codes are show in `section h3` tags. So to quickly get the list, I ran the following code:

```javascript
var codes = document.querySelectorAll("section h3");
var items = []
for (var i = 0; i < codes.length; i++) {
  items.push(codes[i].textContent);
}
items.join("\n");
```

Then copied the output and pasted it in the sources.txt file. Done!

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